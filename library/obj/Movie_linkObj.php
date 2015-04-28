<?php
require_once(MODEL_PATH.'Movie_link.php');
class Movie_linkObj extends Abs_obj
{
	protected
		$movie_link_id			= 0,
		$fk_movie_id			= 0,
		$fk_website_id			= 0,
		$movie_link_url			= '',
		$movie_link_type		= ML_ONLINE,
		$movie_link_check_flag	= 'F',
		$movie_link_hot			= 0,
		$movie_link_insert_time	= 0,
		$movie_link_insert_ip	=0;

	public function __construct($data='')
	{
		parent::__construct();
		$this->dbObj = new Movie_link();
		if(!empty($data)){$this->init($data);}
	}

	/**
	 * @since 2012.03.25
	 * Enter description here ...
	 */
	private function format()
	{
		$this->movie_link_insert_time	= $this->movie_link_insert_time ? date('Y-m-d H:i:s',$this->movie_link_insert_time) : '';
		$this->movie_link_insert_ip		= long2ip($this->movie_link_insert_ip);
	}
	/**
	 * @since 2012.03.25
	 * @see library/top/Abs_obj::init()
	 */
	public function init($data)
	{
		parent::init($data[0]);
	}

	/**
	 * @since 2012.03.25
	 * Enter description here ...
	 * @param $category_id
	 * 装载
	 */
	public function load($movie_link_id)
	{
		$data = $this->dbObj->r($movie_link_id);
		$this->init($data);
	}

	public function isSetUrl($movie_link_url)
	{
		$this->dbObj->isSetUrl($movie_link_url);
	}

	/**
	 * @since 2012.03.25
	 * Enter description here ...
	 * 插入
	 */
	public function insert()
	{
		$this->checked();
		$this->isSetUrl($this->movie_link_url);

		$this->dbObj->insert_fields = array(	'fk_movie_id'			=> $this->fk_movie_id,
												'fk_website_id'			=> $this->fk_website_id,
												'movie_link_url'		=> $this->movie_link_url,
												'movie_link_type'		=> $this->movie_link_type,
												'movie_link_check_flag'	=> $this->movie_link_check_flag,
												'movie_link_insert_time'=> new Zend_Db_Expr("UNIX_TIMESTAMP()"),
												'movie_link_insert_ip'	=> get_ip());
		$this->dbObj->i();
		$this->movie_link_id = $this->dbObj->iId();
	}

	/**
	 * @since 2012.03.18
	 * Enter description here ...
	 * 更新
	 */
	public function update()
	{
		$this->checked();

		$this->dbObj->update_fileds	= array(	'fk_movie_id'			=> $this->fk_movie_id,
												'movie_link_check_flag'	=> $this->movie_link_check_flag,
												'movie_link_url'		=> $this->movie_link_url,
												'movie_link_type'		=> $this->movie_link_type);
		if(parent::isNeedUpdate($this->dbObj->update_fileds))
		{
			$this->dbObj->where			= array(	"movie_link_id='{$this->movie_link_id}'");
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
		$this->dbObj->where			= array(	"movie_link_id='{$this->movie_link_id}'");
		$this->dbObj->d();
	}

	/**
	 * @since 2012.03.18
	 * Enter description here ...
	 * 验证
	 */
	private function checked()
	{
		if(empty($this->fk_movie_id)){throw new CheckFailedException('fk_movie_id不能为空.');}

		if(empty($this->movie_link_url)){throw new CheckFailedException('movie_link_url不能为空.');}

		$this->movie_link_url = $this->urlFormart($this->movie_link_url);

		if(empty($this->fk_website_id))
		{
			try
			{
				$parse = parse_url("http://{$this->movie_link_url}");

				if (!class_exists("WebsiteObj"))
				{
					Zend_Loader::loadFile("WebsiteObj.php",OBJ_PATH);
				}
				$website = new WebsiteObj();
				$website->loadByUrl($parse['host']);
				$this->fk_website_id = $website['website_id'];
			}
			catch(NoRecordException $e)
			{
				$website = new WebsiteObj();
				$website['website_name']	= $parse['host'];
				$website['website_url']		= $parse['host'];
				$website->insert();
				$this->fk_website_id = $website['website_id'];
			}
		}
	}
}