<?php
require_once TOP.'ObjManager.php';
class Search_wordManager extends ObjManager
{
 	function __construct()
 	{
 		parent::__construct();
 		$this->init();
 	}

 	public function init()
 	{
 		parent::init();
 		parent::setObj('Search_word');
 	}

 	public function adminLoad($search_word_display='')
 	{
 		$this->dbObj->where		= array_merge($this->dbObj->where,$this->where);
		count($this->limit)>0	? $this->dbObj->limit			= $this->limit			: false;
		return $this->dbObj->adminLoad($search_word_display);
 	}

 	public function updateCrawlTrue($search_word_value)
 	{
 		$this->where= array("`search_word_value`='{$search_word_value}'");

 		$this->dbObj->where		= array_merge($this->dbObj->where,$this->where);

 		$data					= $this->dbObj->s();

 		foreach($data AS $key=>$item)
 		{
 			$obj = new $this->obj(array($item));
 			$obj['search_word_crawl_flag'] = 'T';
 			$obj->update();
 		}
 	}
}