<?php
require_once TOP.'ObjManager.php';
class MovieManager extends ObjManager
{
 	function __construct()
 	{
 		parent::__construct();
 		$this->init();
 	}

 	public function init()
 	{
 		parent::init();
 		parent::setObj('Movie');
 	}

 	public function loadByName($movie_name)
 	{
 		$this->where= array("`movie_name`='{$movie_name}'");
 		$this->load();
 	}

 	/**
 	 * @since 2012.03.31
 	 * Enter description here ...
 	 * @param (string) $category_code
 	 */
 	public function loadRecommend($size,$category_code='')
 	{
 		$where	= $category_code ? array("`fk_category_code` LIKE '{$category_code}%'") : array();
 		$this->dbObj->where			= array_merge($this->dbObj->where,$where);
 		/***total***/
 		$this->dbObj->select_fields	= array("COUNT(*) AS `cnt`");
 		$this->total				= $this->dbObj->loadRecommend();

 		/***lists***/
 		$this->dbObj->select_fields	= array();
 		$this->dbObj->limit			= array($size);
 		$data						= $this->dbObj->loadRecommend();

 		$ini_array	= array();
		foreach($data AS $item)
		{
			@list($name,$key) = each(array_values(array_slice($item,0,1)));
			$ini_array[$key][]	= $item;
		}

 		foreach($ini_array AS $key=>$item)
		{
			array_push($this->lists,new $this->obj($item));
		}
 	}

 	/**
 	 * @since 2012.03.31
 	 * Enter description here ...
 	 * @param (string) $category_code
 	 */
 	public function loadHot($size,$category_code='')
 	{
 		/***total***/
 		$this->dbObj->select_fields	= array("COUNT(*) AS `cnt`");
 		$this->dbObj->where			= $category_code ? array("`fk_category_code` LIKE '{$category_code}%'") : array();
 		$this->total				= $this->dbObj->loadHot();

 		/***lists***/
 		$this->dbObj->select_fields	= array();
 		$this->dbObj->where			= $category_code ? array("`fk_category_code` LIKE '{$category_code}%'") : array();
 		$this->dbObj->limit			= array($size);
 		$data						= $this->dbObj->loadHot();

 	 	$ini_array	= array();
		foreach($data AS $item)
		{
			@list($name,$key) = each(array_values(array_slice($item,0,1)));
			$ini_array[$key][]	= $item;
		}

 		foreach($ini_array AS $key=>$item)
		{
			array_push($this->lists,new $this->obj($item));
		}
 	}
}