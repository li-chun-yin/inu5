<?php
abstract class Abs_obj implements ArrayAccess
{
	protected $dbObj			=	null;
	public function __construct()
	{

	}
	public function init($data)
	{
		if(count($data) < 1){return;}
		foreach($data AS $key=>$item)
		{
			if(property_exists($this, $key))
			{
				$this->$key=$item;
			}
		}
		$this->dbCheckData = $data;
	}

	public function isNeedUpdate($data)
	{
		while(list($key,$val) = each($data))
		{
			if((isset($this->dbCheckData[$key]) || $this->dbCheckData[$key] ==null) && $this->dbCheckData[$key] != $val)
			{
				return true;
			}
		}
		return false;
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

    protected function magicQuotes($string)
    {
    	return str_replace(array("'",'"'),array("&#039;","&quot;"),$string);
    }

    protected function urlFormart($url)
    {
    	return preg_replace('@^http://@i','',$url);
    }
}