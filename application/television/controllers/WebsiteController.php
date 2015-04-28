<?php
require_once(APP_PATH.'television/abs/In_controller.php');;
class Television_WebsiteController extends In_controller
{
	public function listAction()
	{
		exit;
		/*******************************VAR DATA*****************************************/
		$rst = array(	'websites'			=> $this->getWebsitesAction(DATA_JSON),
						'hot_movies'		=> $this->getHotMoviesAction(DATA_ARRAY,10),
						'recommend_movies'	=> $this->getRecommendMoviesAction(DATA_ARRAY,10));
		/******************************* RESULT *****************************************/
		parent::view('website/list',$rst);
	}

	public function hitAction()
	{
		/*************************************POST DATA******************************************/
		$website_id	= $this->_getParam('id');
		$website_url= $this->_getParam('url');
		/****************************************************************************************/
		try
		{
			$obj = getObj('WebsiteObj');
			$obj->load($website_id);
			$obj->hit();
		}
		catch(Exception $e)
		{
			exit;
		}
		/**************************************RESULT*********************************************/
		$this->_redirect("http://{$website_url}");
	}

	public function getWebsitesAction($type=DATA_JSON,$view=false)
	{
		/***************************VAR DATA**************************************/
		$result	= array('list_size' => 99999999,'total'=>0,'lists'=>array(),'error'=>true);
		$limit	= array();
		/***************************POST DATA**************************************/
		$page		= (int)$this->_getParam('page');
		$type		= (string)($this->_getParam('type') ? $this->_getParam('type') : $type);
		$view		= (string)$this->_getParam('view');
		/*************************************************************************/
		try
		{
			$page			= $page ? $page : 1;
			$start_limit	= ($page-1) * $result['list_size'];
			$length_limit	= $result['list_size'];
			$limit			= array($start_limit,$length_limit);
			$manager		= getObj('WebsiteManager');
			$manager->load();
			foreach($manager['lists'] AS $lists)
			{
				array_push($result['lists'],array(	'website_id'	=> $lists['website_id'],
													'website_name'	=> $lists['website_name'],
													'website_url'	=> $lists['website_url']));
			}
			$result['total']	= $manager['total'];
			$result['error']	= false;
		}
		catch(Exception $e)
		{
			parent::msg($e->getMessage());
			exit;
		}

		/*****************************RESULT**************************************/
		if($type == DATA_JSON)
		{
			$result = json_encode($result);
		}
		else if($type == DATA_ARRAY)
		{
			$result = (array)$result;
		}

		if($view)
		{
			echo $result;
		}
		else
		{
			return $result;
		}
	}

	public function getHotMoviesAction($type=DATA_JSON,$size = 10)
	{
		/***************************VAR DATA**************************************/
		$result	= array('error'=>true,'total'=>0,'lists'=>array());
		/*************************************************************************/
		try
		{
			$manager = getObj('MovieManager');
			$manager->loadHot($size);

			foreach($manager['lists'] AS $lists)
			{
				$movie_online_link = array();
				foreach($lists['movie_online_link'] AS $link)
				{
					array_push($movie_online_link, array(	'movie_link_id'		=>	$link['movie_link_id'],
															'movie_link_url'	=>	$link['movie_link_url'],));
				}

				$movie_download_link = array();
				foreach($lists['movie_download_link'] AS $link)
				{
					array_push($movie_download_link, array(	'movie_link_id'		=>	$link['movie_link_id'],
															'movie_link_url'	=>	$link['movie_link_url'],));
				}
				array_push($result['lists'],array(	'movie_id'				=> $lists['movie_id'],
													'movie_name'			=> $lists['movie_name'],
													'movie_hot'				=> $lists['movie_hot'],
													'movie_online_link'		=> $movie_online_link,
													'movie_download_link'	=> $movie_download_link));
			}
			$result['total'] = $size;
			$result['error'] = false;
		}
		catch(Zend_Exception $e)
		{
			parent::msg($e->getMessage());
			exit;
		}

		/*****************************RESULT**************************************/
		if($type == DATA_JSON)
		{
			$result = json_encode($result);
		}
		else if($type == DATA_ARRAY)
		{
			$result = (array)$result;
		}
		return $result;
	}

	public function getRecommendMoviesAction($type=DATA_JSON,$size = 10)
	{
		/***************************VAR DATA**************************************/
		$result	= array('error'=>true,'total'=>0,'lists'=>array());
		/*************************************************************************/
		try
		{
			$manager = getObj('MovieManager');
			$manager->loadRecommend($size);

			foreach($manager['lists'] AS $lists)
			{
				$movie_online_link = array();
				foreach($lists['movie_online_link'] AS $link)
				{
					array_push($movie_online_link, array(	'movie_link_id'		=>	$link['movie_link_id'],
															'movie_link_url'	=>	$link['movie_link_url'],));
				}

				$movie_download_link = array();
				foreach($lists['movie_download_link'] AS $link)
				{
					array_push($movie_download_link, array(	'movie_link_id'		=>	$link['movie_link_id'],
															'movie_link_url'	=>	$link['movie_link_url'],));
				}
				array_push($result['lists'],array(	'movie_id'				=> $lists['movie_id'],
													'movie_name'			=> $lists['movie_name'],
													'movie_recommend_time'	=> $lists['movie_recommend_time_format'],
													'movie_online_link'		=> $movie_online_link,
													'movie_download_link'	=> $movie_download_link));
			}
			$result['total'] = $size;
			$result['error'] = false;
		}
		catch(Zend_Exception $e)
		{
			$this->_msgbox($e->getMessage());
			exit;
		}

		/*****************************RESULT**************************************/
		if($type == DATA_JSON)
		{
			$result = json_encode($result);
		}
		else if($type == DATA_ARRAY)
		{
			$result = (array)$result;
		}
		return $result;
	}
}