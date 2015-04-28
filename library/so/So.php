<?php
require_once XS_PATH .'sdk/php/lib/XS.php';
class So implements ArrayAccess
{
	private		$_so;
	public 		$limit_s		= 0,
				$limit_c		= 10;

	protected	$lists			= array(),	//结果列表，关键字被<em>标记
				$total			= 0,		//总数近似值
				$related_words	= array(),	//相关关键词
				$corrected_words= array(),	//关键词纠错
				$search_time	= 0;		//搜索进行的时间 秒为单位
	function __construct($project)
	{
		$this->_so	= new XS($project);
	}

	public function init()
	{
	}

	/**
	 *
	 * Enter description here ...
	 *	平滑重建索引
	 *	$index->beginRebuild();
	 *	$index->endRebuild();
	 *
	 *	索引缓冲区
	 *	$index->openBuffer();
	 *	$index->closeBuffer();
	 */
	public function getIndex()
	{
		return $this->_so->index;
	}

	public function getExpandedWords($search_word,$size=10)
	{
		return $this->_so->search->getExpandedQuery($search_word,$size);
	}

	public function load($search_word,$fuzzy=FALSE)
	{
		$start_time	= microtime(TRUE);

		$search = $this->_so->search;
		//$search->setQuery($search_word);
		$search->setLimit($this->limit_c,$this->limit_s);
		$search->setFuzzy($fuzzy);
		$data	=$search->setFuzzy()->search($search_word);
		foreach($data AS $key=>$item)
		{
			list($name,$value) = each($item);
			$this->lists[]	= $search->highlight($value);
		}
		$this->related_words	= $search->getRelatedQuery($search_word);
		$this->total			= $search->Count($search_word);

		if($this->total	== 0)
		{
			$this->corrected_words	= $search->getCorrectedQuery($search_word);
		}

		$end_time	= microtime(TRUE);

		$this->search_time	= $end_time - $start_time;
	}

	public function insert($data = array())
	{
		// 创建文档对象
		$doc = new XSDocument;
		$doc->setFields($data);

		// 添加到索引数据库中
		$this->_so->index->add($doc);
	}

	public function update($data = array())
	{
		// 创建文档对象
		$doc = new XSDocument;
		$doc->setFields($data);

		// 添加到索引数据库中
		$this->_so->index->update($doc);
	}

	public function delete($data)
	{
		$this->_so->index->del($data);
//		$index->del('123');  // 删除主键值为 123 的记录
//		$index->del(array('123', '789', '456')); // 同时删除主键值为 123, 789, 456 的记录
//		$index->del('abc', 'subject'); // 删除字段 subject 上带有索引词 abc 的所有记录
//		$index->del(array('abc', 'def'), 'subject'); // 删除字段 subject 上带有索引词 abc 或 def 的所有记录
	}

    public function offsetSet($offset, $value) {
            $this->$offset = $value;
    }
    public function offsetExists($offset) {
        return isset($this->$offset);
    }
    public function offsetUnset($offset) {
        unset($this->$offset);
    }
    public function offsetGet($offset) {
        return isset($this->$offset) ? $this->$offset : null;
    }
}