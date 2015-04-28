<?php
$config = new Zend_Config_Ini(CONFIG_PATH.'/config.ini');
require_once 'Zend/Db.php';
if(substr($_SERVER['HTTP_HOST'],-3) == 'com' || substr($_SERVER['HTTP_HOST'],-3) == '.cn')
{
	$db_config = $config->database->db_com;
}
else
{
	$db_config = $config->database->db_dev;
}
$db = Zend_Db::factory($db_config);
Zend_Db_Table::setDefaultAdapter($db);
class Abs_model extends Zend_Db_Table
{
	public	$table_name,
			$primary_key	= '',
			$select_fields	= array(),
			$insert_fileds	= array(),
			$update_fileds	= array(),
			$where			= array(),
			$order_by		= array(),
			$group_by		= array(),
			$limit			= array();
	function __construct()
	{
		parent::__construct();
		$this->init();
	}
	public function init()
	{
		$this->_db->query('set names utf8');
	}

	public function c()
	{
		$sql = "SELECT
						count(*) AS `cnt`
				FROM
						`{$this->table_name}`
				 ".(count($this->where)>0 ? ' WHERE ' . implode(' AND ',$this->where): '');
		return $this->_db->fetchOne($sql);
	}

	/**
	 *
	 * Enter description here ...
	 * @param (int)$primary_key
	 */
	public function r($primary_key)
	{
		$this->where = array("`{$this->primary_key}`='{$primary_key}'");
		$this->limit = array(1);
		return $this->s();
	}

	public function s()
	{
		$sql = "SELECT ".
						(count($this->select_fields)>0 ? implode(',',$this->select_fields): '*')."
				FROM
						`{$this->table_name}`
				 ".(count($this->where)>0 ? ' WHERE ' . implode(' AND ',$this->where): '')
				 .(count($this->group_by)>0 ? ' GROUP BY ' . implode(',',$this->group_by): '')
				 .(count($this->order_by)>0 ? ' ORDER BY ' . implode(',',$this->order_by): '')
				 .(count($this->limit)>0 ? ' LIMIT ' .implode(',',$this->limit): '') . ";";

		$rst = $this->_db->fetchAll($sql);

		if(count($rst)>0 && $rst)
		{
			return $rst;
		}else{
			throw new NoRecordException("{$this->table_name}查询结果为空.");
		}
	}

	public function i()
	{
		$rows_affected = $this->_db->insert($this->table_name,$this->insert_fields);
		if($rows_affected>0)
		{
			return $rows_affected;
		}else{
			throw new DbInsertException("{$this->table_name} 数据插入失败.");
		}
	}

	public function iId()
	{
		if($insert_id = $this->_db->lastInsertId())
		{
			return $insert_id;
		}else{
			throw new Zend_Exception("lastInsertId 查询异常.");
		}
	}


	public function u()
	{
		$w				= count($this->where)>0 ? implode(' AND ',$this->where) : '';
		$rows_affected	= $this->_db->update($this->table_name,$this->update_fileds,$w);
		if($rows_affected>0)
		{
			return $rows_affected;
		}else{
			throw new DbUpdateException("{$this->table_name} 数据更新失败.");
		}
	}

	public function d()
	{
		$w = count($this->where)>0 ? implode('AND',$this->where) : '';
		$rows_affected = $this->_db->delete($this->table_name,$w);
		if($rows_affected>0)
		{
			return $rows_affected;
		}else{
			throw new DbDeleteException("{$this->table_name} 删除数据失败.");
		}
	}

	public function getDb()
	{
		return $this->_db;
	}
}