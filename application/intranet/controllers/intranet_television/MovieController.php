<?php
require_once(APP_PATH.'intranet/abs/In_controller.php');
class Intranet_Television_MovieController extends In_controller
{
	public function init()
	{
        parent::isLogin();
        $this->menu = 'television';
	}

	/**
	 *
	 * Enter description here ...
	 * @since 2012.1.22
	 */
	public function indexAction()
	{
		$result['json_data']	= $this->getAction(DATA_JSON);
		$result['category']		= $this->getCategory();
		/*******************************DATAS*****************************************/
		parent::view('/television/movie/index',$result);
	}

	/**
	 * 2012.1.15
	 * Enter description here ...
	 */
	public function autoUpdateAction()
	{
		if($this->_getParam('movie_id')>0)
		{
			$this->_updateAction();
		}
		else
		{
			$this->_insertAction();
		}
	}

	/**
	 *
	 * Enter description here ...
	 * @since 2012.1.22.
	 * @throws DbUpdateException
	 */
	private function _updateAction()
	{
		/***************************VAR DATA**************************************/
		$result	= array('error' => true);
		/**************************POST DATA**************************************/
		$movie_id				= (int) $this->_getParam('movie_id');
		$movie_name				= (string) $this->_getParam('movie_name');
		$movie_check_flag		= (string) $this->_getParam('movie_check_flag');
		$movie_list_img_url		= (string) $this->_getParam('movie_list_img_url');
		$movie_page_img_url		= (string) $this->_getParam('movie_page_img_url');
		$movie_starring			= (string) ($this->_getParam('movie_starring'));
		$movie_director			= (string) ($this->_getParam('movie_director'));
		$movie_release_date		= (string) $this->_getParam('movie_release_date');
		$fk_category_code		= (string) $this->_getParam('fk_category_code');
		$movie_description		= (string) $this->_getParam('movie_description');
		$movie_online_url		= (array) $this->_getParam('movie_online_url');
		$movie_online_url_id	= (array) $this->_getParam('movie_online_url_id');
		$movie_download_url		= (array) $this->_getParam('movie_download_url');
		$movie_download_url_id	= (array) $this->_getParam('movie_download_url_id');
		/**************************************************************************/
		try
		{
			getObj('Movie_linkObj');
			$movie_link = array();
			foreach($movie_online_url AS $key=>$url)
			{
				if(!empty($movie_online_url_id[$key]) || !empty($url))
				{
					array_push($movie_link, 	array(	'movie_link_id'			=> @$movie_online_url_id[$key],
														'movie_link_url'		=> $url,
														'movie_link_type'		=> ML_ONLINE,
														'movie_link_check_flag'	=> 'T'));
				}
			}

			foreach($movie_download_url AS $key=>$url)
			{
				if(!empty($movie_download_url_id[$key]) || !empty($url))
				{
					array_push($movie_link, array(	'movie_link_id'			=> @$movie_download_url_id[$key],
													'movie_link_url'		=> $url,
													'movie_link_type'		=> ML_DOWN,
													'movie_link_check_flag'	=> 'T'));
				}
			}

			$obj = getObj('MovieObj');
			$obj->load($movie_id);
			$obj['movie_name']			= $movie_name;
			$obj['fk_category_code']	= $fk_category_code;
			$obj['movie_check_flag']	= $movie_check_flag;
			$obj['movie_list_img_url']	= $movie_list_img_url;
			$obj['movie_page_img_url']	= $movie_page_img_url;
			$obj['movie_starring']		= $movie_starring;
			$obj['movie_director']		= $movie_director;
			$obj['movie_release_date']	= $movie_release_date;
			$obj['movie_description']	= $movie_description;
			$obj['movie_link']			= $movie_link;
			$obj->update();

			$result['error'] = false;
		}
		catch(Zend_Exception $e)
		{
			$result['error_message'] = $e->getMessage();
		}

		/**************************RESULT*********************************/
		echo json_encode($result);exit;
	}

	/**
	 *
	 * Enter description here ...
	 * @throws DbInsertException
	 */
	private function _insertAction()
	{
		/***************************VAR DATA**************************************/
		$result = array('error' => true);
		/**************************POST DATA**************************************/
		$movie_name				= (string) $this->_getParam('movie_name');
		$movie_check_flag		= (string) $this->_getParam('movie_check_flag');
		$movie_list_img_url		= (string) $this->_getParam('movie_list_img_url');
		$movie_page_img_url		= (string) $this->_getParam('movie_page_img_url');
		$movie_starring			= (string) ($this->_getParam('movie_starring'));
		$movie_director			= (string) ($this->_getParam('movie_director'));
		$movie_release_date		= (string) $this->_getParam('movie_release_date');
		$fk_category_code		= (string) $this->_getParam('fk_category_code');
		$movie_online_url		= (array) $this->_getParam('movie_online_url');
		$movie_download_url		= (array) $this->_getParam('movie_download_url');
		$movie_description		= (string) $this->_getParam('movie_description');
		/**************************************************************************/
		try
		{
			getObj('Movie_linkObj');
			$movie_link	=	array();
			foreach($movie_online_url AS $url)
			{
				if(!empty($url))
				{
					array_push($movie_link, 		array(	'movie_link_url'		=>	$url,
															'movie_link_type'		=> ML_ONLINE,
															'movie_link_check_flag'	=>	'T'));
				}
			}

			foreach($movie_download_url AS $url)
			{
				if(!empty($url))
				{
					array_push($movie_link,			array(	'movie_link_url'		=>	$url,
															'movie_link_type'		=> ML_DOWN,
															'movie_link_check_flag'	=>	'T'));
				}
			}

			$obj = getObj('MovieObj');
			$obj['fk_category_code']	= $fk_category_code;
			$obj['movie_name']			= $movie_name;
			$obj['movie_check_flag']	= $movie_check_flag;
			$obj['movie_list_img_url']	= $movie_list_img_url;
			$obj['movie_page_img_url']	= $movie_page_img_url;
			$obj['movie_starring']		= $movie_starring;
			$obj['movie_director']		= $movie_director;
			$obj['movie_release_date']	= $movie_release_date;
			$obj['movie_description']	= $movie_description;
			$obj['movie_link']			= $movie_link;
			$obj->insert();

			$result['error'] = false;
		}
		catch(Zend_Exception $e)
		{
			$result['error_message'] = $e->getMessage();
		}

		/**************************RESULT*********************************/
		echo json_encode($result);exit;
	}

	/**
	 *
	 * Enter description here ...
	 * @since 2012.1.22
	 * @throws DbUpdateException
	 */
	public function isRecommendAction()
	{
		/***************************VAR DATA**************************************/
		$result = array('error' => true);

		/**************************POST DATA**************************************/
		$movie_id				= (string) $this->_getParam('movie_id');
		$movie_recommend_time	= (int) ($this->_getParam('is_recommend')=='T' ? time() : 0);

		/**************************************************************************/
		try
		{
			$obj = getObj('MovieObj');
			$obj->load($movie_id);
			$obj['movie_recommend_time']	= $movie_recommend_time;
			$obj->update();
			$result['error'] = false;
		}
		catch(DbUpdateException $e)
		{
			$result['error_message'] = '程序异常,推荐失败.';
		}
		catch(Zend_Exception $e)
		{
			$result['error_message'] = $e->getMessage();
		}

		/**************************RESULT*********************************/
		echo json_encode($result);exit;
	}

	/**
	 *
	 * Enter description here ...
	 * @since 2012.1.22
	 * @throws DbUpdateException
	 */
	public function deleteAction()
	{
		/***************************VAR DATA**************************************/
		$result = array('error' => true);

		/**************************POST DATA**************************************/
		$delete_ids				= (array) $this->_getParam('movie_id');
		/**************************************************************************/
		try
		{
			foreach($delete_ids AS $id)
			{
				$obj = getObj('MovieObj');
				$obj->load($id);
				$obj->delete();
			}
			$result['error'] = false;
		}
		catch(Zend_Exception $e)
		{
			$result['error_message'] = $e->getMessage();
		}

		/**************************RESULT*********************************/
		echo json_encode($result);exit;
	}

	public function insertByUrlAction()
	{
		/***************************VAR DATA**************************************/
		$result				= array('error' => true);
		/**************************POST DATA**************************************/
		$movie_link_url			= (string) $this->_getParam('movie_link_url');

		/**************************************************************************/
		try
		{
			$ass = getAss('Crawl');
			$data = $ass->loadByUrl($movie_link_url);

			$movie_online_link	= array();
			$movie_download_link= array();
			foreach($data['movie_link'] AS $link)
			{
				if(	$link['movie_link_type']	== ML_ONLINE )
				{
					array_push( $movie_online_link,	array(	'movie_link_id'		=> $link['movie_link_id'],
															'movie_link_url'	=> $link['movie_link_url'] ) );
				}
				else if( $link['movie_link_type']	== ML_DOWN )
				{
					array_push( $movie_download_link,	array(	'movie_link_id'		=> $link['movie_link_id'],
																'movie_link_url'	=> $link['movie_link_url'] ) );
				}
			}
			$result['lists']	= array(	'movie_id'				=> $data['movie_id'],
											'movie_name'			=> $data['movie_name'],
											'movie_hot'				=> $data['movie_hot'],
											'movie_check_flag'		=> $data['movie_check_flag'],
											'movie_recommend_time'	=> $data['movie_recommend_time'],
											'movie_insert_time'		=> $data['movie_insert_time'],
											'movie_insert_ip'		=> $data['movie_insert_ip'],
											'movie_description'		=> $data['movie_description'],
											'fk_category_code'		=> $data['fk_category_code'],
											'movie_online_link'		=> $movie_online_link,
											'movie_download_link'	=> $movie_download_link,
											'movie_list_img_url'	=> $data['movie_list_img_url'],
											'movie_page_img_url'	=> $data['movie_page_img_url'],
											'movie_starring'		=> $data['movie_starring'],
											'movie_director'		=> $data['movie_director'],
											'movie_release_date'	=> $data['movie_release_date']);

			$result['error'] = false;
		}
		catch(Zend_Exception $e)
		{
			$result['error_message'] = $e->getMessage();
		}

		/**************************RESULT*********************************/
		echo json_encode($result);exit;
	}

	public function meregeAction()
	{
		/***************************VAR DATA**************************************/
		$isUpdate			= FALSE;
		$result				= array('error' => true);
		$where				= array();
		/**************************POST DATA**************************************/
		$movie_ids			=(array) $this->_getParam('movie_id');
		/**************************************************************************/
		try
		{
			$where = array("movie_id IN ('" . implode("','",$movie_ids) . "')");
			$manager = getObj('MovieManager');
			$manager['where']	= $where;
			$manager->load();

			for($i = 1; $i<count($manager['lists']); $i++)
			{
				$list = $manager['lists'][$i];
				foreach($list['movie_link'] AS $link)
				{
					$link['fk_movie_id'] =  $manager['lists'][0]['movie_id'];
					$link->update();
				}

				if( empty($manager['lists'][0]['movie_list_img_url']) && !empty($list['movie_list_img_url']) ){@$manager['lists'][0]['movie_list_img_url'] = $list['movie_list_img_url'];$isUpdate=TRUE;}
				if( empty($manager['lists'][0]['movie_page_img_url']) && !empty($list['movie_page_img_url']) ){@$manager['lists'][0]['movie_page_img_url'] = $list['movie_page_img_url'];$isUpdate=TRUE;}
				if( empty($manager['lists'][0]['movie_starring']) && !empty($list['movie_starring']) ){@$manager['lists'][0]['movie_starring'] = $list['movie_starring'];$isUpdate=TRUE;}
				if( empty($manager['lists'][0]['movie_director']) && !empty($list['movie_director']) ){@$manager['lists'][0]['movie_director'] = $list['movie_director'];$isUpdate=TRUE;}
				if( empty($manager['lists'][0]['movie_release_date']) && !empty($list['movie_release_date']) ){@$manager['lists'][0]['movie_release_date'] = $list['movie_release_date'];$isUpdate=TRUE;}
				if( empty($manager['lists'][0]['fk_category_code']) && !empty($list['fk_category_code']) ){@$manager['lists'][0]['fk_category_code'] = $list['fk_category_code'];$isUpdate=TRUE;}
				if( empty($manager['lists'][0]['movie_description']) && !empty($list['movie_description']) ){@$manager['lists'][0]['movie_description'] = $list['movie_description'];$isUpdate=TRUE;}
				if( $list['movie_hot'] > 0 ){@$manager['lists'][0]['movie_hot'] += $list['movie_hot'];$isUpdate=TRUE;}

				$list->delete();
			}

			if($isUpdate)
			{
				$manager['lists'][0]->update();
			}

			$result['error'] = false;
		}
		catch(Zend_Exception $e)
		{
			$result['error_message'] = $e->getMessage();
		}

		/**************************RESULT*********************************/
		echo json_encode($result);exit;
	}

	/**
	 * @since 2012.03.26
	 * Enter description here ...
	 * @param $type
	 * @param $view
	 */
	public function getAction($type=DATA_JSON,$view=false)
	{
		/***************************VAR DATA**************************************/
		$result	= array('error'=>true,'lists'=>array(),'total'=>0,'list_size' => 30);
		$where	= array();
		$limit	= array();
		/***************************POST DATA**************************************/
		$page				= (int)$this->_getParam('page');
		$type				= (string)($this->_getParam('type') ? $this->_getParam('type') : $type);
		$view				= (string)($this->_getParam('view') ? $this->_getParam('view') : $view);
		$fk_category_code	= (string)$this->_getParam('fk_category_code');
		$movie_check_flag	= (string)$this->_getParam('movie_check_flag');
		/*************************************************************************/
		try
		{
			if(!empty($fk_category_code))
			{
				array_push($where,"fk_category_code LIKE '{$fk_category_code}%'");
			}

			if(!empty($movie_check_flag))
			{
				array_push($where,"movie_check_flag='{$movie_check_flag}'");
			}

			$where			= parent::checkWhere($where);
			$page			= $page ? $page : 1;
			$start_limit	= ($page-1) * $result['list_size'];
			$length_limit	= $result['list_size'];
			$limit			= array($start_limit,$length_limit);

			$manager = getObj('MovieManager');
			$manager['where']	= $where;
			$manager['limit']	= $limit;
			$manager->load();
			foreach($manager['lists'] AS $lists)
			{
				array_push($result['lists'], array(	'movie_id'				=> $lists['movie_id'],
													'movie_name'			=> $lists['movie_name'],
													'movie_hot'				=> $lists['movie_hot'],
													'movie_check_flag'		=> $lists['movie_check_flag'],
													'movie_recommend_time'	=> $lists['movie_recommend_time'],
													'movie_insert_time'		=> $lists['movie_insert_time'],
													'movie_insert_ip'		=> $lists['movie_insert_ip'],
													'movie_description'		=> $lists['movie_description'],
													'fk_category_code'		=> $lists['fk_category_code'],
													'movie_list_img_url'	=> $lists['movie_list_img_url'],
													'movie_page_img_url'	=> $lists['movie_page_img_url'],
													'movie_starring'		=> $lists['movie_starring'],
													'movie_director'		=> $lists['movie_director'],
													'movie_release_date'	=> $lists['movie_release_date']
														));
			}
			$result['total'] = $manager['total'];
			$result['error'] = false;
		}
		catch(NoRecordException $e)
		{
			$result['error'] = false;
		}
		catch(Zend_Exception $e)
		{
			parent::msg($e->getMessage());
			exit;
		}

		/*****************************RESULT**************************************/
		if($type == DATA_JSON){
			$result = json_encode($result);
		}else if($type == DATA_ARRAY){
			$result = (array)$result;
		}

		if($view){
			echo $result;
		}else{
			return $result;
		}
	}

	public function loadAction()
	{
		/***************************VAR DATA**************************************/
		$result	= array('error'=>true,'lists'=>array());

		/***************************POST DATA**************************************/
		$movie_id	= $this->_getParam('movie_id');
		/*************************************************************************/
		try
		{
			$obj = getObj('MovieObj');
			$obj->load($movie_id);

			$movie_online_link		= array();
			$movie_download_link	= array();
			foreach($obj['movie_link'] AS $link)
			{
				if(	$link['movie_link_type']	== ML_ONLINE )
				{
					array_push( $movie_online_link,	array(	'movie_link_id'		=> $link['movie_link_id'],
															'movie_link_url'	=> $link['movie_link_url'] ) );
				}
				else if( $link['movie_link_type']	== ML_DOWN )
				{
					array_push( $movie_download_link,	array(	'movie_link_id'		=> $link['movie_link_id'],
																'movie_link_url'	=> $link['movie_link_url']) );
				}
			}

			$result['lists']	= array(	'movie_id'				=> $obj['movie_id'],
											'movie_name'			=> $obj['movie_name'],
											'movie_hot'				=> $obj['movie_hot'],
											'movie_check_flag'		=> $obj['movie_check_flag'],
											'movie_recommend_time'	=> $obj['movie_recommend_time'],
											'movie_insert_time'		=> $obj['movie_insert_time'],
											'movie_insert_ip'		=> $obj['movie_insert_ip'],
											'movie_description'		=> $obj['movie_description'],
											'fk_category_code'		=> $obj['fk_category_code'],
											'movie_online_link'		=> $movie_online_link,
											'movie_download_link'	=> $movie_download_link,
											'movie_list_img_url'	=> $obj['movie_list_img_url'],
											'movie_page_img_url'	=> $obj['movie_page_img_url'],
											'movie_starring'		=> implode('&',$obj['movie_starring']),
											'movie_director'		=> implode('&',$obj['movie_director']),
											'movie_release_date'	=> $obj['movie_release_date']);
			$result['error'] = false;
		}
		catch(Zend_Exception $e)
		{
			parent::msg($e->getMessage());
			exit;
		}

		/*****************************RESULT**************************************/

		echo json_encode($result);
	}

	/**
	 * @since 2012.03.30
	 * Enter description here ...
	 */
	public function loadByNameAction()
	{
		/***************************VAR DATA**************************************/
		$result	= array('error'=>true,'lists'=>array());

		/***************************POST DATA**************************************/
		$movie_name	= $this->_getParam('movie_name');
		/*************************************************************************/
		try
		{
			$manager = getObj('MovieManager');
			$manager->loadByName($movie_name);
			foreach($manager['lists'] AS $list)
			{
				array_push($result['lists'],	array(	'movie_id'				=> $list['movie_id'],
														'movie_name'			=> $list['movie_name'],
														'movie_list_img_url'	=> $list['movie_list_img_url'],
														'movie_online_link'		=> isset($list['movie_online_link'][0]) ? $list['movie_online_link'][0]['movie_link_url'] : '#',
														'movie_download_link'	=> isset($list['movie_download_link'][0]) ? $list['movie_download_link'][0]['movie_link_url'] : '#'));
			}

			$result['error'] = false;
		}
		catch(Zend_Exception $e)
		{
			$result['error_message'] = $e->getMessage();
		}

		/*****************************RESULT**************************************/

		echo json_encode($result);
	}

	/**
	 * @since 2012.04.20
	 */
	private function getCategory()
	{
		/***************************VAR DATA**************************************/
		$result	= array();
		/*************************************************************************/
		try
		{
			$manager			= getObj('CategoryManager');
			$manager['where']	= array("category_type='".CT_TELEVISION."'");
			$manager->load();
			foreach($manager['lists'] AS $lists)
			{
				array_push($result, array(	'category_id'	=> $lists['category_id'],
											'category_code'	=> $lists['category_code'],
											'category_name'	=> $lists['category_name'],
											));
			}
		}
		catch(NoRecordException $e)
		{
			//没有分类
		}
		catch(Zend_Exception $e)
		{
			parent::msg($e->getMessage());
			exit;
		}

		/*****************************RESULT**************************************/
		return json_encode($result);
	}
}