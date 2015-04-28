<?php
if (!class_exists('TopCrawl')){require_once(dirname(__FILE__)."/../TopCrawl.php");}
class www_51dy_com extends TopCrawl
{
	function __construct()
	{
		$this->file_name	= basename(__FILE__,'.php');
		$this->charset		= "gb2312";
		$this->search_url	= "http://www.51dy.com/search.asp?searchword={key}";
		$this->checkData	= array();
		parent::__construct();
	}

	public function search($key)
	{
		parent::search($key);

		$this->content = parent::substr($this->content,'<div class="s_box">','<div class="sub_minfo"');

		if(preg_match_all('@<div class="s_rtitle">\s*<h4>([^\r\n]*)</h4>@siU',$this->content,$matches))
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

		if(preg_match_all('@<a href="([^"]*)" class="se_btn" target="_blank"></a>@siU',$this->content,$matches))
		{
			foreach($matches[1] AS $key=>$match)
			{
				$this->result[$key]['online']['movie_link_url'] = strpos($match,'/')===0 ? 'http://www.51dy.com'.$match : $match;
			}
		}
		else
		{
			throw new CrawlFailedException("{$this->file_name}->movie_link Error.");
		}

		if(preg_match_all('@<div class="se_left" >\s*<a[^>]*><img src="([^"]*)"@siU',$this->content,$matches))
		{
			foreach($matches[1] AS $key=>$match)
			{
				$this->result[$key]['movie_list_img_url'] = strpos($match,'/')===0 ? 'http://www.51dy.com'.$match : $match;
				$this->result[$key]['movie_page_img_url'] = strpos($match,'/')===0 ? 'http://www.51dy.com'.$match : $match;
			}
		}
		else
		{
			throw new CrawlFailedException("{$this->file_name}->movie_image Error.");
		}

		if(preg_match_all('@<li class="se_act"><span>导演：</span>([^\r\n]*)</li>@siU',$this->content,$matches))
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

		if(preg_match_all('@<li class="se_star"><span>主演：</span>([^\r\n]*)</li>@siU',$this->content,$matches))
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

		if(preg_match_all('@<p class="s_summary">(.*)</p>@siU',$this->content,$matches))
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

		$this->content = parent::substr($this->content,'<div class="detail">','<div id="m_alltabs" class="mbox">');

		if(preg_match('@<div class="de_text">\s*<h1>([^\r\n]*)</h1>@siU',$this->content,$matches))
		{
			$this->result['movie_name'] = strip_tags($matches[1]);
		}
		else
		{
			throw new CrawlFailedException("{$this->file_name}->movie_name Error.");
		}

		if(preg_match('@<div class="de_img">\s* <img src="([^"]*)"@siU',$this->content,$matches))
		{
				$this->result['movie_page_img_url'] = $this->result['movie_list_img_url'] = strpos($matches[1],'/')===0 ? 'http://www.51dy.com'.$matches[1] : $matches[1];
		}
		else
		{
			throw new CrawlFailedException("{$this->file_name}->movie_image Error.");
		}

		if(preg_match('@<span>导演:</span><p>(.*)</p>@siU',$this->content,$matches))
		{
				$this->result['movie_director'] = str_replace('&nbsp;','',$matches[1]);
		}
		else
		{
			$this->result['movie_director'] = '';
			//throw new CrawlFailedException("{$this->file_name}->movie_director Error.");
		}

		if(preg_match('@<span>主演:</span><p>(.*)</p>@siU',$this->content,$matches))
		{
			$this->result['movie_starring'] = '';
			if(preg_match_all('@<a[^>]*>(.*)</a>@siU',$matches[1],$starring))
			{
				$this->result['movie_starring']	.= implode('&',$starring[1]);
			}
		}
		else
		{
			throw new CrawlFailedException("{$tmovie_namehis->file_name}->movie_starring Error.");
		}

		if(preg_match('@<div class="de_con">(.*)</div>@siU',$this->content,$matches))
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