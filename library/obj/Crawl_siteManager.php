<?php
require_once TOP.'ObjManager.php';
class Crawl_siteManager extends ObjManager
{
 	function __construct()
 	{
 		parent::__construct();
 		$this->init();
 	}
 	
 	public function init()
 	{
 		parent::init();
 		parent::setObj('Crawl_site');
 	}
}