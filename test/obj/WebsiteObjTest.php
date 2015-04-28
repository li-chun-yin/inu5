<?php
require_once dirname(__FILE__).'/../test.ini';
Zend_Loader::loadFile("WebsiteObj.php",OBJ_PATH);
Zend_Loader::loadFile("WebsiteManager.php",OBJ_PATH);
class WebsiteObjTest extends PHPUnit_Framework_TestCase
{
	static $website_id = 0;
	/**
	 * @sine 2012.03.24
	 * Enter description here ...
	 */
	public function testInsert()
	{
		try
		{	
			$obj = new WebsiteObj();
			$obj['website_name']			= 'TEST-NAME'.time();
			$obj['website_url']				= 'TEST-URL'.time();
			$obj['website_check_flag']		= 'F';
			$obj['website_recommend_time']	= new Zend_Db_Expr("UNIX_TIMESTAMP()");
			$obj->insert();
			self::$website_id = $obj['website_id'];
			$obj2 = new WebsiteObj();
			$obj2->load(self::$website_id);

			parent::assertEquals($obj['website_name'],			$obj2['website_name'],			'website_name Error.');
			parent::assertEquals($obj['website_url'],			$obj2['website_url'],			'website_url Error.');
			parent::assertEquals($obj['website_check_flag'],	$obj2['website_check_flag'],	'website_check_flag Error.');
			parent::assertTrue($obj2['website_recommend_time']>0,								'website_recommend_time Error.');
			parent::assertTrue($obj2['website_insert_time']>0,									'website_insert_time Error.');
		}catch(Zend_Exception $e){
			parent::assertTrue(false,$e->getMessage());
		}
	}
	
	/**
	 * @since 2012.03.18
	 * Enter description here ...
	 */
	public function testUpdate()
	{
		try
		{
			$obj = new WebsiteObj();
			$obj->load(self::$website_id);
		
			$obj['website_name']			= 'TEST-NAME'.time();
			$obj['website_url']				= 'TEST-URL'.time();
			$obj['website_check_flag']		= 'T';
			$obj['website_recommend_time']	= new Zend_Db_Expr("UNIX_TIMESTAMP()");
			$obj->update();
			
			$obj2 = new WebsiteObj();
			$obj2->load(self::$website_id);
			parent::assertEquals($obj['website_name'],			$obj2['website_name'],			'website_name Error.');
			parent::assertEquals($obj['website_url'],			$obj2['website_url'],			'website_url Error.');
			parent::assertEquals($obj['website_check_flag'],	$obj2['website_check_flag'],	'website_check_flag Error.');
			parent::assertTrue($obj2['website_recommend_time']>0,								'website_recommend_time Error.');
			parent::assertEquals($obj['website_insert_time'],	$obj2['website_insert_time'],	'website_insert_time Error.');
			parent::assertEquals($obj['website_insert_ip'],		$obj2['website_insert_ip'],		'website_insert_ip Error.');
		}catch(Zend_Exception $e){
			parent::assertTrue(false,$e->getMessage());
		}
	}
	
	/**
	 * @since 2012.03.18
	 * Enter description here ...
	 */
	public function testLoadByUrl()
	{
		try
		{
			$obj = new WebsiteObj();
			$obj->load(self::$website_id);
			
			$obj2 = new WebsiteObj();
			$obj2->loadByUrl($obj['website_url']);
			
			parent::assertEquals($obj['website_name'],			$obj2['website_name'],			'website_name Error.');
			parent::assertEquals($obj['website_url'],			$obj2['website_url'],			'website_url Error.');
			parent::assertEquals($obj['website_check_flag'],	$obj2['website_check_flag'],	'website_check_flag Error.');
			parent::assertEquals($obj['website_recommend_time'],$obj2['website_recommend_time'],'website_recommend_time Error.');
			parent::assertEquals($obj['website_insert_time'],	$obj2['website_insert_time'],	'website_insert_time Error.');
			parent::assertEquals($obj['website_insert_ip'],		$obj2['website_insert_ip'],		'website_insert_ip Error.');
		}catch(Zend_Exception $e){
			parent::assertTrue(false,$e->getMessage());
		}
	}
	/**
	 * @since 2012.03.18
	 * Enter description here ...
	 */
	public function testManagerLoad()
	{
		try
		{
			$obj = new WebsiteManager();
			$obj->load();
			
			parent::assertTrue($obj['total']>0,			'total Error.');
			parent::assertTrue(is_array($obj['lists']),	'lists Error.');
		}catch(Zend_Exception $e){
			parent::assertTrue(false,$e->getMessage());
		}
	}
	/**
	 * @since 2012.03.18
	 * Enter description here ...
	 */
	public function testManagerLoadRecommend()
	{
		try
		{
			$obj = new WebsiteManager();
			$obj->loadRecommend(1);
			
			parent::assertTrue($obj['total']>0,			'total Error.');
			parent::assertTrue(is_array($obj['lists']),	'lists Error.');
		}catch(Zend_Exception $e){
			parent::assertTrue(false,$e->getMessage());
		}
	}
	/**
	 * @since 2012.03.18
	 * Enter description here ...
	 */
	public function testManagerLoadNew()
	{
		try
		{
			$obj = new WebsiteManager();
			$obj->loadNew(1);
			
			parent::assertTrue($obj['total']>0,			'total Error.');
			parent::assertTrue(is_array($obj['lists']),	'lists Error.');
		}catch(Zend_Exception $e){
			parent::assertTrue(false,$e->getMessage());
		}
	}
	/**
	 * @since 2012.03.18
	 * Enter description here ...
	 */
	public function testManagerLoadHot()
	{
		try
		{
			$obj = new WebsiteManager();
			$obj->loadHot(1);
			
			parent::assertTrue($obj['total']>0,			'total Error.');
			parent::assertTrue(is_array($obj['lists']),	'lists Error.');
		}catch(Zend_Exception $e){
			parent::assertTrue(false,$e->getMessage());
		}
	}
	
	/**
	 * @since 2012.03.18
	 * Enter description here ...
	 */
	public function testDelete()
	{
		try
		{
			$obj = new WebsiteObj();
			$obj->load(self::$website_id);		
			$obj->delete();
		}catch(Zend_Exception $e){
			parent::assertTrue(false,$e->getMessage());
		}
	}
	
	/**
	 * @since 2012.03.18
	 * Enter description here ...
	 */
	public function testCompletedDeleteTestId()
	{
		$obj = new WebsiteObj();
		$obj['dbObj']->where			= array(	"website_id='".self::$website_id."'");
		$obj['dbObj']->d();
	}
}
?>