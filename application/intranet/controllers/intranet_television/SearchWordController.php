<?php
require_once(APP_PATH.'intranet/abs/In_controller.php');
class Intranet_Television_SearchWordController extends In_controller
{
	/***********************************************/
	public function init()
    {
        parent::isLogin();
        $this->menu = 'television';
    }

	public function indexAction()
	{
		/*******************************VAR DATA**************************************/
		$result['json_data']	= $this->getAction(DATA_JSON);
		/*******************************DATAS*****************************************/
		parent::view('/television/searchWord/index',$result);
	}

	public function getAction($type=DATA_JSON,$view=false)
	{
		/***************************VAR DATA**************************************/
		$result			= array('error'=>true,'lists'=>array(),'total'=>0,'list_size' => 30);
		$where			= array();
		$limit			= array();
		/***************************POST DATA**************************************/
		$page				= (int)$this->_getParam('page');
		$type				= (string)($this->_getParam('type') ? $this->_getParam('type') : $type);
		$view				= (string)($this->_getParam('view') ? $this->_getParam('view') : $view);
		$sdate				= $this->_getParam('sdate');
		$edate				= $this->_getParam('edate');
		$search_word_display= $this->_getParam('search_word_display');

		/*************************************************************************/
		try
		{
			$where			= parent::checkWhere($where);
			if(!empty($sdate) && !empty($edate))
			{
				$start	= strtotime($sdate);
				$end	= strtotime($edate)+(3600*24-1);
				array_push($where,"search_word_insert_time BETWEEN '{$start}' AND '{$end}'");
			}

			$page			= $page ? $page : 1;
			$start_limit	= ($page-1) * $result['list_size'];
			$length_limit	= $result['list_size'];
			$limit			= array($start_limit,$length_limit);
			$manager					= getObj('Search_wordManager');
			$manager['where']			= $where;
			$manager['limit']			= $limit;
			$data = $manager->adminLoad($search_word_display);

			foreach($data['lists'] AS $lists)
			{
				array_push($result['lists'], array(	'search_word_value'				=> $lists['search_word_value'],
													'search_word_useful_true_cnt'	=> $lists['search_word_useful_true_cnt'],
													'search_word_useful_false_cnt'	=> $lists['search_word_useful_false_cnt'],
													'search_word_crawl_true_cnt'	=> $lists['search_word_crawl_true_cnt'],
													'search_word_crawl_false_cnt'	=> $lists['search_word_crawl_false_cnt'],
													'search_word_total_cnt'			=> $lists['search_word_total_cnt']
														));
			}
			$result['total'] = $data['total'];
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

	public function updateCrawlTrueAction()
	{
		/***************************VAR DATA**************************************/
		$result	= array('error' => true);
		/***************************POST DATA**************************************/
		$search_word_value		= (array) $this->_getParam('search_word_value');
		/*************************************************************************/
		try
		{
			foreach($search_word_value AS $word)
			{
				$manager		= getObj('Search_wordManager');
				$manager->updateCrawlTrue($word);
				$result['error'] = false;
			}
		}
		catch(Zend_Exception $e)
		{
			$result	= array('error_message' => '程序异常,更新失败.');
		}

		/*****************************RESULT**************************************/
		echo json_encode($result);
	}

	public function startCrawlAction()
	{
		/***************************VAR DATA**************************************/
		$result	= array('error' => true,'error_message'=>'');
		/***************************POST DATA**************************************/
		$search_word_value	= (array)$this->_getParam('search_word_value');
		$search_word		= $this->_getParam('search_word');
		$crawl_files_name	= $this->_getParam('crawl_files_name');
		/*************************************************************************/
		try
		{
			if($crawl_files_name)
			{
				try
				{
					$ass = getAss('Crawl');
					$ass->loadByFile($crawl_files_name,$search_word);
					$manager	= getObj('Search_wordManager');
					$manager->updateCrawlTrue($search_word);
					$result['error'] = false;
				}
				catch(Zend_Exception $e)
				{
					$result['error_message'] = $e->getMessage();
				}
				echo json_encode($result);exit;
			}

			$ass = getAss('Crawl');
			$result['crawl_files']			= $ass->crawl_files;
			$result['search_word_value']	= $search_word_value;
			$result['error'] = false;
		}
		catch(Zend_Exception $e)
		{
			$result	= array('error_message' => '程序异常.');
		}

		/*****************************RESULT**************************************/
		$this->skin='none';
		parent::view('/television/searchWord/startCrawl',$result);
	}
}