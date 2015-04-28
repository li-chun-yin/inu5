<?php
require_once dirname(__FILE__).'/../../test.ini';
Zend_Loader::loadFile("letv.com.php",ASS_PATH.'/crawl');
class letv_comTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @sine 2012.03.18
	 * Enter description here ...
	 */
	public function testSearch()
	{
		try
		{
			$obj = new letv_com();
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
			$obj = new letv_com();
			$data = $obj->detail('http://so.letv.com/tv/8042.html');
		}
		catch(ZendFailedException $e)
		{
			parent::assertTrue(false,$e->getMessage());
		}
	}
}
?>