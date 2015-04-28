<?php
require_once dirname(__FILE__).'/../test.ini';
Zend_Loader::loadFile("MovieObj.php",OBJ_PATH);
Zend_Loader::loadFile("MovieManager.php",OBJ_PATH);
class MovieObjTest extends PHPUnit_Framework_TestCase
{
	static $movie_id = 0;
	/**
	 * @sine 2012.03.25
	 * Enter description here ...
	 */
	public function testInsert()
	{
		try
		{
			$obj = new MovieObj();
			$obj['fk_category_code']		= rand(10,99);
			$obj['movie_name']				= 'TEST-NAME'.time();
			$obj['movie_list_img_url']		= 'TEST-LIST_IMG_URL'.time();
			$obj['movie_page_img_url']		= 'TEST-PAGE_IMG_URL'.time();
			$obj['movie_starring']			= 'TEST-STRRING'.time().'&' . 'STRRING';
			$obj['movie_director']			= 'TEST-DIRECTOR'.time();
			$obj['movie_release_date']		= date('Y-m-d');
			$obj['movie_description']		= 'TEST-DESCRIPTION'.time();
			$obj['movie_check_flag']		= 'F';
			$obj['movie_recommend_time']	= time();
			$obj['movie_link']				= array(	array('movie_link_url'=>'w1'.time(),'movie_link_type'=>'DOWNLOAD','movie_link_check_flag'=>'F'),
														array('movie_link_url'=>'w2'.time(),'movie_link_type'=>'ONLINE','movie_link_check_flag'=>'F'));
			$obj->insert();

			self::$movie_id = $obj['movie_id'];

			$obj2 = new MovieObj();
			$obj2->load(self::$movie_id);
			parent::assertEquals($obj['fk_category_code'],		$obj2['fk_category_code'],				'fk_category_code Error.');
			parent::assertEquals($obj['movie_name'],			$obj2['movie_name'],					'movie_name Error.');
			parent::assertEquals($obj['movie_list_img_url'],	$obj2['movie_list_img_url'],			'movie_list_img_url Error.');
			parent::assertEquals($obj['movie_page_img_url'],	$obj2['movie_page_img_url'],			'movie_page_img_url Error.');
			parent::assertEquals($obj['movie_starring'],		implode('&',$obj2['movie_starring']),	'movie_starring Error.');
			parent::assertEquals($obj['movie_director'],		implode('&',$obj2['movie_director']),	'movie_director Error.');
			parent::assertEquals($obj['movie_release_date'],	$obj2['movie_release_date'],			'movie_release_date Error.');
			parent::assertEquals($obj['movie_description'],		$obj2['movie_description'],				'movie_description Error.');
			parent::assertEquals($obj['movie_check_flag'],		$obj2['movie_check_flag'],				'movie_check_flag Error.');
			parent::assertTrue($obj2['movie_recommend_time']>0,											'movie_recommend_time Error.');
			parent::assertTrue($obj2['movie_insert_time']>0,											'movie_insert_time Error.');
			parent::assertTrue($obj2['movie_insert_ip']>0,												'movie_insert_ip Error.');
			parent::assertTrue(count($obj2['movie_link'])>0,											'movie_link Error.');

			foreach($obj2['movie_link'] AS $key=>$item)
			{
				parent::assertEquals($item['movie_link_url'],			$obj['movie_link'][$key]['movie_link_url'],			'movie_link_url Error.');
				parent::assertEquals($item['movie_link_check_flag'],	$obj['movie_link'][$key]['movie_link_check_flag'],	'movie_link_check_flag Error.');
				parent::assertEquals($item['movie_link_type'],			$obj['movie_link'][$key]['movie_link_type'],		'movie_link_type Error.');
			}
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
			$obj = new MovieObj();
			$obj->load(self::$movie_id);
			$obj['fk_category_code']		= rand(10,99);
			$obj['movie_name']				= 'TEST-NAME'.time();
			$obj['movie_list_img_url']		= 'TEST-LIST_IMG_URL'.time();
			$obj['movie_page_img_url']		= 'TEST-PAGE_IMG_URL'.time();
			$obj['movie_starring']			= 'TEST-STRRING'.time();
			$obj['movie_director']			= 'TEST-DIRECTOR'.time();
			$obj['movie_release_date']		= date('Y-m-d');
			$obj['movie_description']		= 'TEST-DESCRIPTION'.time();
			$obj['movie_check_flag']		= 'T';
			$obj['movie_hot']				= rand(0,10);
			$obj['movie_recommend_time']	= time();
			$obj['movie_link']				= array(	array('movie_link_url'=>'uw1'.time(),'movie_link_type'=>'ONLINE','movie_link_check_flag'=>'F')	);

			$obj->update();
			$obj2 = new MovieObj();

			$obj2->load(self::$movie_id);

			parent::assertEquals($obj['fk_category_code'],		$obj2['fk_category_code'],				'fk_category_code Error.');
			parent::assertEquals($obj['movie_name'],			$obj2['movie_name'],					'movie_name Error.');
			parent::assertEquals($obj['movie_list_img_url'],	$obj2['movie_list_img_url'],			'movie_list_img_url Error.');
			parent::assertEquals($obj['movie_page_img_url'],	$obj2['movie_page_img_url'],			'movie_page_img_url Error.');
			parent::assertEquals($obj['movie_starring'],		implode('&',$obj2['movie_starring']),	'movie_starring Error.');
			parent::assertEquals($obj['movie_director'],		implode('&',$obj2['movie_director']),	'movie_director Error.');
			parent::assertEquals($obj['movie_release_date'],	$obj2['movie_release_date'],			'movie_release_date Error.');
			parent::assertEquals($obj['movie_description'],		$obj2['movie_description'],				'movie_description Error.');
			parent::assertEquals($obj['movie_check_flag'],		$obj2['movie_check_flag'],				'movie_check_flag Error.');
			parent::assertEquals($obj['movie_hot'],				$obj2['movie_hot'],						'movie_hot Error.');
			parent::assertTrue($obj2['movie_recommend_time']>0,											'movie_recommend_time Error.');
			parent::assertEquals($obj['movie_insert_time'],		$obj2['movie_insert_time'],				'movie_insert_time Error.');
			parent::assertEquals($obj['movie_insert_ip'],		$obj2['movie_insert_ip'],				'movie_insert_ip Error.');
			parent::assertTrue(count($obj2['movie_link'])>0,											'movie_link Error.');

			for( $key=2; $key<count($obj2['movie_link'])-1;$key++)
			{
				$item = $obj2['movie_online_link'][$key];
				parent::assertEquals($item['movie_link_url'],			$obj['movie_link'][$key-2]['movie_link_url'],			'movie_link_url Error.');
				parent::assertEquals($item['movie_link_check_flag'],	$obj['movie_link'][$key-2]['movie_link_check_flag'],	'movie_link_check_flag Error.');
				parent::assertEquals($item['movie_link_type'],			$obj['movie_link'][$key-2]['movie_link_type'],			'movie_link_type Error.');
			}
		}catch(Zend_Exception $e){
			parent::assertTrue(false,$e->getMessage());
		}
	}

	/**
	 * @since 2012.03.25
	 * Enter description here ...
	 */
	public function testManagerLoad()
	{
		try
		{
			$obj = new MovieManager();
			$obj->load();

			parent::assertTrue($obj['total']>0,			'total Error.');
			parent::assertTrue(is_array($obj['lists']),	'lists Error.');
		}catch(Zend_Exception $e){
			parent::assertTrue(false,$e->getMessage());
		}
	}

	/**
	 * @since 2012.03.25
	 * Enter description here ...
	 */
	public function testManagerLoadByName()
	{
		try
		{
			$obj = new MovieObj();
			$obj->load(self::$movie_id);

			$manager = new MovieManager();
			$manager->loadByName($obj['movie_name']);

			parent::assertTrue($manager['total']>0,			'total Error.');
			parent::assertTrue(is_array($manager['lists']),	'lists Error.');
		}catch(Zend_Exception $e){
			parent::assertTrue(false,$e->getMessage());
		}
	}

	/**
	 * @since 2012.03.31
	 * Enter description here ...
	 */
	public function testManagerLoadRecommend()
	{
		try
		{
			$manager = new MovieManager();
			$manager->loadRecommend(1);

			parent::assertTrue($manager['total']>0,			'total Error.');
			parent::assertTrue(is_array($manager['lists']),	'lists Error.');
		}catch(Zend_Exception $e){
			parent::assertTrue(false,$e->getMessage());
		}
	}

	/**
	 * @since 2012.03.31
	 * Enter description here ...
	 */
	public function testManagerLoadHot()
	{
		try
		{
			$manager = new MovieManager();
			$manager->loadHot(1);

			parent::assertTrue($manager['total']>0,			'total Error.');
			parent::assertTrue(is_array($manager['lists']),	'lists Error.');
		}catch(Zend_Exception $e){
			parent::assertTrue(false,$e->getMessage());
		}
	}
	/**
	 * @since 2012.03.25
	 * Enter description here ...
	 */
	public function testDelete()
	{
		try
		{
			$obj = new MovieObj();
			$obj->load(self::$movie_id);
			foreach($obj['movie_link'] AS $item)
			{
				$item->delete();
			}
			$obj->delete();
		}catch(Zend_Exception $e){
			parent::assertTrue(false,$e->getMessage());
		}
	}

	/**
	 * @since 2012.03.25
	 * Enter description here ...
	 */
	public function testCompletedDeleteTestId()
	{
		$obj = new MovieObj();
		$obj['dbObj']->where			= array(	"movie_id='".self::$movie_id."'");
		$obj['dbObj']->d();
	}
}
?>