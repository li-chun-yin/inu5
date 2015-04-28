<?php 
require_once TOP.'Abs_model.php';
class Crawl_site extends Abs_model
{
	
	function __construct()
	{
		parent::__construct();
		$this->_init();
	}
	private function _init()
	{
		$this->table_name	= 'crawl_site';
		$this->primary_key	= 'crawl_site_id';
		$this->order_by		= array('`crawl_site_insert_time` DESC');
	}
}
?>