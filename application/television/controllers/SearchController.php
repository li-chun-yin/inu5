<?php
require_once(APP_PATH.'television/abs/In_controller.php');
class Television_SearchController extends In_controller
{
	public function indexAction()
	{
		/*******************************POST DATA****************************************/
		$searchword = $this->_getParam('searchword');
		/*******************************VAR DATA*****************************************/
		$result['search_word_id']	= 0;
		$result['movies']			= $this->getAction();
		/********************************************************************************/
		try
		{
			$obj						= getObj('Search_wordObj');
			$obj['search_word_value']	= $searchword;
			$obj->insert();
			$result['search_word_id']	= $obj['search_word_id'];
			$result['search_word_value']= $obj['search_word_value'];
		}
		catch(Zend_Exception $e)
		{
			parent::toBack($e->getMessage());
			exit;
		}
		/******************************* RESULT *****************************************/
		parent::view('search/index',$result);
	}

	public function getExpandedAction()
	{
		/****************************VAR DATA**************************************/
		$result = array( 'query'	=> '','suggestions'	=> array());
		/***************************POST DATA**************************************/
		$searchword		= $this->_getParam('query');
		/**************************************************************************/
		try
		{
			$so	= getSo('movie');
			$expanded_words			= $so->getExpandedWords($searchword);
			$result['query']		= $searchword;
			$result['suggestions']	= $expanded_words;
		}
		catch(Zend_Exception $e)
		{
			//parent::_redirect('/');
		}
		/*****************************RESULT**************************************/
		echo json_encode($result);
	}

	public function getAction()
	{
		/****************************VAR DATA**************************************/
		$result = array('error'=>true,'error_message'=>'','lists'=>array(),'total'=>0,'list_size' => 10);
		$where = array();
		$limit = array();
		/***************************POST DATA**************************************/
		$searchword		= $this->_getParam('searchword');
		$category_code	= $this->_getParam('category_code');
		$view			= (string)$this->_getParam('view');
		$page			= (int)$this->_getParam('page');
		/**************************************************************************/
		try
		{
			$page			= $page ? $page : 1;
			$so				= getSo('movie');
			$so['limit_s']	= ($page-1) * $result['list_size'];
			$so['limit_c']	= $result['list_size'];
			$so->load($searchword);
			foreach($so['lists'] AS $lists)
			{
				array_push($result['lists'],array(	'movie_id'				=> strip_tags($lists['movie_id']),
													'movie_name'			=> isset( $lists['movie_name'] ) ? $lists['movie_name'] : '' ,
													'movie_list_img_url'	=> isset( $lists['movie_list_img_url'] ) ? strip_tags($lists['movie_list_img_url']) : '',
													'movie_director'		=> isset( $lists['movie_director'] ) ? $lists['movie_director'] : '',
													'movie_starring'		=> isset( $lists['movie_starring'] ) ? $lists['movie_starring'] : '',
													'movie_description'		=> isset( $lists['movie_description'] ) ? $lists['movie_description'] : '',
													'movie_insert_date'		=> date('Y-m-d',strip_tags($lists['movie_insert_time']))));
			}
			$result['total']			= $so['total'];
			$result['search_time']		= $so['search_time'];
			$result['related_words']	= $so['related_words'];
			$result['corrected_words']	= $so['corrected_words'];
			$result['page']				= $page;
			$result['error']			= FALSE;
			if($so['total'] == 0)
			{
				$result['error'] = TRUE;
				if(count($result['corrected_words']) == 0)
				{
					$result['error_message'] = '对不起，没有找到您要的影片，如果你要找的影片确实存在，我们会尽快提交您要找的影片！';
				}
				else
				{
					$corrected_string	= '';
					foreach($result['corrected_words'] as $key=>$word)
					{
						$corrected_string	.= " <a href='/television/Search?searchword={$word}' title='{$word}'>{$word}</a> ";
					}
					$result['error_message'] = '对不起，没有找到您要的影片，您是不是要找：' . $corrected_string;
				}
			}
		}
		catch(XSException $e)
		{
			$result['error'] = TRUE;
			$result['error_message'] = '对不起，没有找到您要的影片，如果你要找的影片确实存在，我们会尽快提交您要找的影片！';
		}
		catch(Zend_Exception $e)
		{
			$result['error'] = TRUE;
			$result['error_message'] = '对不起，没有找到您要的影片，如果你要找的影片确实存在，我们会尽快提交您要找的影片！';
		}
		/*****************************RESULT**************************************/
		return (array)$result;
	}

	public function updateUsefulFlagAction()
	{
		/***************************VAR DATA**************************************/
		$result	= array('error' => TRUE);
		/**************************POST DATA**************************************/
		$search_word_useful_flag	= (string) $this->_getParam('search_word_useful_flag');
		$search_word_id				= (string) $this->_getParam('search_word_id');
		/**************************************************************************/
		try
		{
			$obj = getObj('Search_wordObj');
			$obj->load($search_word_id);
			$obj['search_word_useful_flag']	= $search_word_useful_flag;
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

	public function importSoDataAction()
	{
		$manager = getObj('MovieManager');
		$manager->load();
		$so				= getSo('movie');
		$index			= $so->getIndex();
		$index->clean();
		$index->beginRebuild();

		foreach($manager['lists'] AS $lists)
		{
			$data = array(
						    'movie_id'				=> $lists['movie_id'],
							'movie_name'			=> isset( $lists['movie_name'] ) ? $lists['movie_name'] : '' ,
							'movie_list_img_url'	=> isset( $lists['movie_list_img_url'] ) ? $lists['movie_list_img_url'] : '',
							'movie_director'		=> isset( $lists['movie_director'] ) ? implode('&',$lists['movie_director']) : '',
							'movie_starring'		=> isset( $lists['movie_starring'] ) ? implode('&',$lists['movie_starring']) : '',
							'movie_description'		=> isset( $lists['movie_description'] ) ? strip_tags($lists['movie_description']) : '',
							'movie_insert_time'		=> strtotime($lists['movie_insert_time']));
			$so->insert($data);
		}
		$index->endRebuild();
	}
}