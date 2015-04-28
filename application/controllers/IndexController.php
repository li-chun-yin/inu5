<?php
require_once(APP_PATH.'/abs/In_controller.php');
class IndexController extends In_controller
{
	public function init()
	{
		parent::init();
	}
	public function indexAction()
	{
		/**********************VAR DATA*************************************/
		$result = array(	'recommend_website'			=> $this->getWebsiteAction(8,'recommend'),
							'hot_movie'					=> $this->getHotMoviesAction(8),
							'recommend_movie'			=> $this->getRecommendMoviesAction(17)
					);
		/************************RESUTL**********************************/
		$this->skin = 'main';
		parent::setCacheLifetime(3600);
		parent::view('index',$result);
	}

	public function getWebsiteAction($size=20,$type='recommend')
	{
		/**********************VAR DATA*************************************/
		$result		= array();
		/******************************************************************/
		try
		{
			$manager= getObj('WebsiteManager');
			switch($type)
			{
				case 'recommend':
					$manager->loadRecommend($size);
					break;
				case 'new':
					$manager->loadNew($size);
					break;
				case 'hot':
					$manager->loadHot($size);
					break;
			}
			foreach($manager['lists'] AS $lists)
			{
				array_push($result,		array(	'website_id'	=> $lists['website_id'],
												'website_name'	=> $lists['website_name'],
												'website_url'	=> $lists['website_url'],
												'website_hot'	=> $lists['website_hot']+round(time()/10000)));
			}
		}
		catch ( Zend_Exception $e)
		{
			parent::_redirect('/');
		}
		/************************RESUTL**********************************/

		return $result;
	}

	private function getHotMoviesAction($size = 10)
	{
		/***************************VAR DATA**************************************/
		$result	= array();
		/*************************************************************************/
		try
		{
			$manager = getObj('MovieManager');
			$manager->loadHot($size);

			foreach($manager['lists'] AS $lists)
			{
				array_push($result,		array(	'movie_id'				=> $lists['movie_id'],
												'movie_name'			=> $lists['movie_name'],
												'movie_hot'				=> $lists['movie_hot']	+	round(time()/100000)));
			}
		}
		catch(NoRecordException $e)
		{
			//没有记录
		}
		catch(Zend_Exception $e)
		{
			parent::_redirect('/');
		}

		/*****************************RESULT**************************************/

		return (array)$result;
	}

	private function getRecommendMoviesAction($size = 10)
	{
		/***************************VAR DATA**************************************/
		$result			= array();
		/*************************************************************************/
		try
		{
			$manager = getObj('MovieManager');
			$manager->loadRecommend($size);

			foreach($manager['lists'] AS $key=>$lists)
			{
				array_push($result,	array(	'movie_id'				=> $lists['movie_id'],
											'movie_name'			=> $lists['movie_name'],
											'movie_list_img_url'	=> $lists['movie_list_img_url'],
											'movie_description'		=> $lists['movie_description'],
											'movie_starring'		=> implode(',',$lists['movie_starring']),
											'movie_director'		=> implode(',',$lists['movie_director']),
											'movie_release_date'	=> $lists['movie_release_date'],
											'movie_hot'				=> $lists['movie_hot'],
											'movie_recommend_time'	=> substr($lists['movie_recommend_time'],0,10)));
			}
		}
		catch(NoRecordException $e)
		{
			//没有记录
		}
		catch(Zend_Exception $e)
		{
			parent::_redirect('/');
		}

		/*****************************RESULT**************************************/

		return (array)$result;
	}
}