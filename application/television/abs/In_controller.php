<?php
require_once TOP.'Abs_controllers.php';
class In_controller extends Abs_controllers
{
	private $title			= '由我影视导航|为您轻松找到想看的影片而努力!',
			$description	= '由我影视导航,是一个专业影视剧搜索网站,只要你想看,一定帮你搜到影片为目标。',
			$keywords		= '由我影视导航,电视剧,电影,视频,直播,最新影视,短片,动漫,体育,自拍,搜索,影片,影视,主演,导演,观看',
			$cache_lifetime	= 86400;
	public function indexAction(){}

	protected function setTitle($title)
	{
		$this->title = $title;
	}

	protected function setDescription($description)
	{
		$this->description = $description;
	}

	protected function setKeywords($keywords)
	{
		$this->keywords = $keywords;
	}

	protected function setCacheLifetime($time)
	{
		$this->cache_lifetime = $time;
	}

	protected function view($path,$data=array())
	{
		$view = new Smarty();
		$view->template_dir	= array(APP_PATH.'television/views/common',APP_PATH.'television/views/scripts',APP_PATH.'television/views/layouts');
		$view->compile_dir	= APP_PATH.'television/templates';
		$view->config_dir	= APP_PATH.'television/configs';
		$view->cache_dir	= APP_PATH.'television/cache';
		$view->plugins_dir	= PLUGIN_DIR;
		if(substr($_SERVER['HTTP_HOST'],-3) == 'com' || substr($_SERVER['HTTP_HOST'],-3) == '.cn')
		{
			$view->caching			= TRUE;
			$view->cache_lifetime	= $this->cache_lifetime;
			$view->force_compile	= FALSE;
		}
		else
		{
			$view->caching		= FALSE;
			$view->force_compile= TRUE;
		}
		$view->assign('search_word_value',		'');
		while(list($name,$value) = each($data))
		{
			$view->assign($name,			$value);
		}
		$view->assign('title',			$this->title);
		$view->assign('description',	$this->description);
		$view->assign('keywords',		$this->keywords);
		$view->assign('category_data',	$this->_getCategory());

		$view->assign('header',			"header.phtml");
		$view->assign('etc_header',		"etcHeader.phtml");
		$view->assign('footer',			"footer.phtml");
		$view->assign('category',		"category.phtml");
		$view->assign('search_category',"searchCategory.phtml");
		$view->assign('content',		"{$path}.phtml");

		$cache_id	= sha1($_SERVER['REQUEST_URI']);
		if($this->skin == 'none')
		{
			$view->display("{$path}.phtml",$cache_id);
		}
		else
		{
			$view->display("{$this->skin}.phtml",$cache_id);
		}
	}

	private function _getCategory()
	{
		$result = array();
	/***********************************************************/
		try
		{
			$manager = getObj('CategoryManager');
			$manager->loadTelevisionCategory();
			foreach($manager['lists'] as $lists)
			{
				array_push($result,array(	'category_code'	=> $lists['category_code'],
											'category_name'	=> $lists['category_name']));
			}
		}
		catch(Zend_Exception $e)
		{
			parent::_redirect('/');
		}
	/*********************RESULT********************************/

		return $result;
	}

	/**
	 *
	 * Enter description here ...
	 * @param (string) $file 文件名
	 * @param (int) $time 时间戳
	 */
	protected function check_html_file($file,$time)
	{
		$result = false;
		/***********************************************************/
		if(is_file($file))
		{
			$update_time = filemtime($file);
			if(	time()	< $update_time + $time)
			{
				$result = true;
			}
		}
		/***********************************************************/
		return $result;
	}
}