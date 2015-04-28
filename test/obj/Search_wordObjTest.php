<?php
require_once dirname(__FILE__).'/../test.ini';
Zend_Loader::loadFile("Search_wordObj.php",OBJ_PATH);
Zend_Loader::loadFile("Search_wordManager.php",OBJ_PATH);
class Search_wordObjTest extends PHPUnit_Framework_TestCase
{
	static $search_word_id = 0;
	/**
	 * @sine 2012.03.24
	 * Enter description here ...
	 */
	public function testInsert()
	{
		try
		{
			$search_name				= array('TEST-NAME1','TEST-NAME2','TEST-NAME3','TEST-NAME4','TEST-NAME5','TEST-NAME6');
			$search_word_useful_flag	= array('T','F');
			$search_word_crawl_flag		= array('T','F');
			$obj = new Search_wordObj();
			$obj['search_word_value']			= $search_name[array_rand($search_name)];
			$obj['search_word_useful_flag']		= $search_word_useful_flag[array_rand($search_word_useful_flag)];
			$obj['search_word_crawl_flag']		= $search_word_crawl_flag[array_rand($search_word_crawl_flag)];
			$obj->insert();
			self::$search_word_id = $obj['search_word_id'];

			$obj2 = new Search_wordObj();
			$obj2->load(self::$search_word_id);
			parent::assertEquals($obj['search_word_value'],			$obj2['search_word_value'],			'search_word_value Error.');
			parent::assertEquals($obj['search_word_useful_flag'],	$obj2['search_word_useful_flag'],	'search_word_useful_flag Error.');
			parent::assertEquals($obj['search_word_crawl_flag'],	$obj2['search_word_crawl_flag'],	'search_word_crawl_flag Error.');
			parent::assertTrue($obj2['search_word_insert_time']>0,										'search_word_insert_time Error.');
			parent::assertTrue($obj2['search_word_insert_ip']>0,										'search_word_insert_ip Error.');
		}catch(Zend_Exception $e){
			parent::assertTrue(false,$e->getMessage());
		}
	}
	
	/**
	 * @since 2012.05.07
	 * Enter description here ...
	 */
	public function testUpdate()
	{
		try
		{
			$search_word_useful_flag	= array('T','F');
			$search_word_crawl_flag		= array('T','F');
			
			$obj = new Search_wordObj();
			$obj->load(self::$search_word_id);
			$obj['search_word_useful_flag']	= $search_word_useful_flag[array_rand($search_word_useful_flag)];
			$obj['search_word_crawl_flag']	= $search_word_crawl_flag[array_rand($search_word_crawl_flag)];
			
			$obj->update();
				
			$obj2 = new Search_wordObj();
			$obj2->load(self::$search_word_id);
			
			parent::assertEquals($obj['search_word_value'],			$obj2['search_word_value'],			'search_word_value Error.');
			parent::assertEquals($obj['search_word_useful_flag'],	$obj2['search_word_useful_flag'],	'search_word_useful_flag Error.');
			parent::assertEquals($obj['search_word_crawl_flag'],	$obj2['search_word_crawl_flag'],	'search_word_crawl_flag Error.');
			parent::assertTrue($obj2['search_word_insert_time']>0,										'search_word_insert_time Error.');
			parent::assertTrue($obj2['search_word_insert_ip']>0,										'search_word_insert_ip Error.');
			
		}catch(Zend_Exception $e){
			parent::assertTrue(false,$e->getMessage());
		}
	}
	
	/**
	 * @since 2012.05.05
	 * Enter description here ...
	 */
	public function testManagerLoad()
	{
		try
		{
			$obj = new Search_wordManager();
			$obj->load();

			parent::assertTrue($obj['total']>0,			'total Error.');
			parent::assertTrue(is_array($obj['lists']),	'lists Error.');
		}catch(Zend_Exception $e){
			parent::assertTrue(false,$e->getMessage());
		}
	}

	/**
	 * @since 2012.05.05
	 * Enter description here ...
	 */
	public function testManagerAdminLoad()
	{
		try
		{
			$obj = new Search_wordManager();
			$data = $obj->adminLoad();
		}catch(Zend_Exception $e){
			parent::assertTrue(false,$e->getMessage());
		}
	}
	
	/**
	 * @since 2012.05.05
	 * Enter description here ...
	 */
	public function testUpdateCrawlTrueAdminLoad()
	{
		try
		{
			$obj = new Search_wordObj();
			$obj->load(self::$search_word_id);
			
			$manager = new Search_wordManager();
			$manager = $manager->updateCrawlTrue($obj['search_word_value']);
			
			$obj2 = new Search_wordObj();
			$obj2->load(self::$search_word_id);
			
			parent::assertEquals($obj['search_word_value'],			$obj2['search_word_value'],			'search_word_value Error.');
			parent::assertEquals($obj['search_word_useful_flag'],	$obj2['search_word_useful_flag'],	'search_word_useful_flag Error.');
			parent::assertTrue($obj2['search_word_crawl_flag']=='T',										'search_word_crawl_flag Error.');
			parent::assertTrue($obj2['search_word_insert_time']>0,										'search_word_insert_time Error.');
			parent::assertTrue($obj2['search_word_insert_ip']>0,										'search_word_insert_ip Error.');
			
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
		$obj = new Search_wordObj();
		$obj['dbObj']->where			= array(	"search_word_id='".self::$search_word_id."'");
		$obj['dbObj']->d();
	}
}
?>