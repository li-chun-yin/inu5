<?php 
require_once TOP.'Abs_model.php';
class Movie_link_status extends Abs_model
{
	
	function __construct()
	{
		parent::__construct();
		$this->_init();
	}
	private function _init()
	{
		$this->table_name	= 'movie_link_status';
		$this->order_by		= array('`movie_link_status_insert_time` DESC');
	}
}
?>