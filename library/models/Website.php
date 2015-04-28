<?php 
define('WS_DOWN','DOWN');//资源下载
define('WS_ONLINE','ONLINE');//在线观看
require_once TOP.'Abs_model.php';
class Website extends Abs_model
{
	
	function __construct()
	{
		parent::__construct();
		$this->_init();
	}
	private function _init()
	{
		$this->table_name	= 'website';
		$this->primary_key	= 'website_id';
		$this->where		= array("website_del_flag='F'");
		$this->order_by		= array('website_insert_time DESC');
	}
	
	public function loadByUrl($website_url)
	{
		$this->where = array("`website_url` REGEXP '([^[:alpha:]]{$website_url}|^{$website_url})'");
		return $this->s(true);
	}
	
	public function hit($website_id)
	{
		$sql = "UPDATE `website` SET `website_hot`=`website_hot`+1 WHERE website_id = '{$website_id}';";
		
		if($this->_db->query($sql) == false)
		{
			throw new DbUpdateException("点击次数增加失败. movie_id={$movie_id}");
		}
	}
}
?>