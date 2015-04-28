<?php
if (!class_exists('TopCrawl')){require_once(dirname(__FILE__)."/../TopCrawl.php");}
class letv_com extends TopCrawl
{
	function __construct()
	{
		$this->file_name	= basename(__FILE__,'.php');
		$this->charset		= "utf-8";
		$this->search_url	= "http://so.letv.com/s?wd={key}";
		$this->checkData	= array();
		parent::__construct();
	}

	public function search($key)
	{
		parent::search($key);

		$this->content = parent::substr($this->content,'<div class="sotop">','<div class="solist">');

		if(preg_match_all('@<h1 class="fl">([^\r\n]*)</h1>@siU',$this->content,$matches))
		{
			foreach($matches[1] AS $key=>$match)
			{
				$this->result[$key]['movie_name'] = strip_tags($match);
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
				$this->result[$key]['online']['movie_link_url'] = strpos($match,'/')===0 ? 'http://so.letv.com'.$match : $match;
			}
		}
		else
		{
			throw new CrawlFailedException("{$this->file_name}->movie_link Error.");
		}

		if(preg_match_all('@class="imgA"><img src="([^"]*)"@siU',$this->content,$matches))
		{
			foreach($matches[1] AS $key=>$match)
			{
				$this->result[$key]['movie_list_img_url'] = strpos($match,'/')===0 ? 'http://so.letv.com'.$match : $match;
				$this->result[$key]['movie_page_img_url'] = strpos($match,'/')===0 ? 'http://so.letv.com'.$match : $match;
			}
		}
		else
		{
			throw new CrawlFailedException("{$this->file_name}->movie_image Error.");
		}

		if(preg_match_all('@<dd class="d-2">\s*导演：(.*)</dd>@siU',$this->content,$matches))
		{
			foreach($matches[1] AS $key=>$match)
			{
				$movie_director = '';
				if(preg_match_all('@<a[^>]*>(.*)</a>@siU',$match,$directors))
				{
					$movie_director	.= implode('&',$directors[1]);
				}
				$this->result[$key]['movie_director'] = str_replace('&nbsp;','',$movie_director);
			}
		}
		else
		{
			throw new CrawlFailedException("{$this->file_name}->movie_director Error.");
		}

		if(preg_match_all('@<dd class="d-3">\s*主演：(.*)</dd>@siU',$this->content,$matches))
		{
			foreach($matches[1] AS $key=>$match)
			{
				$movie_starring = '';
				if(preg_match_all('@<a[^>]*>(.*)</a>@siU',$match,$starrings))
				{
					$movie_starring	.= implode('&',$starrings[1]);
				}
				$this->result[$key]['movie_starring'] = str_replace('&nbsp;','',$movie_starring);
			}
		}
		else
		{
			throw new CrawlFailedException("{$this->file_name}->movie_starring Error.");
		}

		if(preg_match_all('@<dd class="d-5">(.*)</dd>@siU',$this->content,$matches))
		{
			foreach($matches[1] AS $key=>$match)
			{
				$this->result[$key]['movie_description'] = $match;
			}
		}
		else
		{
			throw new CrawlFailedException("{$this->file_name}->movie_description Error.");
		}
		return $this->result;
	}

	public function detail($url)
	{
		$this->result['online']['movie_link_url'] = $url;

		parent::detail($url);

		if(preg_match('@pagelogo :\'([^\']*)\',@siU',$this->content,$matches))
		{
				$this->result['movie_page_img_url'] = $this->result['movie_list_img_url'] = strpos($matches[1],'/')===0 ? 'http://www.letv.com/'.$matches[1] : $matches[1];
				$this->content = parent::substr($this->content,'<dl class="textInfo">','</dl>');
		}
		else
		{
			$this->content = parent::substr($this->content,'<div class="contR">','<div class="LetvBox">');
		}

		if(preg_match('@<dt>([^\r\n]*)</dt>@siU',$this->content,$matches))
		{
			$this->result['movie_name'] = strip_tags($matches[1]);
		}
		else if(preg_match('@<h2>.*<strong>(.*)</h2>@siU',$this->content,$matches))
		{
			$this->result['movie_name'] = strip_tags($matches[1]);
		}
		else
		{
			throw new CrawlFailedException("{$this->file_name}->movie_name Error.");
		}



		if(preg_match('@<p class="p1">导演：(.*)</p>@siU',$this->content,$matches))
		{
				$this->result['movie_director'] = '';
				if(preg_match_all('@<a[^>]*>(.*)</a>@siU',$matches[1],$director))
				{
					$this->result['movie_director']	.= implode('&',$director[1]);
				}
		}
		else
		{
			//throw new CrawlFailedException("{$this->file_name}->movie_director Error.");
		}

		if(preg_match('@<p class="p2">主演：(.*)</p>@siU',$this->content,$matches))
		{
			$this->result['movie_starring'] = '';
			if(preg_match_all('@<a[^>]*>(.*)</a>@siU',$matches[1],$starring))
			{
				$this->result['movie_starring']	.= implode('&',$starring[1]);
			}
		}
		else
		{
			//throw new CrawlFailedException("{$tmovie_namehis->file_name}->movie_starring Error.");
		}

		if(preg_match('@<p class="p7">(.*)</p>@siU',$this->content,$matches))
		{
			$this->result['movie_description'] = $matches[1];
		}
		else if(preg_match('@<div id="j-descript">(.*)</div>@siU',$this->content,$matches))
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
		return array('http://so.letv.com');
	}

	public function isDetailUrl($url)
	{
		if(! preg_match('@^http://so.letv.com/list/@siU',$url,$matches))
		{
			return TRUE;
		}
		return FALSE;
	}
}