<?php
require_once(MODEL_PATH.'Category.php');
class CategoryObj extends Abs_obj
{
	protected
		$dbObj				= null,
		$category_id		= 0,
		$category_code		= '',
		$category_type		= CT_TELEVISION,
		$category_name		= '',
		$category_use_flag	= 'T';

	public function __construct($data='')
	{
		parent::__construct();
		$this->dbObj = new Category();
		if(!empty($data)){$this->init($data);}
	}

	/**
	 * @since 2012.03.18
	 * @see library/top/Abs_obj::init()
	 */
	public function init($data)
	{
		parent::init($data[0]);
	}

	/**
	 * @since 2012.03.18
	 * Enter description here ...
	 * @param $category_id
	 * 装载
	 */
	public function load($category_id)
	{
		$data = $this->dbObj->r($category_id);
		$this->init($data);
	}

	/**
	 * @since 2012.04.01
	 * Enter description here ...
	 * @param $category_code
	 */
	public function getName($category_code)
	{
		return $this->dbObj->getName($category_code);
	}

	/**
	 * @since 2012.03.18
	 * Enter description here ...
	 * 插入
	 */
	public function insert($parent_category_code)
	{
		$this->checked();

		$this->category_code = $this->mkCategoryCode($parent_category_code);

		$this->dbObj->insert_fields = array(	'category_name'			=> $this->category_name,
												'category_code'			=> $this->category_code,
												'category_type'			=> $this->category_type,
												'category_use_flag'		=> $this->category_use_flag);
		$this->dbObj->i();
		$this->category_id = $this->dbObj->iId();
	}

	/**
	 * @since 2012.03.18
	 * Enter description here ...
	 * 更新
	 */
	public function update()
	{
		$this->checked();

		$this->dbObj->update_fileds	= array(	'category_name'			=> $this->category_name,
												'category_use_flag'		=> $this->category_use_flag);
		if(parent::isNeedUpdate($this->dbObj->update_fileds))
		{
			$this->dbObj->where			= array(	"category_id='{$this->category_id}'");
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
		$this->dbObj->where			= array(	"category_id='{$this->category_id}'");
		$this->dbObj->d();
	}

	/**
	 * @since 2012.03.18
	 * Enter description here ...
	 * 验证
	 */
	private function checked()
	{
		if(empty($this->category_name)){throw new CheckFailedException('分类名不能为空.');}
	}

	/**
	 *
	 * Enter description here ...
	 * @param (string) $parent_category_code
	 */
	private function mkCategoryCode($parent_category_code=0)
	{
		/**********************VAR DATA****************************/
		$where = array("`category_type`='{$this->category_type}'");
		($parent_category_code== 0)? array_push($where,"LENGTH(`category_code`)='2'"):array_push($where,"`category_code` LIKE '{$parent_category_code}___'");
		$data = array();

		/*********************************************************/
		try {
			$this->dbObj->select_fields	= array("MAX(`category_code`) AS `category_code`");
			$this->dbObj->where			= array_merge($this->dbObj->where,$where);
			$data = $this->dbObj->s();
		}catch(Zend_Exception $e){
			true;
		}

		/**********************RESULT*****************************/
		if($data[0]['category_code'] == '')
		{
			if($parent_category_code==0)
			{
				return '01';
			}else {
				return $parent_category_code.'001';
			}
		}else{
			if(strpos('0',$data[0]['category_code']) == 0)
			{
				$code = ++$data[0]['category_code'];
				if($code<10)
				{
					return "0{$code}";
				}else{
					return $code;
				}
			}else{
				return ++$data[0]['category_code'];
			}
		}
	}
}