<?php
require_once TOP.'Abs_model.php';
class Search_word extends Abs_model
{

	function __construct()
	{
		parent::__construct();
		$this->_init();
	}
	private function _init()
	{
		$this->table_name	= 'search_word';
		$this->primary_key	= 'search_word_id';
	}

	public function adminLoad($search_word_display='')
	{
		/*******************************VAR DATA***********************************************/
		$result = array('total' =>0, 'lists'=>array());
		/**************************************************************************************/
		$sql = "
						SELECT
				        `search_word_id` AS `search_word_id`,
				        `search_word_value` AS `search_word_value`,
				        SUM(`search_word_total_cnt`) AS `search_word_total_cnt`,
				        SUM(`search_word_useful_true_cnt`) AS `search_word_useful_true_cnt`,
				        SUM(`search_word_useful_false_cnt`) AS `search_word_useful_false_cnt`,
				        SUM(`search_word_crawl_true_cnt`) AS `search_word_crawl_true_cnt`,
				        SUM(`search_word_crawl_false_cnt`) AS `search_word_crawl_false_cnt`
				FROM(
				        SELECT
				                *,
				                count(*) AS `search_word_total_cnt`,
				                0 AS `search_word_useful_true_cnt`,
				                0 AS `search_word_useful_false_cnt`,
				                0 AS `search_word_crawl_true_cnt`,
				                0 AS `search_word_crawl_false_cnt`
				        FROM `search_word`"
				        .(count($this->where)>0 ? ' WHERE ' . implode(' AND ',$this->where): '')."
				        GROUP BY `search_word_value`
				    UNION ALL
				        SELECT
				                *,
				                0 AS `search_word_total_cnt`,
				                count(*)AS `search_word_useful_true_cnt`,
				                0 AS `search_word_useful_false_cnt`,
				                0 AS `search_word_crawl_true_cnt`,
				                0 AS `search_word_crawl_false_cnt`
				        FROM `search_word`
				        WHERE `search_word_useful_flag` = 'T'".(count($this->where)>0 ? ' AND '. implode(' AND ',$this->where): '')."
				        GROUP BY `search_word_value`,`search_word_useful_flag`
				    UNION ALL
				        SELECT
				                *,
				                0 AS `search_word_total_cnt`,
				                0 AS `search_word_useful_true_cnt`,
				                count(*) AS `search_word_useful_false_cnt`,
				                0 AS `search_word_crawl_true_cnt`,
				                0 AS `search_word_crawl_false_cnt`
				        FROM `search_word`
				        WHERE `search_word_useful_flag` = 'F'".(count($this->where)>0 ? ' AND '. implode(' AND ',$this->where): '')."
				        GROUP BY `search_word_value`,`search_word_useful_flag`
				    UNION ALL
				        SELECT
				                *,
				                0 AS `search_word_total_cnt`,
				                0 AS `search_word_useful_true_cnt`,
				                0 AS `search_word_useful_false_cnt`,
				                count(*) AS `search_word_crawl_true_cnt`,
				                0 AS `search_word_crawl_false_cnt`
				        FROM `search_word`
				        WHERE `search_word_crawl_flag` = 'T'".(count($this->where)>0 ? ' AND '. implode(' AND ',$this->where): '')."
				        GROUP BY `search_word_value`,`search_word_crawl_flag`
				    UNION ALL
				        SELECT
				                *,
				                0 AS `search_word_total_cnt`,
				                0 AS `search_word_useful_true_cnt`,
				                0 AS `search_word_useful_false_cnt`,
				                0 AS `search_word_crawl_true_cnt`,
				                count(*) AS `search_word_crawl_false_cnt`
				        FROM `search_word`
				        WHERE `search_word_crawl_flag` = 'F'".(count($this->where)>0 ? ' AND '. implode(' AND ',$this->where): '')."
				        GROUP BY `search_word_value`,`search_word_crawl_flag`
				 ) AS `tmp`
				GROUP BY `search_word_value`
				 {$search_word_display}
				ORDER BY  `search_word_total_cnt` DESC";

		$listSql	= $sql .(count($this->limit)>0 ? ' LIMIT ' .implode(',',$this->limit): '') . ";";
		$countSql	= "SELECT COUNT(*) AS `total` FROM ({$sql}) AS `tmp`";

		$result['total'] = $this->_db->fetchOne($countSql);
		$result['lists'] = $this->_db->fetchAll($listSql);

		return $result;
	}
}
?>