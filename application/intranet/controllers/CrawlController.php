<?php
require_once(APP_PATH.'intranet/abs/In_controller.php');
class Intranet_CrawlController extends In_controller
{
	function init()
	{
		parent::isLogin();
		header('Content-Type: text/html; charset=utf-8');
	}
	public function indexAction()
	{
//		$ass = getAss('Crawl');
//		$result['crawl_files']			= json_encode($ass->crawl_files);
//		/**************************************************************************************************************************************/
//		parent::view('/rss/index',$result);
	}
	public function autoAction()
	{
		Zend_Session::start();
		Zend_Session::namespaceUnset('movie_links');
		$result['url']	= array();
		/**************************************************************************************************************************************/
		$ass = getAss('Crawl');
		foreach(	$ass->crawl_files	AS $crawl_file)
		{
			$filepath	= ASS_PATH . "crawl/{$crawl_file}.php";
			$obj		= $ass->getCrawlObj($filepath);
			if(method_exists($obj,'getAutoUrl'))
			{
				$result['url'] = array_merge( $result['url'], $obj->getAutoUrl() );
			}

		}
		$result['url']			= json_encode($result['url']);
		/**************************************************************************************************************************************/
		parent::view('/crawl/auto',$result);
	}
	public function getUrlAction()
	{
		$result	= array( 'error'=> TRUE,'urls'=>array(),'curls'=>array());
		/**************************************************************************************************************************************/
		$url		= $this->_getParam('url');
		/**************************************************************************************************************************************/
		try
		{
			$parse_url			= parse_url($url);
			preg_match('@[^\.]+\.[^\.]+$@siU',$parse_url['host'],$host);
			$filepath	= ASS_PATH . "crawl/{$host[0]}.php";
			$ass				= getAss('Crawl');
			$obj				= $ass->getCrawlObj($filepath);
			$data				= $obj->getLink($url);
			$result['urls']		= $data['urls'];
			$result['curls']	= $data['curls'];
			$result['error']	= FALSE;
		}
		catch(NoRecordException $e)
		{
			$result['error']	= FALSE;
		}
		catch(Zend_Exception $e)
		{
			$ass->createErrorLog(date('Y-m-d H:i:s') ." 自动抓取错误------文件名：{$url},错误描述:{$e->getMessage()}.\n\r");
		}
		/**************************************************************************************************************************************/
		echo json_encode($result);
	}
	public function readAction()
	{
		$curl	= $this->_getParam('curl');
		/**************************************************************************************************************************************/
		try
		{
			$ass = getAss('Crawl');
			$ass->loadByUrl($curl,FALSE);
		}
		catch(DbInsertException $e)
		{
			//true;
		}
		catch(Zend_Exception $e)
		{
			$ass->createErrorLog(date('Y-m-d H:i:s') . " 自动抓取错误------URL：{$curl},错误描述:{$e->getMessage()}.\n\r");
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