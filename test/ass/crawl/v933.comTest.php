<?php
require_once dirname(__FILE__).'/../../test.ini';
Zend_Loader::loadFile("v933.com.php",ASS_PATH.'/crawl');
class v933_comTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @sine 2012.03.18
	 * Enter description here ...
	 */
	public function testSearch()
	{
		try
		{
			$obj = new v933_com();
			$data = $obj->search('太平');
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
			$obj = new v933_com();
			$data = $obj->detail('http://www.v933.com/detail/?21579.html');
		}
		catch(ZendFailedException $e)
		{
			parent::assertTrue(false,$e->getMessage());
		}
	}
}
?>