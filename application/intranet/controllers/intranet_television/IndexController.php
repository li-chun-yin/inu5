<?php
require_once(APP_PATH.'intranet/abs/In_controller.php');
class Intranet_Television_IndexController extends In_controller
{
	public function init()
	{
		parent::isLogin();
	}
	function indexAction()
	{
		$this->_redirect('/intranet_television/category');
	}
}