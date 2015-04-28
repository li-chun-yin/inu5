<?php
require_once(APP_PATH.'intranet/abs/In_controller.php');
class Intranet_IndexController extends In_controller
{
	function indexAction()
	{
		if(parent::isLogin())
		{
			parent::_redirect('/intranet_television');
		}
	}
	
	public function testAction()
	{
		parent::view('default');
	}
}