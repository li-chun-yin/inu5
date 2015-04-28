<?php
require_once TOP.'ObjManager.php';
class CategoryManager extends ObjManager
{
 	function __construct()
 	{
 		parent::__construct();
 		$this->init();
 	}

 	public function init()
 	{
 		parent::init();
 		parent::setObj('Category');
 	}

 	public function loadTelevisionCategory()
 	{
 		$this->where= array("category_type='".CT_TELEVISION."'");
 		$this->load();
 	}

 	/**
 	 * since 2012.03.31
 	 * Enter description here ...
 	 * @param (int) $movie_size
 	 */
 	public function loadTopTelCateHasRecMov($movie_size)
 	{
 		$this->where= array("length(category_code)=2","category_type='".CT_TELEVISION."'");
 		$this->load();
 		foreach($this->lists AS $key=>$lists)
 		{
 			try
 			{
	 			$movie_manager = getObj('MovieManager');
	  			$movie_manager->loadRecommend($movie_size,$lists['category_code']);
	  			$this->lists[$key]['recommend_movie'] = $movie_manager;
 			}
 			catch(NoRecordException $e)
 			{
 				$this->lists[$key]['recommend_movie'] = array('total'=>0,'lists'=>array());
 			}
 		}
 	}
}