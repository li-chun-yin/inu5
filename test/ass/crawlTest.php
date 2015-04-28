<?php
require_once dirname(__FILE__).'/../test.ini';
Zend_Loader::loadFile("Crawl.php",ASS_PATH);
class CrawlTest extends PHPUnit_Framework_TestCase
{
	public function testReadRss()
	{
		try
		{
			$ass = new Crawl();
			$data = $ass->readRss();
		}
		catch(DbInsertException $e)
		{
			return;
		}
		catch(Zend_Exception $e)
		{
			parent::assertTrue(false,$e->getMessage());
		}
	}
	/**
	 * @sine 2012.03.18
	 * Enter description here ...
	 */
	public function testLoad()
	{
		try
		{
			$ass = new Crawl();
			$data = $ass->load('新电影');
		}
		catch(DbInsertException $e)
		{
			return;
		}
		catch(Zend_Exception $e)
		{
			parent::assertTrue(false,$e->getMessage());
		}
	}

	/**
	 * @sine 2012.03.18
	 * Enter description here ...
	 */
	public function testLoadByFile()
	{
		try
		{
			$ass = new Crawl();
			$ass->loadByFile('letv.com','老千');
		}
		catch(DbInsertException $e)
		{
			return;
		}
		catch(Zend_Exception $e)
		{
			parent::assertTrue(false,$e->getMessage());
		}
	}

	/**
	 * @since 2012.04.18
	 * Enter description here ...
	 */
	public function testLoadByUrl()
	{
		try
		{
			$ass = new Crawl();
			$data = $ass->loadByUrl('http://www.51dy.com/v/haizeiwang.html');
		}
		catch(DbInsertException $e)
		{
			//url已经存在;
		}
		catch(Zend_Exception $e)
		{
			parent::assertTrue(false,$e->getMessage());
		}
	}
}
?>