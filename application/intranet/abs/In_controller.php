<?php 
require_once TOP.'Abs_controllers.php';
class In_controller extends Abs_controllers
{
	public $layout;
	public $skin = 'default';
	public $menu = 'television';
	public function indexAction(){}
	public function view($path,$data=array())
	{		
		$view = new Zend_View();
		$view->setScriptPath(APP_PATH.'intranet/views/scripts');
		$view->addScriptPath(APP_PATH.'intranet/views/common');
		$view->addScriptPath(APP_PATH.'intranet/views/menu');
		foreach($data AS $key => $item)
		{
			$view->$key	= $item;
		}
		
		if($this->skin == 'none')
		{
			echo $view->render("{$path}.phtml");
		}
		else
		{
			$this->layout = new Zend_Layout();
			$this->layout->setLayoutPath(dirname(__FILE__) . '/../views/layouts/');	
			$this->layout->header	= $view->render('header.phtml');
			$this->layout->left		= $view->render("{$this->menu}.phtml");
			$this->layout->content	= $view->render("{$path}.phtml");
			$this->layout->footer	= $view->render('footer.phtml');
			$this->layout->setLayout($this->skin);
			echo $this->layout->render();
		}
	}
	
	public function checkWhere($where)
	{
		/***************************VAR DATA**************************************/
		$result = array('error' => true);
		/**************************POST DATA**************************************/
		$sk				= (string) $this->_getParam('sk');
		$sv				= (string) $this->_getParam('sv');
		/**************************RESULT******************************************/
		if(!empty($sv))
		{
			array_push($where,"$sk LIKE '%{$sv}%'");
		}
		/**************************RESULT******************************************/
		return $where;
	}
	protected function isLogin()
	{
		Zend_Session::start();		
		$admin = Zend_Session::namespaceGet('admin');
		if($admin['id']!='' && $admin['level'] != '' && $admin['domain'] == parent::config('domain')->base)
		{
			$this->admin = $admin;
			return true;
		}
		else
		{
			$this->_redirect('/intranet/login');
			return false;
		}
	}
}