<?php
require_once(APP_PATH.'television/abs/In_controller.php');
class Television_EtcController extends In_controller
{
	public function init()
	{
		parent::init();
	}

	public function pageAction()
	{
		/**********************POST DATA*************************************/
		$name	= (string)$this->_getParam('name');
		/************************RESUTL**********************************/
		$this->skin = 'etcpage';
		parent::view("etc/page/{$name}");
	}
}