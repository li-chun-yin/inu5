<?php
define('DATA_JSON','json');
define('DATA_ARRAY','array');
require_once LIB_PATH.'smarty/Smarty.class.php';
class Abs_controllers extends Zend_Controller_Action
{
	protected 	$location='';
	public	$layout,
			$skin = 'default';

	public function init()
	{
		parent::init();
		header('Content-Type: text/html; charset=utf-8');
	}

	protected function msg($message,$url='')
	{
		echo "<script>alert('{$message}');</script>";
		if($url){parent::_redirect("{$url}");}
		exit;
	}

	protected function toBack($message='')
	{
		if($message)echo "<script>alert('{$message}');</script>";
		echo "<script>history.back();</script>";
		exit;
	}

	protected function config($item)
	{
		$config = new Zend_Config_Ini(CONFIG_PATH.'/config.ini');
		$registry = Zend_Registry::getInstance();
		$registry->set('config',$config);
		return $config->$item;

	}
}