<?php
require_once dirname(__FILE__).'/../test.ini';
Zend_Loader::loadFile("So.php",SO_PATH);
class SoTest extends PHPUnit_Framework_TestCase
{
	static $movie_id = 0;

	public function testGetExpandedWords()
	{
		try
		{
			$so		= new So('movie');
			$words	= $so->getExpandedWords('x');

		}
		catch(Zend_Exception $e)
		{
			parent::assertTrue(false,$e->getMessage());
		}
	}

	public function testLoad()
	{
		try
		{
			$so		= new So('movie');
			$so->load('update_name');
		}
		catch(Zend_Exception $e)
		{
			parent::assertTrue(false,$e->getMessage());
		}
	}

	public function testInsert()
	{
		try
		{
			$so = new So('movie');
			$data = array(	'movie_id'			=> rand(0,1000),
							'movie_name'		=> 'test_name',
							'movie_starring'	=> 'test_starring',
							'movie_director'	=> 'test_director',
							'movie_description'	=> 'test_description',
							'movie_list_img_url'=> 'test_list_img_url',
							'movie_insert_time'	=> 'test_insert_time');
			$so->insert($data);
			self::$movie_id	= $data['movie_id'];
		}
		catch(Zend_Exception $e)
		{
			parent::assertTrue(false,$e->getMessage());
		}
	}

	public function testUpdate()
	{
		try
		{
			$so = new So('movie');
			$data = array(	'movie_id'			=> self::$movie_id,
							'movie_name'		=> 'update_name',
							'movie_starring'	=> 'update_starring',
							'movie_director'	=> 'update_director',
							'movie_description'	=> 'update_description',
							'movie_list_img_url'=> 'update_list_img_url',
							'movie_insert_time'	=> 'update_insert_time');
			$so->update($data);
		}
		catch(Zend_Exception $e)
		{
			parent::assertTrue(false,$e->getMessage());
		}
	}

	public function tesDelete()
	{
		try
		{
			$so = new So('movie');
			$so->delete(self::$movie_id);
		}
		catch(Zend_Exception $e)
		{
			parent::assertTrue(false,$e->getMessage());
		}
	}

}
?>