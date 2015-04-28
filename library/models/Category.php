<?php 
define('CT_TELEVISION','TELEVISION');//影视娱乐
require_once TOP.'Abs_model.php';
class Category extends Abs_model
{
	
	function __construct()
	{
		parent::__construct();
		$this->_init();
	}
	
	public function _init()
	{
		$this->table_name	= 'category';
		$this->order_by = array("`category_code` ASC");
		$this->primary_key	= 'category_id';
	}
	
	public function getName($category_code)
	{
		$sql = "SELECT `category_name` FROM `{$this->table_name}` WHERE `category_code`='{$category_code}'";
		$result = $this->_db->fetchOne($sql);
		if($result)
		{
			return $result;
		}
		else
		{
			throw new NoRecordException("{$category_code}不存在;");
		}
		
	}
}
?>