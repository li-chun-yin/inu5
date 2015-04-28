<?php
require_once TOP.'Abs_model.php';
class Movie extends Abs_model
{

	function __construct()
	{
		parent::__construct();
		$this->_init();
	}
	private function _init()
	{
		$this->table_name	= 'movie';
		$this->where		= array("`movie_del_flag`='F'");
		$this->order_by		= array('`movie_insert_time` DESC');
		$this->primary_key	= 'Movie_id';
	}

	public function sJoinMovieLink()
	{
		$sql = "SELECT ".
						(count($this->select_fields)>0 ? implode(',',$this->select_fields): '*')."
				FROM
						`{$this->table_name}` AS `m`
				LEFT JOIN `movie_link` AS `ml` ON `ml`.`fk_movie_id` = `m`.`movie_id`
				 ".(count($this->where)>0 ? ' WHERE ' . implode(' AND ',$this->where): '')
				 .(count($this->order_by)>0 ? ' ORDER BY ' . implode(',',$this->order_by): '')
				 .(count($this->group_by)>0 ? ' GROUP BY ' . implode(',',$this->group_by): '')
				 .(count($this->limit)>0 ? ' LIMIT ' .implode(',',$this->limit): '') . ";";
		return count($this->_db->fetchAll($sql))>0 ? $this->_db->fetchAll($sql) : false;
	}

	public function hit($movie_id)
	{
		$sql = "UPDATE `{$this->table_name}` SET `movie_hot`=`movie_hot`+1 WHERE movie_id = '{$movie_id}';";

		if($this->_db->query($sql) == false)
		{
			throw new DbUpdateException("点击次数增加失败. movie_id={$movie_id}");
		}
	}

	public function c()
	{
		$sql = "SELECT
						count(*) AS `cnt`
				FROM
						`{$this->table_name}` AS `m`
				LEFT JOIN `category` AS `c` ON `c`.`category_code` = `m`.`fk_category_code`
				 ".(count($this->where)>0 ? ' WHERE ' . implode(' AND ',$this->where): '');
		return $this->_db->fetchOne($sql);
	}

	public function s($isRow=false)
	{
		$sql = "SELECT
						*
				FROM
					(SELECT ".
					(count($this->select_fields)>0 ? implode(',',$this->select_fields): 'm.*,c.category_name')."
					FROM
					`{$this->table_name}` AS `m`
					LEFT JOIN `category` AS `c` ON `c`.`category_code` = `m`.`fk_category_code`
					".(count($this->where)>0 ? ' WHERE ' . implode(' AND ',$this->where): '')
					.(count($this->order_by)>0 ? ' ORDER BY ' . implode(',',$this->order_by): '')
					.(count($this->group_by)>0 ? ' GROUP BY ' . implode(',',$this->group_by): '')
					.(count($this->limit)>0 ? ' LIMIT ' .implode(',',$this->limit): '') . ") AS `nm`
				LEFT JOIN `movie_link` AS `ml` ON `ml`.`fk_movie_id`=`nm`.`movie_id`;";

		$rst = $this->_db->fetchAll($sql);

		if(count($rst)>0 && $rst){
			return $rst;
		}else{
			throw new NoRecordException("{$this->table_name}查询结果为空.");
		}
	}

	/**
	 * @since 2012.03.31
	 * Enter description here ...
	 */
	public function loadHot()
	{
 		$sql = "SELECT  ".
						(count($this->select_fields)>0 ? implode(',',$this->select_fields): '`m`.*')."
				FROM `movie` AS `m`
				LEFT JOIN `category` AS `c` ON `c`.`category_code` = `m`.`fk_category_code` AND `c`.`category_type`='TELEVISION'
 				".(count($this->where)>0 ? ' WHERE ' . implode(' AND ',$this->where): '') ."
 				ORDER By `movie_hot` DESC"
 				.(count($this->limit)>0 ? ' LIMIT ' .implode(',',$this->limit): '') . ";";
 		if($this->select_fields === array("COUNT(*) AS `cnt`"))
 		{
 			 return $this->_db->fetchOne($sql);
 		}
 		else
 		{
 			$result = $this->_db->fetchAll($sql);

	 		if(count($result)>0 && $result)
			{
				return $result;
			}else{
				throw new NoRecordException("{$this->table_name}查询结果为空.");
			}
 		}
	}

	/**
	 * @since 2012.03.31
	 * Enter description here ...
	 */
	public function loadRecommend()
	{
		array_push($this->where,"`m`.`movie_recommend_time`>0");
 		$sql = "SELECT  ".
						(count($this->select_fields)>0 ? implode(',',$this->select_fields): '`m`.*')."
				FROM `movie` AS `m`
				LEFT JOIN `category` AS `c` ON `c`.`category_code` = `m`.`fk_category_code` AND `c`.`category_type`='TELEVISION'
 				".(count($this->where)>0 ? ' WHERE ' . implode(' AND ',$this->where): '') ."
 				ORDER By `movie_recommend_time` DESC"
 				.(count($this->limit)>0 ? ' LIMIT ' .implode(',',$this->limit): '') . ";";
 		if($this->select_fields === array("COUNT(*) AS `cnt`"))
 		{
 			 return $this->_db->fetchOne($sql);
 		}
 		else
 		{
 			$result = $this->_db->fetchAll($sql);

	 		if(count($result)>0 && $result)
			{
				return $result;
			}else{
				throw new NoRecordException("{$this->table_name}查询结果为空.");
			}
 		}
	}

//	/**
//	 * @since 2012.03.31
//	 * Enter description here ...
//	 */
//	public function insertMore($array)
//	{
//		$sql = "INSERT INTO `movie`";
//		foreach($array AS $k=>$v)
//		{
//			if($k == 0)
//			{
//				$sql .= '(' . implode(',',array_keys($v)) . ')VALUES';
//			}
//			$sql .= '(' . implode(',',array_values($v)) . ')';
//		}
//
// 		$query = $this->_db->query($sql);
//
// 		if($query == false)
// 		{
// 			throw new DbInsertException("movie 数据插入失败.-{$sql}");
// 		}
//	}
}
?>