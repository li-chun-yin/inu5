<?php
define('UPLOADIMG_DIR', '/uploadImg/');
require_once(APP_PATH.'intranet/abs/In_controller.php');
class Intranet_UpimgController extends In_controller
{
	function init()
	{
		parent::isLogin();
		header('Content-Type: text/html; charset=utf-8');
	}
	public function indexAction()
	{
		//var
		$return_tag	= $this->_getParam('return_tag');
		$result = array('image_url'	=> '','return_tag'=>$return_tag);
		/*****/
		if($_FILES){	$result['image_url'] = $this->upImg(); };//exit;
		/*****/
		$this->skin="none";
		parent::view('/upimg/index',$result);
	}

	private function upImg()
	{
		// var data
		$result =	'';
		//POST DATA
		$tmp_name	= $_FILES['upfile']['tmp_name'];
		$type		= image_type_to_extension(exif_imagetype($_FILES['upfile']['tmp_name']));
		if($type)
		{
			$name		= sha1($_FILES['upfile']['name'].microtime()) . $type;
		}
		else
		{
			echo "文件类型可能错误";exit;
		}
		/**********/
		if(move_uploaded_file($tmp_name, ROOT_PATH . UPLOADIMG_DIR . $name))
		{
			$result	= $_SERVER['HTTP_HOST'] . UPLOADIMG_DIR . $name;
		}

		return $result;
	}
}