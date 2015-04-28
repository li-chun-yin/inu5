<?php
define('ROOT_PATH',$_SERVER['DOCUMENT_ROOT']);
define('LIB_PATH',ROOT_PATH.'/library/');
define('APP_PATH',ROOT_PATH.'/application/');
define('MODEL_PATH',LIB_PATH .'models/');
define('PLUGIN_DIR',ROOT_PATH.'/plugins');
define('OBJ_PATH',LIB_PATH .'obj/');
define('ASS_PATH',LIB_PATH .'ass/');
define('SO_PATH',LIB_PATH.'so/');
define('VIEW_PATH',ROOT_PATH.'/application/views/');
define('TOP',ROOT_PATH.'/library/top/');
define('XS_PATH','/usr/local/xunsearch/');
define('CONFIG_PATH',ROOT_PATH.'/configs/');
set_include_path('.' . PATH_SEPARATOR . LIB_PATH . PATH_SEPARATOR . get_include_path());
try
{
	require_once 'Zend/Loader/Autoloader.php';
	$autoloader = Zend_Loader_Autoloader::getInstance();
	require_once TOP.'Abs_Exception.php';
	require_once TOP.'function.php';
	require_once TOP.'Abs_obj.php';
	$frontController = Zend_Controller_Front::getInstance();
	$frontController->throwExceptions(TRUE);
	$frontController->setControllerDirectory(array(	'default'				=>APP_PATH.'controllers',
													'television'			=>APP_PATH.'television/controllers',
													'intranet'				=>APP_PATH.'intranet/controllers',
													'intranet_user'			=>APP_PATH.'intranet/controllers/intranet_user',
													'intranet_television'	=>APP_PATH.'intranet/controllers/intranet_television',));

	$frontController->setParam('noViewRenderer', TRUE);
	$frontController->dispatch();
}
catch(Zend_Exception $e)
{
	echo '对不起，页面不存在......';
}
?>