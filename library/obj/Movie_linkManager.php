<?php
require_once TOP.'ObjManager.php';
class Movie_linkManager extends ObjManager
{
 	function __construct()
 	{
 		parent::__construct();
 		$this->init();
 	}

 	public function init()
 	{
 		parent::init();
 		parent::setObj('Movie_link');
 	}

 	public function getMovieLinkUrls()
 	{
		return $this->dbObj->getMovieLinkUrls();
 	}
}