<?php
require_once dirname(__FILE__).'/../test.ini';
Zend_Loader::loadFile("Crawl_siteObj.php",OBJ_PATH);
Zend_Loader::loadFile("Crawl_siteManager.php",OBJ_PATH);
class Crawl_siteTest extends PHPUnit_Framework_TestCase
{
	static $crawl_site_id = 0;
	/**
	 * @sine 2012.05.14
	 * Enter description here ...
	 */
	public function testInsert()
	{
		try
		{	
			$obj = new Crawl_siteObj();
			$obj['fk_website_id']		= rand(0,100);
			$obj['crawl_site_qq']		= 'test_qq'		.time();
			$obj['crawl_site_msn']		= 'test_msn'	.time();
			$obj['crawl_site_email']	= 'test_email'	.time();
			$obj['crawl_site_phone']	= 'test_phone'	.time();
			$obj->insert();
			self::$crawl_site_id = $obj['crawl_site_id'];
			
			$obj2 = new Crawl_siteObj();
			$obj2->load(self::$crawl_site_id);

			parent::assertEquals($obj['fk_website_id'],		$obj2['fk_website_id'],		'fk_website_id Error.');
			parent::assertEquals($obj['crawl_site_qq'],		$obj2['crawl_site_qq'],		'crawl_site_qq Error.');
			parent::assertEquals($obj['crawl_site_msn'],	$obj2['crawl_site_msn'],	'crawl_site_msn Error.');
			parent::assertEquals($obj['crawl_site_email'],	$obj2['crawl_site_email'],	'crawl_site_email Error.');
			parent::assertEquals($obj['crawl_site_phone'],	$obj2['crawl_site_phone'],	'crawl_site_phone Error.');
			
		}catch(Zend_Exception $e){
			parent::assertTrue(false,$e->getMessage());
		}
	}
	
	/**
	 * @since 2012.05.14
	 * Enter description here ...
	 */
	public function testUpdate()
	{
		try
		{
			$obj = new Crawl_siteObj();
			$obj->load(self::$crawl_site_id);
			$obj['crawl_site_qq']		= 'test_update_qq'		.time();
			$obj['crawl_site_msn']		= 'test_update_msn'	.time();
			$obj['crawl_site_email']	= 'test_update_email'	.time();
			$obj['crawl_site_phone']	= 'test_update_phone'	.time();
			$obj->update();
			
			$obj2 = new Crawl_siteObj();
			$obj2->load(self::$crawl_site_id);
			
			parent::assertEquals($obj['fk_website_id'],		$obj2['fk_website_id'],		'fk_website_id Error.');
			parent::assertEquals($obj['crawl_site_qq'],		$obj2['crawl_site_qq'],		'crawl_site_qq Error.');
			parent::assertEquals($obj['crawl_site_msn'],	$obj2['crawl_site_msn'],	'crawl_site_msn Error.');
			parent::assertEquals($obj['crawl_site_email'],	$obj2['crawl_site_email'],	'crawl_site_email Error.');
			parent::assertEquals($obj['crawl_site_phone'],	$obj2['crawl_site_phone'],	'crawl_site_phone Error.');
			
		}catch(Zend_Exception $e){
			parent::assertTrue(false,$e->getMessage());
		}
	}
	
	/**
	 * @since 2012.05.14
	 * Enter description here ...
	 */
	public function testManagerLoad()
	{
		try
		{
			$obj = new Crawl_siteManager();
			$obj->load();
			
			parent::assertTrue($obj['total']>0,			'total Error.');
			parent::assertTrue(is_array($obj['lists']),	'lists Error.');
		}catch(Zend_Exception $e){
			parent::assertTrue(false,$e->getMessage());
		}
	}
	
	/**
	 * @since 2012.05.14
	 * Enter description here ...
	 */
	public function testDelete()
	{
		try
		{
			$obj = new Crawl_siteObj();
			$obj->load(self::$crawl_site_id);		
			$obj->delete();
		}catch(Zend_Exception $e){
			parent::assertTrue(false,$e->getMessage());
		}
	}
}
?>