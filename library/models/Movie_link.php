<?php
define('ML_DOWN','DOWNLOAD');//资源下载
define('ML_ONLINE','ONLINE');//在线观看
require_once TOP.'Abs_model.php';
class Movie_link extends Abs_model
{

	function __construct()
	{
		parent::__construct();
		$this->_init();
	}

	private function _init()
	{
		$this->table_name	= 'movie_link';
		$this->order_by		= array('`movie_link_insert_time` DESC');
		$this->primary_key	= 'movie_link_id';
	}

	public function isSetUrl($movie_link_url)
	{
		$sql = "SELECT count(*) FROM {$this->table_name} where movie_link_url='{$movie_link_url}'";
		if($this->_db->fetchOne($sql)>0)
		{
			throw new DbCheckException("{$movie_link_url}已存在.");
		}
	}

	public function getMovieLinkUrls()
	{
		$sql = "SELECT `movie_link_url` FROM {$this->table_name}";
		$data = $this->_db->fetchAll($sql);
		if(count($data)>0 && $data){
			$result	= array();
			foreach($data AS $key=>$item)
			{
				$result[$key] = $item['movie_link_url'];
			}
			return $result;
		}else{
			throw new NoRecordException("{$this->table_name}查询结果为空.");
		}

	}
}
?>