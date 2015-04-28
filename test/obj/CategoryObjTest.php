<?php
require_once dirname(__FILE__).'/../test.ini';
Zend_Loader::loadFile("CategoryObj.php",OBJ_PATH);
Zend_Loader::loadFile("CategoryManager.php",OBJ_PATH);
class CategoryObjTest extends PHPUnit_Framework_TestCase
{
	static $category_id = 0;
	/**
	 * @sine 2012.03.18
	 * Enter description here ...
	 */
	public function testInsert()
	{
		try
		{
			$obj = new CategoryObj();
			$obj['category_name']		= 'TEST-NAME'.time();
			$obj['category_type']		= CT_TELEVISION;
			$obj['category_use_flag']	= 'F';
			$obj->insert(0);
			self::$category_id = $obj['category_id'];

			$obj2 = new CategoryObj();
			$obj2->load(self::$category_id);

			parent::assertEquals($obj['category_name'],		$obj2['category_name'],		'category_name Error.');
			parent::assertEquals($obj['category_code'],		$obj2['category_code'],		'category_code Error.');
			parent::assertEquals($obj['category_type'],		$obj2['category_type'],		'category_type Error.');
			parent::assertEquals($obj['category_use_flag'],	$obj2['category_use_flag'],	'category_use_flag Error.');
		}catch(Zend_Exception $e){
			parent::assertTrue(false,$e->getMessage());
		}
	}

	/**
	 * @since 2012.04.01
	 * Enter description here ...
	 */
	public function testGetName()
	{
		try
		{
			$obj = new CategoryObj();
			$obj->load(self::$category_id);

			$obj2 = new CategoryObj();
			$name =$obj2->getName($obj['category_code']);

			parent::assertEquals($obj['category_name'],		$name,		'category_name Error.');
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
			$obj = new CategoryObj();
			$obj->load(self::$category_id);
			$obj['category_name']		= 'TEST-NAME'.time();
			$obj['category_use_flag']	= 'T';
			$obj->update();

			$obj2 = new CategoryObj();
			$obj2->load(self::$category_id);

			parent::assertEquals($obj['category_name'],		$obj2['category_name'],		'category_name Error.');
			parent::assertEquals($obj['category_code'],		$obj2['category_code'],		'category_code Error.');
			parent::assertEquals($obj['category_type'],		$obj2['category_type'],		'category_type Error.');
			parent::assertEquals($obj['category_use_flag'],	$obj2['category_use_flag'],	'category_use_flag Error.');
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
			$obj = new CategoryManager();
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
	public function testManagerloadTelevisionCategory()
	{
		try
		{
			$obj = new CategoryManager();
			$obj->loadTelevisionCategory();

			parent::assertTrue($obj['total']>0,			'total Error.');
			parent::assertTrue(is_array($obj['lists']),	'lists Error.');
		}catch(Zend_Exception $e){
			parent::assertTrue(false,$e->getMessage());
		}
	}
	/**
	 * @since 2012.03.31
	 * Enter description here ...
	 */
	public function testManagerloadTopTelCateHasRecMov()
	{
		try
		{
			$obj = new CategoryManager();
			$obj->loadTopTelCateHasRecMov(1);

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
			$obj = new CategoryObj();
			$obj->load(self::$category_id);
			$obj->delete();
		}catch(Zend_Exception $e){
			parent::assertTrue(false,$e->getMessage());
		}
	}
}
?>