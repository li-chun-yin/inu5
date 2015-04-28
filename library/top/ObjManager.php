<?php
class ObjManager implements ArrayAccess
{
	public		$select_fields	= array(),
				$order_by		= array(),
				$group_by		= array(),
				$limit			= array(),
				$where			= array();
	protected	$Obj			= null;
	protected	$dbObj			= null;
	protected	$lists			= array();
	protected	$total			= 0;
	function __construct()
	{
		$this->init();
	}

	public function init()
	{
	}

	/**
	 * @since 2012.03.19
	 * Enter description here ...
	 * @param (string) $obj_name
	 */
	public function setObj($obj_name)
	{
		if (!class_exists("{$obj_name}Obj"))
		{
			Zend_Loader::loadFile("{$obj_name}Obj.php",OBJ_PATH);
		}
		$this->obj		= "{$obj_name}Obj";
		$this->dbObj	= new $obj_name();
	}

	/**
	 * @since 2012.03.18
	 * Enter description here ...
	 */
	public function load()
	{
		$this->dbObj->where		= array_merge($this->dbObj->where,$this->where);
		count($this->select_fields)>0	? $this->dbObj->select_fields	= $this->select_fields	: false;
		count($this->order_by)>0		? $this->dbObj->order_by		= $this->order_by		: false;
		count($this->group_by)>0		? $this->dbObj->group_by		= $this->group_by		: false;
		count($this->limit)>0			? $this->dbObj->limit			= $this->limit			: false;

		$this->total			= $this->dbObj->c();
		$data					= $this->dbObj->s();

		$ini_array	= array();
		foreach($data AS $item)
		{
			@list($name,$key) = each(array_values(array_slice($item,0,1)));
			$ini_array[$key][]	= $item;
		}

		foreach($ini_array AS $key=>$item)
		{
			array_push($this->lists,new $this->obj($item));
		}
	}
    public function offsetSet($offset, $value) {
            $this->$offset = $value;
    }
    public function offsetExists($offset) {
        return isset($this->$offset);
    }
    public function offsetUnset($offset) {
        unset($this->$offset);
    }
    public function offsetGet($offset) {
        return isset($this->$offset) ? $this->$offset : null;
    }
}