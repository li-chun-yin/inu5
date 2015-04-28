<?php
require_once(APP_PATH.'television/abs/In_controller.php');
class Television_MovieController extends In_controller
{
	public function listAction()
	{
		/*******************************VAR DATA*****************************************/
		$result = array(	'movies'			=> $this->getMoviesAction());
		/******************************* RESULT *****************************************/
		parent::setCacheLifetime(3600);
		parent::view('movie/list',$result);
	}

	public function detailAction()
	{
		/***************************VAR DATA**************************************/
		$result['data']	=array();
		/***************************POST DATA**************************************/
		$movie_id		= (int)$this->_getParam('movie_id');
		/*************************************************************************/
		try
		{
			$obj = getObj('MovieObj');
			$obj->load($movie_id);
			$obj->hit();

			$movie_online_link		= array();
			$movie_download_link	= array();
			foreach($obj['movie_link'] AS $key=>$item)
			{
				if(	$item['movie_link_type']	== ML_ONLINE )
				{
					array_push( $movie_online_link,	array(	'movie_link_id'		=> $item['movie_link_id'],
															'movie_link_url'	=> $item['movie_link_url'],
															'movie_link_name'	=> $item['movie_link_name']) );
				}
				else if( $item['movie_link_type']	== ML_DOWN )
				{
					array_push( $movie_download_link,	array(	'movie_link_id'		=> $item['movie_link_id'],
																'movie_link_url'	=> $item['movie_link_url'],
																'movie_link_name'	=> $item['movie_link_name']) );
				}
			}
			$result['data']	= array(	'movie_id'				=> $obj['movie_id'],
										'movie_name'			=> $obj['movie_name'],
										'movie_hot'				=> $obj['movie_hot'],
										'movie_check_flag'		=> $obj['movie_check_flag'],
										'movie_ischeck'			=> $obj['movie_check_flag'] == 'T' ? '是' : '否',
										'movie_recommend_time'	=> $obj['movie_recommend_time'],
										'movie_insert_time'		=> $obj['movie_insert_time'],
										'movie_insert_ip'		=> $obj['movie_insert_ip'],
										'movie_description'		=> $obj['movie_description'],
										'fk_category_code'		=> $obj['fk_category_code'],
										'category_name'			=> $obj['category_name'],
										'movie_online_link'		=> $movie_online_link,
										'movie_download_link'	=> $movie_download_link,
										'movie_list_img_url'	=> $obj['movie_list_img_url'],
										'movie_page_img_url'	=> $obj['movie_page_img_url'],
										'movie_starring'		=> implode(',',$obj['movie_starring']),
										'movie_director'		=> implode(',',$obj['movie_director']),
										'movie_release_date'	=> $obj['movie_release_date']);

		}
		catch(Zend_Exception $e)
		{
			parent::msg($e->getMessage());
			exit;
		}

		/*****************************RESULT**************************************/
		parent::setTitle($result['data']['movie_name']);
		parent::setDescription(strip_tags($result['data']['movie_description']));
		parent::setCacheLifetime(3600*24*7);
		parent::view('movie/detail',$result);
	}

	public function getMoviesAction()
	{
		/***************************VAR DATA**************************************/
		$result = array('error'=>true,'error_message'=>'','list_size' => 20,'lists'=>array(),'total'=>0);
		$where = array();
		$limit = array();
		/***************************POST DATA**************************************/
		$page			= (int)$this->_getParam('page');
		$category_code	= (string)$this->_getParam('category_code');
		$view			= (string)$this->_getParam('view');
		/*************************************************************************/
		try
		{
			$page			= $page ? $page : 1;
			$start_limit	= ($page-1) * $result['list_size'];
			$length_limit	= $result['list_size'];
			$limit			= array($start_limit,$length_limit);
			if($category_code)
			{
				array_push($where,"fk_category_code LIKE '{$category_code}%'");
			}

			$manager			= getObj('MovieManager');
			$manager['where']	= $where;
			$manager['limit']	= $limit;
			$manager->load();

			foreach($manager['lists'] AS $lists)
			{
				array_push($result['lists'],array(	'movie_id'				=> $lists['movie_id'],
													'movie_name'			=> $lists['movie_name'],
													'movie_list_img_url'	=> $lists['movie_list_img_url'],
													'movie_director'		=> implode(' ',$lists['movie_director']),
													'movie_starring'		=> implode(' ',$lists['movie_starring']),
													'movie_release_date'	=> $lists['movie_release_date']));
			}
			$result['total']	= $manager['total'];
			$result['page']		= $page;
			$result['error']	= false;
		}
		catch(NoRecordException $e)
		{
			$result['error_message']	= '该分类下没有影片存在';
		}
		catch(Zend_Exception $e)
		{
			parent::msg($e->getMessage());
			exit;
		}

		/*****************************RESULT**************************************/
		return (array)$result;
	}
}