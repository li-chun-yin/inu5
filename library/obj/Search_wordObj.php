<?php
require_once(MODEL_PATH.'Search_word.php');
class Search_wordObj extends Abs_obj
{
	protected
		$search_word_id			= 0,
		$search_word_value		= '',
		$search_word_useful_flag= 'T',
		$search_word_crawl_flag	= 'F',
		$search_word_insert_time= 0,
		$search_word_insert_ip	= 0,
/******************************************************************************/
		$search_word_cnt		= 0;	//数量

	public function __construct($data='')
	{
		parent::__construct();
		$this->dbObj = new Search_word();
		if(!empty($data)){$this->init($data);}
	}

	/**
	 * @since 2012.03.25
	 * @see library/top/Abs_obj::init()
	 */
	public function init($data)
	{
		parent::init($data[0]);
		self::format();
	}

	private function format()
	{
		$this->search_word_insert_time		= $this->search_word_insert_time ? date('Y-m-d H:i:s',$this->search_word_insert_time) : '';
		$this->search_word_insert_ip		= long2ip($this->search_word_insert_ip);
	}

	/**
	 * @since 2012.03.25
	 * Enter description here ...
	 * @param (int)$movie_id
	 * 装载
	 */
	public function load($search_word_id)
	{

		$data = $this->dbObj->r($search_word_id);
		$this->init($data);
	}

	/**
	 * @since 2012.03.25
	 * Enter description here ...
	 * 插入
	 */
	public function insert()
	{
		$this->checked();
		$this->dbObj->insert_fields = array(	'search_word_value'			=> $this->search_word_value,
												'search_word_useful_flag'	=> $this->search_word_useful_flag,
												'search_word_crawl_flag'	=> $this->search_word_crawl_flag,
												'search_word_insert_time'	=> new Zend_Db_Expr("UNIX_TIMESTAMP()"),
												'search_word_insert_ip'		=> get_ip());
		$this->dbObj->i();
		$this->search_word_id = $this->dbObj->iId();
	}

	/**
	 * @since 2012.05.07
	 * Enter description here ...
	 * 更新
	 */
	public function update()
	{
		$this->checked();

		$this->dbObj->update_fileds	= array(	'search_word_useful_flag'		=> $this->search_word_useful_flag,
												'search_word_crawl_flag'		=> $this->search_word_crawl_flag);

		if(parent::isNeedUpdate($this->dbObj->update_fileds))
		{
			$this->dbObj->where			= array(	"search_word_id='{$this->search_word_id}'");
			$this->dbObj->u();
		}
	}
	/**
	 * @since 2012.03.25
	 * Enter description here ...
	 * 验证
	 */
	private function checked()
	{
		if(empty($this->search_word_value)){throw new CheckFailedException('搜索关键字不能为空.');}

		if(!in_array($this->search_word_useful_flag,array('T','F'))){$this->search_word_useful_flag = 'F';}

		if(!in_array($this->search_word_crawl_flag,array('T','F'))){$this->search_word_crawl_flag = 'F';}
	}
}