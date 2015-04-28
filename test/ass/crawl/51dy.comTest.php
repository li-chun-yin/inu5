<?php
require_once dirname(__FILE__).'/../../test.ini';
Zend_Loader::loadFile("51dy.com.php",ASS_PATH.'/crawl');
class www_51dy_comTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @sine 2012.03.18
	 * Enter description here ...
	 */
	public function testSearch()
	{
		try
		{
			$obj = new www_51dy_com();
			$data = $obj->search('老千');
		}
		catch(ZendFailedException $e)
		{
			parent::assertTrue(false,$e->getMessage());
		}
	}

	public function testDetail()
	{
		try
		{
			$obj = new www_51dy_com();
			$data = $obj->detail('http://www.51dy.com/v/xinwangqiuwangzi.html');
		}
		catch(ZendFailedException $e)
		{
			parent::assertTrue(false,$e->getMessage());
		}
	}
}
?>