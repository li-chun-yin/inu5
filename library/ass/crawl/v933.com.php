<?php
if (!class_exists('TopCrawl')){require_once(dirname(__FILE__)."/../TopCrawl.php");}
class v933_com extends TopCrawl
{
	function __construct()
	{
		$this->file_name	= basename(__FILE__,'.php');
		$this->charset		= "gb2312";
		$this->search_url	= "http://www.v933.com/search.asp?searchword={key}";
		$this->rss_url		= "http://www.v933.com/rss.xml";
		$this->checkData	= array();
		parent::__construct();
	}

	public function search($key)
	{
		parent::search($key);

		$this->content = parent::substr($this->content,'<div class="soyall">','<div class="page">');

		if(preg_match_all('@<h1 class="fl">([^\r\n]*)</h1>@siU',$this->content,$matches))
		{
			foreach($matches[1] AS $key=>$match)
			{
				$this->result[$key]['movie_name']			= strip_tags($match);
				$this->result[$key]['movie_description']	= '';
			}
		}
		else
		{
			throw new CrawlFailedException("{$this->file_name}->movie_name Error.");
		}

		if(preg_match_all('@<h1 class="fl"><a href="([^"]*)"@siU',$this->content,$matches))
		{
			foreach($matches[1] AS $key=>$match)
			{
				$this->result[$key]['online']['movie_link_url'] = strpos($match,'/')===0 ? 'http://www.v933.com/'.$match : $match;
			}
		}
		else
		{
			throw new CrawlFailedException("{$this->file_name}->movie_link Error.");
		}

		if(preg_match_all('@<a[^>]*class="imgA"[^>]*><img src="([^"]*)"@siU',$this->content,$matches))
		{
			foreach($matches[1] AS $key=>$match)
			{
				$this->result[$key]['movie_list_img_url'] = strpos($match,'/')===0 ? 'http://www.v933.com/'.$match : $match;
				$this->result[$key]['movie_page_img_url'] = $this->result[$key]['movie_list_img_url'];
			}
		}
		else
		{
			throw new CrawlFailedException("{$this->file_name}->movie_image Error.");
		}

		if(preg_match_all('@<dd>导演:(.*)</dd>@siU',$this->content,$matches))
		{
			foreach($matches[1] AS $key=>$match)
			{
				$this->result[$key]['movie_director'] = str_replace('&nbsp;','',$match);
			}
		}
		else
		{
			throw new CrawlFailedException("{$this->file_name}->movie_director Error.");
		}

		if(preg_match_all('@ac_search\(\'([^\']*)\'@siU',$this->content,$matches))
		{
			foreach($matches[1] AS $key=>$match)
			{
				$this->result[$key]['movie_starring'] = str_replace(array('&nbsp;',','),array('','&'),$match);
			}
		}
		else
		{
			throw new CrawlFailedException("{$this->file_name}->movie_starring Error.");
		}

		return $this->result;
	}

	public function detail($url)
	{
		$this->result['online']['movie_link_url'] = $url;

		parent::detail($url);

		$this->content = parent::substr($this->content,'<div class="mainarea">','<div class="main_r">');

		if(preg_match('@<h1 class="fl">(.*)</h1>@siU',$this->content,$matches))
		{
			$this->result['movie_name'] = strip_tags($matches[1]);
		}
		else
		{
			throw new CrawlFailedException("{$this->file_name}->movie_name Error.");
		}

		if(preg_match('@<div class="info_box2">\s*<a[^>]*>\s*<img src="([^"]*)"@siU',$this->content,$matches))
		{
				$this->result['movie_page_img_url'] = $this->result['movie_list_img_url'] = strpos($matches[1],'/')===0 ? 'http://www.v933.com/'.$matches[1] : $matches[1];
		}
		else
		{
			throw new CrawlFailedException("{$this->file_name}->movie_image Error.");
		}

		if(preg_match('@<dd>导演:([^\r\n]*)</dd>@siU',$this->content,$matches))
		{
				$this->result['movie_director'] = strip_tags(str_replace('&nbsp;','',$matches[1]));
		}
		else
		{
			throw new CrawlFailedException("{$this->file_name}->movie_director Error.");
		}

		if(preg_match('@<dd>主演:([^\r\n]*)</dd>@siU',$this->content,$matches))
		{
			$this->result['movie_starring'] = '';
			if(preg_match_all('@<a[^>]*>(.*)</a>@siU',$matches[1],$starring))
			{
				$this->result['movie_starring']	.= implode('&',$starring[1]);
			}
		}
		else
		{
			throw new CrawlFailedException("{$this->file_name}->movie_starring Error.");
		}

		if(preg_match('@<div class="allcont">(.*)</div>@siU',$this->content,$matches))
		{
			$this->result['movie_description'] = $matches[1];
		}
		else
		{
			throw new CrawlFailedException("{$this->file_name}->movie_description Error.");
		}
		return $this->result;
	}

	public function getAutoUrl()
	{
		return array('http://www.v933.com');
	}

	public function isDetailUrl($url)
	{
		if(preg_match('@^http://www\.v933\.com/detail@siU',$url,$matches))
		{
			return TRUE;
		}
		return FALSE;
	}
}