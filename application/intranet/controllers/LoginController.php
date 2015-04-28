<?php
require_once(APP_PATH.'intranet/abs/In_controller.php');
class Intranet_LoginController extends In_controller
{
	/**
	 * ����Ա��¼
	 * Enter description here ...
	 */
	public function indexAction()
	{
		$this->skin = 'none';
		parent::view('/login/index');
		if(! empty($_POST))
		{		
			$admin_id	= (string)$this->_request->getPost('admin_id');
			$admin_pwd	= (string)$this->_request->getPost('admin_pwd');
			$admins 	= $this->_getAdmins();
			foreach($admins AS $admin)
			{
				if($admin['id'] == $admin_id)
				{
					if($admin['password'] == md5($admin_pwd))
					{			
						Zend_Session::start();
						$session= new Zend_Session_Namespace('admin');
					    Zend_Session::regenerateId();
						$session->id 	= $admin_id;
						$session->level= $admin['level'];
						$session->domain= parent::config('domain')->base;
						
						$this->_redirect('/intranet_television');
						exit;
					}
					else
					{
						parent::msg('密码错误');
						exit;
					}
				}
			}
			parent::msg('用户不存在');
			exit;
		}	
	}
	
	public function dismissAction()
	{
		Zend_Session::start();
		Zend_Session::namespaceUnset('admin');
		$this->_redirect('/intranet/login');
	}
	
	/**
	 * ��ȡ���й���Ա
	 * return array;
	 */
	private function _getAdmins()
	{
		$admins = array();	//����Ա
		$data = file(LIB_PATH . 'administrator.data');
		foreach($data AS $item)
		{
			$arr = array(); //��ʱ���� ����Ա��Ϣ
			$li = explode('&',$item);
			foreach($li AS $key=>$l)
			{
				$value = explode('=',$l);
				$arr[$value[0]] = $value[1];		
			}
			array_push($admins,$arr);
		}
		return $admins;
	}
}