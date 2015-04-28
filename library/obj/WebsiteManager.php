<?php
require_once TOP.'ObjManager.php';
class WebsiteManager extends ObjManager
{
 	function __construct()
 	{
 		parent::__construct();
 		$this->init();
 	}
 	
 	public function init()
 	{
 		parent::init();
 		parent::setObj('Website');
 	}
 	
 	/**
 	 * @since 2012.03.31
 	 * Enter description here ...
 	 * @param (int) $size
 	 */
 	public function loadRecommend($size)
 	{
 		$this->where	= array("website_recommend_time>0");
 		$this->order_by = array('website_recommend_time DESC');
 		$this->limit 	= array($size);
 		$this->load();
 	}	
 	/**
 	 * @since 2012.03.31
 	 * Enter description here ...
 	 * @param (int) $size
 	 */
 	public function loadNew($size)
 	{
 		$this->order_by = array('website_insert_time DESC');
 		$this->limit 	= array($size);
 		$this->load();
 	}
 	/**
 	 * @since 2012.03.31
 	 * Enter description here ...
 	 * @param (int) $size
 	 */
 	public function loadHot($size)
 	{
 		$this->order_by = array('website_hot DESC');
 		$this->limit 	= array($size);
 		$this->load();
 	}
}