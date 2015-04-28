<?php
require_once dirname(__FILE__).'/../../test.ini';
Zend_Loader::loadFile("44ss.net.php",ASS_PATH.'/crawl');
class www_44ss_netTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @sine 2012.03.18
	 * Enter description here ...
	 */
	public function testSearch()
	{
		try
		{
			$obj = new www_44ss_net();
			$data = $obj->search('桃姐');
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
			$obj = new www_44ss_net();
			$data = $obj->detail('http://www.44ss.net/ShowMovie.aspx?name=%25cc%25d2%25bd%25e3%255bBD%255d&hid=2511777&boxid=58933&hot=4873&tn=%u6843%u59D0&type=rmvb&size=1.25G&box=xiangqing');
		}
		catch(ZendFailedException $e)
		{
			parent::assertTrue(false,$e->getMessage());
		}
	}
}
?>