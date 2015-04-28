<?php
require_once(MODEL_PATH.'Movie.php');
class MovieObj extends Abs_obj
{
	protected
		$movie_id				= 0,
		$fk_category_code		= 0,
		$movie_name				= '',
		$movie_list_img_url		= '',
		$movie_page_img_url		= '',
		$movie_starring			= array(),	//以�?”间�?
		$movie_director			= array(),	//以�?”间�?
		$movie_release_date		= null,		//date
		$movie_description		= '',
		$movie_hot				= 0,
		$movie_check_flag		= 'F',
		$movie_recommend_time	= 0,
		$movie_del_flag			= 'F',
		$movie_insert_time		= 0,
		$movie_insert_ip		= 0,
/*************************************************************************************************************************************************************/
		$category_name			= '',
		$movie_link				= array();

	public function __construct($data='')
	{
		parent::__construct();
		$this->dbObj = new Movie();
		if(!empty($data)){$this->init($data);}
	}

	/**
	 * @since 2012.03.25
	 * @see library/top/Abs_obj::init()
	 */
	public function init($data)
	{
		parent::init($data[0]);
		$this->movie_link	= array();
		foreach($data AS $key=>$item)
		{
			$movie_link = getObj('Movie_linkObj');
			$movie_link->init(array($item));
			array_push($this->movie_link,$movie_link);
		}

		self::format();
	}

	private function format()
	{
		$this->movie_recommend_time			= $this->movie_recommend_time ? date('Y-m-d H:i:s',$this->movie_recommend_time) : '';
		$this->movie_insert_time			= $this->movie_insert_time ? date('Y-m-d H:i:s',$this->movie_insert_time) : '';
		$this->movie_insert_ip				= long2ip($this->movie_insert_ip);
		$this->movie_starring				= explode('&',strip_tags($this->movie_starring));
		$this->movie_director				= explode('&',strip_tags($this->movie_director));
		$this->movie_description			= strip_tags($this->movie_description,'<p><a>');
		$this->movie_name					= strip_tags($this->movie_name);
	//	$this->movie_hot					= $this->movie_hot+rand(100,1000);
		$this->movie_release_date			= strtotime($this->movie_release_date) ? $this->movie_release_date : '';
	}

	/**
	 * @since 2012.03.25
	 * Enter description here ...
	 * @param (int)$movie_id
	 * 装载
	 */
	public function load($movie_id)
	{

		$data = $this->dbObj->r($movie_id);
		$this->init($data);
	}

	/**
	 * @since 2012.05.03
	 * Enter description here ...
	 */
	public function hit()
	{
		$this->dbObj->hit($this->movie_id);
	}

	/**
	 * @since 2012.03.25
	 * Enter description here ...
	 * 插入
	 */
	public function insert()
	{
		$this->checked();
		$this->dbObj->insert_fields = array(	'fk_category_code'		=> $this->fk_category_code,
												'movie_name'			=> $this->movie_name,
												'movie_list_img_url'	=> $this->movie_list_img_url,
												'movie_page_img_url'	=> $this->movie_page_img_url,
												'movie_starring'		=> $this->movie_starring,
												'movie_director'		=> $this->movie_director,
												'movie_release_date'	=> $this->movie_release_date,
												'movie_description'		=> $this->movie_description,
												'movie_check_flag'		=> $this->movie_check_flag,
												'movie_recommend_time'	=> $this->movie_recommend_time,
												'movie_insert_time'		=> new Zend_Db_Expr("UNIX_TIMESTAMP()"),
												'movie_insert_ip'		=> get_ip());
		$this->dbObj->getDb()->beginTransaction();
		try
		{
			$this->dbObj->i();
			$this->movie_id = $this->dbObj->iId();
			/****************************MOVIE LINK********************************************/
			$obj_link = getObj('Movie_linkObj');
			foreach($this->movie_link AS $item)
			{
				$obj_link['fk_movie_id']			= $this->movie_id;
				$obj_link['movie_link_url']			= $item['movie_link_url'];
				$obj_link['movie_link_type']		= $item['movie_link_type'];
				$obj_link['movie_link_check_flag']	= $item['movie_link_check_flag'];
				$obj_link->insert();
			}
			/*********************************************************************************/
			$this->dbObj->getDb()->commit();
			/*********************************************************************************/
			$doc 	= array(	'movie_id'				=> $this->movie_id,
								'movie_name'			=> $this->movie_name,
								'movie_list_img_url'	=> $this->movie_list_img_url,
								'movie_director'		=> $this->movie_director,
								'movie_starring'		=> $this->movie_starring,
								'movie_description'		=> $this->movie_description,
								'movie_insert_time'		=> time());
			$so		= getSo('movie');
			$so->insert($doc);
		}
		catch(XSException $e)
		{
			throw new DbInsertException('数据插入失败【xunsearch】'.$e->getMessage());
		}
		catch(Exception $e)
		{
			$this->dbObj->getDb()->rollBack();
			throw new DbInsertException('数据插入失败'.$e->getMessage());
		}
	}

	/**
	 * @since 2012.03.25
	 * Enter description here ...
	 * 更新
	 */
	public function update()
	{
		$this->checked();
		$this->dbObj->update_fileds	= array(	'fk_category_code'		=> $this->fk_category_code,
												'movie_name'			=> $this->movie_name,
												'movie_list_img_url'	=> $this->movie_list_img_url,
												'movie_page_img_url'	=> $this->movie_page_img_url,
												'movie_starring'		=> $this->movie_starring,
												'movie_director'		=> $this->movie_director,
												'movie_release_date'	=> $this->movie_release_date,
												'movie_description'		=> $this->movie_description,
												'movie_hot'				=> $this->movie_hot,
												'movie_check_flag'		=> $this->movie_check_flag,
												'movie_recommend_time'	=> $this->movie_recommend_time);

		$this->dbObj->getDb()->beginTransaction();
		try
		{	if(parent::isNeedUpdate($this->dbObj->update_fileds))
			{
				$this->dbObj->where			= array(	"movie_id='{$this->movie_id}'");
				$this->dbObj->u();
			}
			/****************************MOVIE LINK********************************************/
			foreach($this->movie_link AS $item)
			{
				$obj_link = getObj('Movie_linkObj');
				if(!empty($item['movie_link_id']))
				{
					$obj_link->load($item['movie_link_id']);
					$obj_link['movie_link_url']			= $item['movie_link_url'];
					if($obj_link['movie_link_url'])	{$obj_link->update();}
					else							{$obj_link->delete();}
				}
				else
				{
					$obj_link['fk_movie_id']			= $this->movie_id;
					$obj_link['movie_link_url']			= $item['movie_link_url'];
					$obj_link['movie_link_type']		= $item['movie_link_type'];
					$obj_link['movie_link_check_flag']	= $item['movie_link_check_flag'];
					$obj_link->insert();
				}
			}
			/*********************************************************************************/
			$this->dbObj->getDb()->commit();
			/*********************************************************************************/
			$doc 	= array(	'movie_id'				=> $this->movie_id,
								'movie_name'			=> $this->movie_name,
								'movie_list_img_url'	=> $this->movie_list_img_url,
								'movie_director'		=> $this->movie_director,
								'movie_starring'		=> $this->movie_starring,
								'movie_description'		=> $this->movie_description,
								'movie_insert_time'		=> time());
			$so		= getSo('movie');
			$so->update($doc);
		}
		catch(XSException $e)
		{
			throw new DbUpdateException('数据更新失败【xunsearch】'.$e->getMessage());
		}
		catch(Exception $e)
		{
			$this->dbObj->getDb()->rollBack();
			throw new DbUpdateException('数据更新失败'.$e->getMessage());
		}
	}

	/**
	 * @since 2012.03.25
	 * Enter description here ...
	 * 删除
	 */
	public function delete()
	{
		$this->dbObj->update_fileds	= array(	'movie_del_flag'			=> 'T');
		$this->dbObj->where			= array(	"movie_id='{$this->movie_id}'");
		try
		{
			$this->dbObj->u();
			$so		= getSo('movie');
			/*********************************************************************************/
			$so->delete($this->movie_id);
		}
		catch(XSException $e)
		{
			throw new DbDeleteException('数据删除失败【xunsearch】'.$e->getMessage());
		}
		catch(DbUpdateException $e)
		{
			throw new DbDeleteException("movie_id:{$this->movie_id}删除失败");
		}
		catch(Zend_Exception $e)
		{
			throw $e;
		}
	}

	/**
	 * @since 2012.03.25
	 * Enter description here ...
	 * 验证
	 */
	private function checked()
	{
		if(empty($this->fk_category_code)){throw new CheckFailedException('fk_category_code不能为空.');}
		if(empty($this->movie_name)){throw new CheckFailedException('movie_name不能为空.');}
		if(date('Y-m-d', strtotime($this->movie_release_date)) != $this->movie_release_date){$this->movie_release_date = null;}
		if(date('Y-m-d H:i:s', strtotime($this->movie_recommend_time)) == $this->movie_recommend_time)
			$this->movie_recommend_time = strtotime($this->movie_recommend_time);
		else if(empty($this->movie_recommend_time))
			$this->movie_recommend_time=0;

		if(is_array($this->movie_starring)){$this->movie_starring = implode('&',$this->movie_starring);}
		if(is_array($this->movie_director)){$this->movie_director = implode('&',$this->movie_director);}

		$this->movie_list_img_url	= $this->urlFormart($this->movie_list_img_url);
		$this->movie_page_img_url	= $this->urlFormart($this->movie_page_img_url);
	}
}