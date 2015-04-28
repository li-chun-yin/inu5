<?php
require_once(MODEL_PATH.'Website.php');
class WebsiteObj extends Abs_obj
{
	protected
		$dbObj					= null,
		$website_id				= 0,
		$website_name			= '',
		$website_url			= '',
		$website_hot			= 0,
		$website_check_flag		= 'F',
		$website_del_flag		= 'F',
		$website_recommend_time	= 0,
		$website_insert_time	= 0,
		$website_insert_ip		= 0;

	public function __construct($data='')
	{
		parent::__construct();
		$this->dbObj = new Website();
		if(!empty($data)){$this->init($data);}
	}

	/**
	 * @since 2012.03.24
	 * @see library/top/Abs_obj::init()
	 */
	public function init($data)
	{
		parent::init($data[0]);
		self::format();
	}

	private function format()
	{
		$this->website_recommend_time	= $this->website_recommend_time ? date('Y-m-d H:i:s',$this->website_recommend_time) : '';
		$this->website_insert_time		= $this->website_insert_time ? date('Y-m-d H:i:s',$this->website_insert_time) : '';
		$this->website_insert_ip		= long2ip($this->website_insert_ip);
	}

	/**
	 * @since 2012.03.24
	 * Enter description here ...
	 * @param $category_id
	 * 装载
	 */
	public function load($website_id)
	{

		$data = $this->dbObj->r($website_id);
		$this->init($data);
	}

	/**
	 * @since 2012.05.03
	 * Enter description here ...
	 */
	public function hit()
	{
		$this->dbObj->hit($this->website_id);
	}
	/**
	 * @since 2012.03.24
	 * Enter description here ...
	 * @param $category_id
	 * 装载
	 */
	public function loadByUrl($website_url)
	{

		$data = $this->dbObj->loadByUrl($website_url);
		$this->init($data);
	}

	/**
	 * @since 2012.03.24
	 * Enter description here ...
	 * 插入
	 */
	public function insert()
	{
		$this->checked();

		$this->dbObj->insert_fields = array(	'website_name'			=> $this->website_name,
												'website_url'			=> $this->website_url,
												'website_check_flag'	=> $this->website_check_flag,
												'website_recommend_time'=> $this->website_recommend_time,
												'website_insert_time'	=> new Zend_Db_Expr("UNIX_TIMESTAMP()"),
												'website_insert_ip'		=> get_ip());
		$this->dbObj->i();
		$this->website_id = $this->dbObj->iId();
	}

	/**
	 * @since 2012.03.24
	 * Enter description here ...
	 * 更新
	 */
	public function update()
	{
		$this->checked();

		$this->dbObj->update_fileds	= array(	'website_name'			=> $this->website_name,
												'website_url'			=> $this->website_url,
												'website_check_flag'	=> $this->website_check_flag,
												'website_recommend_time'=> $this->website_recommend_time);
		if(parent::isNeedUpdate($this->dbObj->update_fileds))
		{
			$this->dbObj->where			= array(	"website_id='{$this->website_id}'");
			$this->dbObj->u();
		}
	}

	/**
	 * @since 2012.03.18
	 * Enter description here ...
	 * 删除
	 */
	public function delete()
	{
		$this->dbObj->update_fileds	= array(	'website_del_flag'			=> 'T');
		$this->dbObj->where			= array(	"website_id='{$this->website_id}'");
		try
		{
			$this->dbObj->u();
		}
		catch(DbUpdateException $e)
		{
			throw new DbDeleteException("website_id:{$this->website_id}删除失败");
		}
		catch(Zend_Exception $e)
		{
			throw $e;
		}
	}

	/**
	 * @since 2012.03.24
	 * Enter description here ...
	 * 验证
	 */
	private function checked()
	{
		if(empty($this->website_url)){throw new CheckFailedException('网站url不能为空.');}
		if(empty($this->website_name)){$this->website_name = $this->website_url;}

		$this->website_url	= $this->urlFormart($this->website_url);
		if(date('Y-m-d H:i:s', strtotime($this->website_recommend_time)) == $this->website_recommend_time)
			$this->website_recommend_time = strtotime($this->website_recommend_time);
		else if(empty($this->website_recommend_time))
			$this->website_recommend_time = 0;
	}
}