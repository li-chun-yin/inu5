<?php
require_once(APP_PATH.'intranet/abs/In_controller.php');
class Intranet_RssController extends In_controller
{
	function init()
	{
		parent::isLogin();
		header('Content-Type: text/html; charset=utf-8');
	}
	public function indexAction()
	{
		$ass = getAss('Crawl');
		$result['crawl_files']			= json_encode($ass->crawl_files);
		/**************************************************************************************************************************************/
		parent::view('/rss/index',$result);
	}
	public function getUrlAction()
	{
		$result	= array( 'error'=> TRUE,'urls'=>array());
		/**************************************************************************************************************************************/
		$crawl_file	= $this->_getParam('crawl_file');
		$filepath	= ASS_PATH . "crawl/{$crawl_file}.php";
		/**************************************************************************************************************************************/
		try
		{
			$ass				= getAss('Crawl');
			$obj				= $ass->getCrawlObj($filepath);
			$result['urls']		= $obj->getUrlByRss();
			$result['error']	= FALSE;
		}
		catch(CrawlFailedException $e)
		{
			$result['error']	= FALSE;
		}
		catch(Zend_Exception $e)
		{
			$ass->createErrorLog(date('Y-m-d H:i:s') ." RSS抓取错误------文件名：{$crawl_file},错误描述:{$e->getMessage()}.\n\r");
		}
		/**************************************************************************************************************************************/
		echo json_encode($result);
	}
	public function readAction()
	{
		$url	= $this->_getParam('url');
		/**************************************************************************************************************************************/
		try
		{
			$ass = getAss('Crawl');
			$ass->loadByUrl($url,FALSE);
		}
		catch(DbInsertException $e)
		{
			//true;
		}
		catch(Zend_Exception $e)
		{
			$ass->createErrorLog(date('Y-m-d H:i:s') . " RSS抓取错误------URL：{$url},错误描述:{$e->getMessage()}.\n\r");
		}
		/**************************************************************************************************************************************/
	}
	public function clearErrorLogAction()
	{
		$rss_file	= LIB_PATH . '/file/crawl_error_logs';
		/**************************************************************************************************************************************/
		if(! is_file($rss_file)){echo '错误日志是由RSS自动采集发生错误时生成的，目前没有错误日志。';exit;}
		if(unlink ($rss_file))
		{
			echo '已清除RSS采集错误日志.';
		}
		else
		{
			echo 'Error.';
		}
	}
	public function downloadErrorLogAction()
	{
		$rss_file	= LIB_PATH . '/file/crawl_error_logs';
		/**************************************************************************************************************************************/
		if(! is_file($rss_file)){echo '错误日志是由RSS自动采集发生错误时生成的，目前没有错误日志。';exit;}
		header("Content-type: application/octet-tream");
		header('Content-Disposition: attachment; filename="rssErrorLog"');
		$handle = fopen($rss_file, "rb");
		echo fread($handle, filesize ($rss_file));
		fclose($handle);
	}
}