<?php
require_once(APP_PATH.'intranet/abs/In_controller.php');
class Intranet_SqlController extends In_controller
{
	function init()
	{
		parent::isLogin();
		header('Content-Type: text/html; charset=utf-8');
	}
	public function index(){}
	public function backupAction()
	{
		$config = new Zend_Config_Ini(CONFIG_PATH.'/config.ini');
		$registry = Zend_Registry::getInstance();
		$registry->set('config',$config);
		if(substr($_SERVER['HTTP_HOST'],-3) == 'com' || substr($_SERVER['HTTP_HOST'],-3) == '.cn')
		{
			$database_info = $config->database->db_com->params;
		}
		else
		{
			$database_info = $config->database->db_dev->params;
		}
		$file	= 'inu5.sql.gz';
		header("Content-type: application/octet-tream");
		header('Content-Disposition: attachment; filename="'.date('Y-m-d').$file.'"');
		exec("mysqldump -h{$database_info->host} -u{$database_info->username} -p{$database_info->password} {$database_info->dbname} | gzip > {$file}");
		readfile($file);
		unlink($file);
	}
	public function importAction()
	{
		if( $_FILES == FALSE )
		{
			$this->skin="none";
			parent::view('/sql/import');
		}
		else
		{
			$file	= $_FILES['upfile']['name'];
			$tmp_name= $_FILES['upfile']['tmp_name'];
			if(move_uploaded_file($tmp_name,  $file))
			{
				$config = new Zend_Config_Ini(CONFIG_PATH.'/config.ini');
				$registry = Zend_Registry::getInstance();
				$registry->set('config',$config);
				if(substr($_SERVER['HTTP_HOST'],-3) == 'com' || substr($_SERVER['HTTP_HOST'],-3) == '.cn')
				{
					$database_info = $config->database->db_com->params;
				}
				else
				{
					$database_info = $config->database->db_dev->params;
				}
				if(substr($file,-3) == '.gz')
				{
					exec("gunzip < {$file} | mysql -h{$database_info->host} -u{$database_info->username} -p{$database_info->password} {$database_info->dbname}");
				}
				else
				{
					exec("mysql -h{$database_info->host} -u{$database_info->username} -p{$database_info->password} {$database_info->dbname} < {$file}");
				}
				unlink($file);
				echo '数据导入完成。';exit;
			}
				echo 'Error......';
		}
	}
}