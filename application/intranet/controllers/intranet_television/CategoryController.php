<?php
require_once(APP_PATH.'intranet/abs/In_controller.php');
class Intranet_Television_CategoryController extends In_controller
{			
	public function init()
    {
        parent::isLogin();
        $this->menu = 'television';
    }
			
	public function indexAction()
	{
		$result = $this->getAction(DATA_ARRAY);
		
		/*******************************************************/		
		parent::view('/television/category/index',$result);
	}
	
	/**
	 * 新增加分类
	 * Enter description here ...
	 */
	public function addAction()
	{
		$parent_category_code	= (string)$this->_getParam('parent_category_code');
		$category_name			= (string)$this->_getParam('category_name');
		/*******************************************************/	
		$result = array('error' => true);
		/******************************************************/
		
		try
		{		
			$obj = getObj('CategoryObj');
			$obj['category_name'] = $category_name;
			$obj['category_type'] = CT_TELEVISION;
			$obj->insert($parent_category_code);
			$result['error'] = false;
		}
		catch(Zend_Exception $e)
		{
			parent::msg($e->getMessage());
		}
		/******************************************************/
		echo json_encode($result);
		exit;
	}
	
	/**
	 * 修改分类名字
	 * Enter description here ...
	 */
	public function updateAction()
	{
		$result = array('error' => true);	
		/*******************************************************/	
		$category_id		= (string)$this->_getParam('category_id');
		$category_name		= (string)$this->_getParam('category_name');
		/******************************************************/	
		try
		{
			$obj = getObj('CategoryObj');
			$obj->load($category_id);
			$obj['category_name'] = $category_name;
			$obj->update();
			$result['error'] = false;
		}
		catch(Zend_Exception $e)
		{
			parent::msg($e->getMessage());
		}
		/******************************************************/
		echo json_encode($result);
		exit;
	}
	
	/**
	 * delete
	 * Enter description here ...
	 */
	public function deleteAction()
	{
		$result = array('error' => true);	
		/*******************************************************/	
		$category_id	= (string)$this->_getParam('category_id');
		/******************************************************/
		try
		{
			$obj = getObj('CategoryObj');
			$obj->load($category_id);
			$obj->delete();
			$result['error'] = false;
		}
		catch(Zend_Exception $e)
		{
			parent::msg($e->getMessage());
		}
		/******************************************************/
		echo json_encode($result);
		exit;
	}
	
	/**
	 * 
	 * Enter description here ...
	 * @param (string) $type
	 */
	public function getAction($type=DATA_JSON)
	{
		/*******************************************************/	
		$parent_code = (string)$this->_getParam('category_code');
		
		/*******************************************************/
		$result	= array('error'=> true, 'lists'=>array()); //初始化返回数据的变量
		$where	= array();
		
		/*******************************************************/
		try
		{
			$manager = getObj('CategoryManager');
			$where = array("`category_use_flag`='T'","`category_type`='".CT_TELEVISION."'");
			if(strlen($parent_code) === 0)
			{
				array_push($where,"LENGTH(`category_code`)='2'");
			}
			else
			{
				array_push($where,"`category_code` LIKE '{$parent_code}___'");
			}
			

			$manager['where'] = $where;
			$manager->load();
			foreach($manager['lists'] AS $lists)
			{
				array_push($result['lists'], array(	'category_id'	=> $lists['category_id'],
													'category_code'	=> $lists['category_code'],
													'category_name'	=> $lists['category_name'],
														));
			}
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
		/*******************************************************/
		if($type == DATA_JSON)
		{
			echo json_encode($result);
		}
		else if($type == DATA_ARRAY)
		{
			return $result;
		}
	}
}