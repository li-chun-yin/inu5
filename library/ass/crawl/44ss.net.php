<?php
if (!class_exists('TopCrawl')){require_once(dirname(__FILE__)."/../TopCrawl.php");}
class www_44ss_net extends TopCrawl
{
	function __construct()
	{
		$this->file_name	= basename(__FILE__,'.php');
		$this->charset		= "gb2312";
		$this->search_url	= "http://www.44ss.net/SearchPlayFile.aspx?{key}";
		$this->checkData	= array();
		parent::__construct();
	}

	public function search($key)
	{
		parent::search($key);

		$search_key = rawurlencode(iconv('utf-8',$this->charset,$key));

		$this->content = parent::substr(	$this->content,
											'<table width="720" border="0" cellspacing="0" cellpadding="0" align="center">',
											'</table>');

		if(preg_match_all('@<tr class="a1" onmouseover="this.className=\'a2\'" onmouseout="this.className=\'a1\'">(.*)</div>@siU',$this->content,$matches))
		{
			foreach($matches[1] AS $key=>$match)
			{
				$this->result[$key]['movie_name']			= strip_tags(str_replace('&nbsp;','',$match));
			}
		}
		else
		{
			throw new CrawlFailedException("{$this->file_name}->movie_name Error.");
		}

		if(preg_match_all('@onclick="QVODP\(\'([^\']*)\',\'([^\']*)\',\'([^\']*)\',\'[^\']*\',\'[^\']*\',\'[^\']*\',\'([^\']*)\'\)"@siU',$this->content,$matches))
		{


			foreach($matches[1] AS $key=>$match)
			{
				$this->result[$key]['online']['movie_link_url'] = "http://www.44ss.net/ShowMovie.aspx?name={$match}&hid={$matches[3][$key]}&Url={$matches[2][$key]}&tn={$search_key}&mt={$matches[4][$key]}";
			}
		}
		else
		{
			throw new CrawlFailedException("{$this->file_name}->movie_link Error.");
		}

		return $this->result;
	}

	public function detail($url)
	{
		$this->result['online']['movie_link_url'] = $url;

		parent::detail($url);

		$this->content = parent::substr($this->content,'<a class="imga"','<div class="foot">');

		if(preg_match('@<div class="info">\s*<h2>(.*)</h2>@siU',$this->content,$matches))
		{
			$this->result['movie_name'] = strip_tags($matches[1]);
		}
		else
		{
			throw new CrawlFailedException("{$this->file_name}->movie_name Error.");
		}

		if(preg_match('@href="#"><img src="([^"]*)"@siU',$this->content,$matches))
		{
				$this->result['movie_page_img_url'] = $this->result['movie_list_img_url'] = strpos($matches[1],'/')==0 ? 'http://www.44ss.net/'.$matches[1] : $matches[1];
		}
		else
		{
			throw new CrawlFailedException("{$this->file_name}->movie_image Error.");
		}

		if(preg_match('@<span class="wide">导演：(.*)</span>@siU',$this->content,$matches))
		{
				$this->result['movie_director'] = strip_tags(str_replace('&nbsp;','',$matches[1]));
		}
		else
		{
			throw new CrawlFailedException("{$this->file_name}->movie_director Error.");
		}

		if(preg_match('@<p class="actor">主演：(.*)<br />@siU',$this->content,$matches))
		{
			$this->result['movie_starring']	= str_replace('&nbsp;&nbsp;','&',$matches[1]);
		}
		else
		{
			throw new CrawlFailedException("{$this->file_name}->movie_starring Error.");
		}

		if(preg_match('@<span class="wide">上映时间：([\d\-]{10})</span>@siU',$this->content,$matches))
		{
			$this->result['movie_release_date']	= $matches[1];
		}
		else
		{
			$this->result['movie_release_date']	= null;
		}

		if(preg_match('@<ul class="detail" id="voddetail">(.*)</ul>@siU',$this->content,$matches))
		{
			$this->result['movie_description'] = $matches[1];
		}
		else
		{
			throw new CrawlFailedException("{$this->file_name}->movie_description Error.");
		}
		return $this->result;
	}
}