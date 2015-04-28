<?php
require_once dirname(__FILE__).'/../test.ini';
Zend_Loader::loadFile("Movie_linkObj.php",OBJ_PATH);
Zend_Loader::loadFile("Movie_linkManager.php",OBJ_PATH);
class WebsiteObjTest extends PHPUnit_Framework_TestCase
{
	static $movie_link_id = 0;
	/**
	 * @sine 2012.03.25
	 * Enter description here ...
	 */
	public function testInsert()
	{
		try
		{	
			$obj = new Movie_linkObj();
			$obj['fk_movie_id']				= '1002';
			$obj['fk_website_id']			= '3';
			$obj['movie_link_url']			= 'TEST-LINK_URL'.time();
			$obj['movie_link_type']			= ML_ONLINE;
			$obj['movie_link_check_flag']	= 'F';
			$obj->insert();
			
			self::$movie_link_id = $obj['movie_link_id'];
			$obj2 = new Movie_linkObj();
			$obj2->load(self::$movie_link_id);
			
			parent::assertEquals($obj['fk_movie_id'],				$obj2['fk_movie_id'],			'fk_movie_id Error.');
			parent::assertEquals($obj['fk_website_id'],				$obj2['fk_website_id'],			'fk_website_id Error.');
			parent::assertEquals($obj['movie_link_url'],			$obj2['movie_link_url'],		'movie_link_url Error.');
			parent::assertEquals($obj['movie_link_type'],			$obj2['movie_link_type'],		'movie_link_type Error.');
			parent::assertEquals($obj['movie_link_check_flag'],		$obj2['movie_link_check_flag'],	'movie_link_check_flag Error.');
			parent::assertTrue($obj2['movie_link_insert_time']>0,									'website_insert_time Error.');
			parent::assertTrue($obj2['movie_link_insert_ip']>0,										'movie_link_insert_ip Error.');
		}catch(Zend_Exception $e){
			parent::assertTrue(false,$e->getMessage());
		}
	}
	
	/**
	 * @since 2012.03.25
	 * Enter description here ...
	 */
	public function testUpdate()
	{
		try
		{
			$obj = new Movie_linkObj();
			$obj->load(self::$movie_link_id);			
			$obj['movie_link_type']			= ML_DOWN;
			$obj['movie_link_url']			= 'TEST-UPDATE-LINK_URL'.time();
			$obj['movie_link_check_flag']	= 'T';
			$obj->update();
			
			$obj2 = new Movie_linkObj();
			$obj2->load(self::$movie_link_id);
			parent::assertEquals($obj['fk_movie_id'],				$obj2['fk_movie_id'],			'fk_movie_id Error.');
			parent::assertEquals($obj['fk_website_id'],				$obj2['fk_website_id'],			'fk_website_id Error.');
			parent::assertEquals($obj['movie_link_url'],			$obj2['movie_link_url'],		'movie_link_url Error.');
			parent::assertEquals($obj['movie_link_type'],			$obj2['movie_link_type'],		'movie_link_type Error.');
			parent::assertEquals($obj['movie_link_check_flag'],		$obj2['movie_link_check_flag'],	'movie_link_check_flag Error.');
			parent::assertTrue($obj2['movie_link_insert_time']>0,									'website_insert_time Error.');
			parent::assertEquals($obj['movie_link_insert_ip'],		$obj2['movie_link_insert_ip'],	'movie_link_insert_ip Error.');
		}catch(Zend_Exception $e){
			parent::assertTrue(false,$e->getMessage());
		}
	}
	/**
	 * @since 2012.04.18
	 * Enter description here ...
	 */
	public function testIsSetUrl()
	{
		try
		{
			$obj = new Movie_linkObj();
			$obj->load(self::$movie_link_id);
			$obj->isSetUrl($obj['movie_link_url']);
		}catch(DbCheckException $e){
				//true；
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
			$obj = new Movie_linkManager();
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
	public function testDelete()
	{
		try
		{
			$obj = new Movie_linkObj();
			$obj->load(self::$movie_link_id);		
			$obj->delete();
		}catch(Zend_Exception $e){
			parent::assertTrue(false,$e->getMessage());
		}
	}
}
?>