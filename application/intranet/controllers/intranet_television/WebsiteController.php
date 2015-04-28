<?php
require_once(APP_PATH.'intranet/abs/In_controller.php');
class Intranet_Television_WebsiteController extends In_controller
{
	/***********************************************/
	public function init()
    {
        parent::isLogin();
        $this->menu = 'television';
    }

	public function indexAction()
	{
		$result['json_data'] = $this->getAction(DATA_JSON);
		/*******************************DATAS*****************************************/
		parent::view('/television/website/index',$result);
	}

	/**
	 * 2012.1.15
	 * Enter description here ...
	 */
	public function autoUpdateAction()
	{
		if($this->_getParam('website_id')>0)
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
		$result = array('error' => true);

		/**************************POST DATA**************************************/
		$website_id				= (string) $this->_getParam('website_id');
		$website_name			= (string) $this->_getParam('website_name');
		$website_url			= (string) $this->_getParam('website_url');
		$website_check_flag		= (string) $this->_getParam('website_check_flag');

		/**************************************************************************/
		try
		{
			$obj = getObj('WebsiteObj');
			$obj->load($website_id);
			$obj['website_name']		= $website_name;
			$obj['website_url']			= $website_url;
			$obj['website_check_flag']	= $website_check_flag;
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
		$website_name			= (string) $this->_getParam('website_name');
		$website_url			= (string) $this->_getParam('website_url');
		$website_check_flag		= (string) $this->_getParam('website_check_flag');

		/**************************************************************************/
		try
		{
			$obj = getObj('WebsiteObj');
			$obj['website_name']		= $website_name;
			$obj['website_url']			= $website_url;
			$obj['website_check_flag']	= $website_check_flag;
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
		$website_id				= (string) $this->_getParam('website_id');
		$website_recommend_time	= (int) ($this->_getParam('is_recommend')=='T' ? time() : 0);

		/**************************************************************************/

		try
		{
			$obj = getObj('WebsiteObj');
			$obj->load($website_id);
			$obj['website_recommend_time']	= $website_recommend_time;
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
		$delete_ids				= (array) $this->_getParam('website_id');
		/**************************************************************************/
		try
		{
			foreach($delete_ids AS $id)
			{
				$obj = getObj('WebsiteObj');
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

	public function getAction($type=DATA_JSON,$view=false)
	{
		/***************************VAR DATA**************************************/
		$result	= array('error'=>true,'lists'=>array(),'total'=>0,'list_size' => 30);
		$where	= array();
		$limit	= array();
		/***************************POST DATA**************************************/
		$page		= (int)$this->_getParam('page');
		$type		= (string)($this->_getParam('type') ? $this->_getParam('type') : $type);
		$view		= (string)($this->_getParam('view') ? $this->_getParam('view') : $view);
		/*************************************************************************/
		try
		{
			$page			= $page ? $page : 1;
			$start_limit	= ($page-1) * $result['list_size'];
			$length_limit	= $result['list_size'];
			$limit			= array($start_limit,$length_limit);

			$manager			= getObj('WebsiteManager');
			$manager['where']	= $where;
			$manager['limit']	= $limit;
			$manager->load();
			foreach($manager['lists'] AS $lists)
			{
				array_push($result['lists'], array(	'website_id'			=> $lists['website_id'],
													'website_name'			=> $lists['website_name'],
													'website_url'			=> $lists['website_url'],
													'website_hot'			=> $lists['website_hot'],
													'website_check_flag'	=> $lists['website_check_flag'],
													'website_recommend_time'=> $lists['website_recommend_time'],
													'website_insert_time'	=> $lists['website_insert_time'],
													'website_insert_ip'		=> $lists['website_insert_ip']
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
}