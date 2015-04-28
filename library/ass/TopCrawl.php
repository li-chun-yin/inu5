<?php
class TopCrawl
{
	protected	$file_name	= '',
				$charset	= 'utf-8',
				$header		= array(),
				$search_url = '',
				$content	= '',
				$rss_url	= '',
				$result		= array();
	function __construct()
	{
		$this->charset = strtolower($this->charset);
		$this->init();
	}
	/**
	 * @since 2012.06.18
	 * Enter description here ...
	 */
	protected function init(){}
	/**
	 * @since 2012.06.18
	 * Enter description here ...
	 * @param $key
	 */
	protected function search($key)
	{
		$key = rawurlencode(@iconv('utf-8',$this->charset.'//ignore',$key));
		$this->search_url = str_replace('{key}',$key,$this->search_url);
		$this->excurl($this->search_url);
	}
	/**
	 * @since 2012.06.18
	 * Enter description here ...
	 * @throws CrawlFailedException
	 */
	protected function detail($url)
	{
		$this->excurl($url);
	}
	public function getLink($url)
	{
		$this->result	= array( 'urls' => array(),'curls' =>array() );
		$links			= array();
		$parse_url		= parse_url($url);
		/********************************************************************************************************************/
		$this->excurl($url);
		if($this->content)
		{
			if(preg_match_all('@<a[^>]href=["\']?([^"\'>\s=]+)["\'\s>]@siU',$this->content,$matches))
			{
				foreach($matches[1] AS $key=>$link)
				{
					$links[$key]	= strpos($link,'/')===0 ? $parse_url['scheme'].'://'.$parse_url['host'].$link : $link;
				}

			}
		}
		Zend_Session::start();
		$movie_links = Zend_Session::namespaceGet('movie_links');
		$movie_links = isset($movie_links['url']) ? $movie_links['url'] : '';
		if(! $movie_links)
		{
			$session= new Zend_Session_Namespace('movie_links');
		    Zend_Session::regenerateId();
		    $manager			= getObj('Movie_linkManager');
			$movie_links_urls	= $manager->getMovieLinkUrls();
			$session->url		= $movie_links_urls;
			$movie_links		= $movie_links_urls;
		}
		foreach( $links AS $key=>$link)
		{
			if($this->isDetailUrl($link))
			{
				if( !in_array($link,$movie_links))
				{
					array_push($this->result['curls'],$link);
				}
			}
			else
			{
				$parse_link = parse_url($link);
				if(isset($parse_link['host']) && $parse_link['host'] == $parse_url['host'])
				{
					array_push($this->result['urls'],$link);
				}
			}
		}
		/********************************************************************************************************************/
		return $this->result;
	}
	/**
	 * @since 2012.06.18
	 * Enter description here ...
	 * @throws CrawlFailedException
	 */
	public function getUrlByRss()
	{
		$this->result	= array();
		/********************************************************************************************************************/
		if(empty($this->rss_url)){throw new CrawlFailedException('rss_url不能为空');}
		$this->excurl($this->rss_url);
		if(preg_match_all('@<item>.*<link>(.*)</link>.*</item>@siU',$this->content,$matches))
		{
			$this->result = $matches[1];
		}
		else
		{
			throw new CrawlFailedException("{$this->rss_url}Error.");
		}
		/********************************************************************************************************************/
		return $this->result;
	}

	public function substr($string,$start,$end)
	{
		if(preg_match("@{$start}(.*){$end}@si",$string,$result))
		{
			return $result[1];
		}
	}

	private function excurl($url)
	{
		$result = '';

		$ch	= curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,5);	//发起请求最多等待5秒
		curl_setopt($ch, CURLOPT_TIMEOUT,30);		//最多请求10秒
		curl_setopt($ch, CURLOPT_HEADER, 0);

		$this->content = curl_exec($ch);
		curl_close($ch);

		if($this->charset != 'utf-8')
		{
			$this->content = @iconv($this->charset,'UTF-8//ignore',$this->content);
		}
	}
	/** gb2312到utf-8 **/
	private function gb2utf8($text) {

		$filename = dirname(__FILE__)."/../../file/gb2utf8.txt";
		$fp = fopen($filename,"r");
		while(! feof($fp)) {
		list($gb,$utf8) = fgetcsv($fp,10);
		$charset[$gb] = $utf8;
		}
		fclose($fp);

		//提取文本中的成分，汉字为一个元素，连续的非汉字为一个元素
		preg_match_all("/(?:[\x80-\xff].)|[\x01-\x7f]+/",$text,$tmp);
		$tmp = $tmp[0];
		//分离出汉字
		$ar = array_intersect($tmp, array_keys($charset));
		//替换汉字编码
		foreach($ar as $k=>$v)
		$tmp[$k] = $charset[$v];
		//返回换码后的串
		return join('',$tmp);
	}
}