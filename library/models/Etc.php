<?php
require_once TOP.'Abs_model.php';
class Etc extends Abs_model
{

	function __construct()
	{
		parent::__construct();
		$this->_init();
	}

	public function _init()
	{
		//
	}

	public function siteMapUrl()
	{
		$sql = "SELECT
				    `url`,`priority`
				FROM
				(
				    SELECT
				        CONCAT('http://www.inu5.com/movie_detail_id_', CAST(`movie_id` AS CHAR),'.html') AS `url`,
				        `movie_insert_time` AS `time`,
				        '0.7' AS `priority`
				    FROM `inu5`.`movie`
				    WHERE `movie_del_flag`='F'
				UNION ALL
				    SELECT
				        CONCAT('http://www.inu5.com/movie_list_cc_', CAST(`category_code` AS CHAR),'.html') AS `url`,
				        `category_id` AS `time`,
				        '0.8' AS `priority`
				    FROM `inu5`.`category`
				UNION ALL
				    SELECT
				        CONCAT('http://www.inu5.com/search_sw_', CAST(`search_word_value` AS CHAR),'.html') AS `url`,
				        `search_word_insert_time` AS `time`,
				       '0.9' AS `priority`
				    FROM `inu5`.`search_word`
				UNION ALL
				    SELECT 'http://www.inu5.com' AS 'url',0 AS `time`,'1.0' AS `priority`
				) AS `tmp`
				ORDER BY `time` DESC
				LIMIT 50000";
		$result = $this->_db->fetchAll($sql);
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