<?php
require_once(MODEL_PATH.'Crawl_site.php');
class Crawl_siteObj extends Abs_obj
{
	protected
		$crawl_site_id			= 0,
		$fk_website_id			= 0,
		$crawl_site_qq			= '',
		$crawl_site_msn			= '',
		$crawl_site_email		= '',
		$crawl_site_phone		= '',
		$crawl_site_insert_time	= 0,
		$crawl_site_insert_ip	= 0;

	public function __construct($data='')
	{
		parent::__construct();
		$this->dbObj = new Crawl_site();
		if(!empty($data)){$this->init($data);}
	}

	/**
	 * @since 2012.05.14
	 * Enter description here ...
	 */
	private function format()
	{
		$this->crawl_site_insert_time	= $this->crawl_site_insert_time ? date('Y-m-d H:i:s',$this->movie_link_insert_time) : '';
		$this->crawl_site_insert_ip		= long2ip($this->crawl_site_insert_ip);
	}
	/**
	 * @since 2012.05.14
	 * @see library/top/Abs_obj::init()
	 */
	public function init($data)
	{
		parent::init($data[0]);
	}

	/**
	 * @since 2012.05.14
	 * 装载
	 */
	public function load($crawl_site_id)
	{
		$data = $this->dbObj->r($crawl_site_id);
		$this->init($data);
	}

	/**
	 * @since 2012.05.14
	 * Enter description here ...
	 * 插入
	 */
	public function insert()
	{
		$this->checked();

		$this->dbObj->insert_fields = array(	'fk_website_id'			=> $this->fk_website_id,
												'crawl_site_qq'			=> $this->crawl_site_qq,
												'crawl_site_msn'		=> $this->crawl_site_msn,
												'crawl_site_email'		=> $this->crawl_site_email,
												'crawl_site_phone'		=> $this->crawl_site_phone,
												'crawl_site_insert_time'=> new Zend_Db_Expr("UNIX_TIMESTAMP()"),
												'crawl_site_insert_ip'	=> get_ip());
		$this->dbObj->i();

		$this->crawl_site_id = $this->dbObj->iId();
	}

	/**
	 * @since 2012.05.14
	 * Enter description here ...
	 * 更新
	 */
	public function update()
	{
		$this->checked();

		$this->dbObj->update_fileds	= array(	'crawl_site_qq'			=> $this->crawl_site_qq,
												'crawl_site_msn'		=> $this->crawl_site_msn,
												'crawl_site_email'		=> $this->crawl_site_email,
												'crawl_site_phone'		=> $this->crawl_site_phone);
		if(parent::isNeedUpdate($this->dbObj->update_fileds))
		{
			$this->dbObj->where			= array(	"crawl_site_id='{$this->crawl_site_id}'");
			$this->dbObj->u();
		}
	}

	/**
	 * @since 2012.05.14
	 * Enter description here ...
	 * 删除
	 */
	public function delete()
	{
		$this->dbObj->where			= array(	"crawl_site_id='{$this->crawl_site_id}'");
		$this->dbObj->d();
	}

	/**
	 * @since 2012.05.14
	 * Enter description here ...
	 * 验证
	 */
	private function checked()
	{
		if(empty($this->fk_website_id)){throw new CheckFailedException('fk_website_id不能为空.');}
	}
}