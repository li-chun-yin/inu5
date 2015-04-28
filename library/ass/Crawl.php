<?php
class Crawl
{
	public $crawl_files = array();
	public function __construct()
	{
		self::init();
	}

	/**
	 * @since 2012.05.04
	 */
	public function init()
	{
		$this->crawl_files = array(	'letv.com',
									'v933.com',
									'51dy.com'
// 									'44ss.net'
		);
	}

	/**
	 * @since 2012.04.03
	 * Enter description here ...
	 * @param (string)$movie_name
	 * װ��
	 */
	public function load($movie_name)
	{
		//**var return data
		$result = array();
		foreach($this->crawl_files AS $file)
		{
			try
			{
				$result	=	$this->loadByFile($file,$movie_name,TRUE);
				return $result;
			}
			catch(DbCheckException $e)
			{
				//true;
			}
			catch(CrawlFailedException $e)
			{
				continue;
			}
		}
		throw new CrawlNoRecordException("{$movie_name}没有搜索到.");
	}

	public function readRss()
	{
		foreach($this->crawl_files AS $file_name)
		{
			try
			{
				$crawl_path = dirname(__FILE__) . '/crawl';
				$filepath	= "{$crawl_path}/{$file_name}.php";
				if(is_file($filepath))
				{
					$obj	= $this->getCrawlObj($filepath);
					$urls	= $obj->getUrlByRss();
					foreach($urls AS $url)
					{
						sleep(10);
						try
						{
							$this->loadByUrl($url,FALSE);
						}
						catch(DbInsertException $e)
						{
							//已存在
						}
						catch(Zend_Exception $e)
						{
							$this->createErrorLog("RSS抓取错误------文件名：{$file_name},错误描述:{$e->getMessage()}.\n\r");
						}
					}
				}
			}
			catch(CrawlFailedException $e)
			{
				if($e->getMessage() == 'rss_url不能为空')
				{
					//true;
				}
				else
				{
					$this->createErrorLog("RSS抓取错误------文件名：{$file_name},错误描述:{$e->getMessage()}.\n\r");
				}
			}
			catch(Zend_Exception $e)
			{
				$this->createErrorLog("RSS抓取错误------文件名：{$file_name},错误描述:{$e->getMessage()}.\n\r");
			}
		}
	}
	public function loadByFile($file_name,$movie_name,$return=TRUE)
	{
		$result = array();
		/********************************************************************************************************************/
		try
		{
			$crawl_path = dirname(__FILE__) . '/crawl';
			if(is_dir($crawl_path))
			{
				$filepath	= "{$crawl_path}/{$file_name}.php";
				if(is_file($filepath) && $file_name !='TopCrawl.php')
				{
					getObj('Movie_linkObj');
					$obj = $this->getCrawlObj($filepath);
					$data = $obj->search($movie_name);
					foreach($data AS $key=>$item)
					{
						$movie_link				= array();
						if(isset($item['online']))
						{
							array_push($movie_link, array(	'movie_link_url'		=>	$item['online']['movie_link_url'],
															'movie_link_type'		=>	ML_ONLINE,
															'movie_link_check_flag'	=>	'F'));
						}
						else if(isset($item['download']))
						{
							array_push($movie_link, array(	'movie_link_url'		=>	$item['download']['movie_link_url'],
															'movie_link_type'		=>	ML_DOWN,
															'movie_link_check_flag'	=>	'F'));
						}

						$objMovie						= getObj('MovieObj');
						$objMovie['fk_category_code']	= '01';
						$objMovie['movie_name']			= trim($item['movie_name']);
						$objMovie['movie_check_flag']	= 'F';
						$objMovie['movie_list_img_url']	= isset($item['movie_list_img_url'])	? $item['movie_list_img_url']	: '';
						$objMovie['movie_page_img_url']	= isset($item['movie_page_img_url'])	? $item['movie_page_img_url']	: '';
						$objMovie['movie_starring']		= isset($item['movie_starring'])		? $item['movie_starring']		: '';
						$objMovie['movie_director']		= isset($item['movie_director'])		? $item['movie_director']		: '';
						$objMovie['movie_release_date']	= isset($item['movie_release_date'])	? $item['movie_release_date']	: null;
						$objMovie['movie_description']	= isset($item['movie_description'])		? $item['movie_description']	: '';
						$objMovie['movie_link']			= $movie_link;
						$objMovie->insert();
						if($return)
						{
							$objMovie->load($objMovie['movie_id']);
							array_push($result,		array(	'movie_id'				=> $objMovie['movie_id'],
															'fk_category_code'		=> $objMovie['fk_category_code'],
															'movie_name'			=> $objMovie['movie_name'],
															'movie_list_img_url'	=> $objMovie['movie_list_img_url'],
															'movie_page_img_url'	=> $objMovie['movie_page_img_url'],
															'movie_starring'		=> implode(',',$objMovie['movie_starring']),
															'movie_director'		=> implode(',',$objMovie['movie_director']),
															'movie_release_date'	=> $objMovie['movie_release_date'],
															'movie_description'		=> $objMovie['movie_description'],
															'movie_hot'				=> $objMovie['movie_hot'],
															'movie_check_flag'		=> $objMovie['movie_check_flag'],
															'movie_recommend_time'	=> $objMovie['movie_recommend_time'],
															'movie_del_flag'		=> $objMovie['movie_del_flag'],
															'movie_insert_date'		=> substr($objMovie['movie_insert_time'],0,10),
															'movie_insert_ip'		=> $objMovie['movie_insert_ip'],
															'movie_link'			=> $objMovie['movie_link']));
						}
					}
				}
			}
		}
		catch(DbInsertException $e)
		{
			//true
		}
		catch(Zend_Exception $e)
		{
			throw $e;
		}
		/********************************************************************************************************************/
		if($return)
			return $result;
	}

	/**
	 * @since 2012.06.18
	 * Enter description here ...
	 * return【是否有返回data】
	 */
	public function loadByUrl($url,$return=TRUE)
	{
		/********************************************************************************************************************/
		$result		= array();
		/********************************************************************************************************************/
		$crawl_path = dirname(__FILE__) . '/crawl';
		$parse_url	= parse_url($url);
		if(!isset($parse_url['host'])) throw new CrawlFailedException("URL输入错误.{$url}");
		preg_match('@[^\.]+\.[^\.]+$@siU',$parse_url['host'],$hostes);
		$host		= $hostes[0];
		$file_path	= (is_file("{$crawl_path}/{host}.php"))?("{$crawl_path}/{$host}.php"):("{$crawl_path}/".preg_replace('@^www\.@siU','',$host).".php");
		if(is_file($file_path))
		{
			$obj	= $this->getCrawlObj($file_path);
			$data	= $obj->detail($url);

			getObj('Movie_linkObj');
			$movie_link				= array();
			if(isset($data['online']))
			{
				array_push($movie_link, array(	'movie_link_url'		=>	$data['online']['movie_link_url'],
												'movie_link_type'		=>	ML_ONLINE,
												'movie_link_check_flag'	=>	'F'));
			}
			else if(isset($data['download']))
			{
				array_push($movie_link, array(	'movie_link_url'		=>	$data['download']['movie_link_url'],
												'movie_link_type'		=>	ML_DOWN,
												'movie_link_check_flag'	=>	'F'));
			}
			$objMovie						= getObj('MovieObj');
			$objMovie['fk_category_code']	= '01';
			$objMovie['movie_name']			= trim($data['movie_name']);
			$objMovie['movie_check_flag']	= 'F';
			$objMovie['movie_list_img_url']	= isset($data['movie_list_img_url'])	? $data['movie_list_img_url']	: '';
			$objMovie['movie_page_img_url']	= isset($data['movie_page_img_url'])	? $data['movie_page_img_url']	: '';
			$objMovie['movie_starring']		= isset($data['movie_starring'])		? $data['movie_starring']		: '';
			$objMovie['movie_director']		= isset($data['movie_director'])		? $data['movie_director']		: '';
			$objMovie['movie_release_date']	= isset($data['movie_release_date'])	? $data['movie_release_date']	: null;
			$objMovie['movie_description']	= isset($data['movie_description'])		? $data['movie_description']	: '';
			$objMovie['movie_link']			= $movie_link;
			$objMovie->insert();
			if($return)
			{
				$objMovie->load($objMovie['movie_id']);
				$result	=	array(	'movie_id'				=> $objMovie['movie_id'],
									'fk_category_code'		=> $objMovie['fk_category_code'],
									'movie_name'			=> $objMovie['movie_name'],
									'movie_list_img_url'	=> $objMovie['movie_list_img_url'],
									'movie_page_img_url'	=> $objMovie['movie_page_img_url'],
									'movie_starring'		=> $objMovie['movie_starring'],
									'movie_director'		=> $objMovie['movie_director'],
									'movie_release_date'	=> $objMovie['movie_release_date'],
									'movie_description'		=> $objMovie['movie_description'],
									'movie_hot'				=> $objMovie['movie_hot'],
									'movie_check_flag'		=> $objMovie['movie_check_flag'],
									'movie_recommend_time'	=> $objMovie['movie_recommend_time'],
									'movie_del_flag'		=> $objMovie['movie_del_flag'],
									'movie_insert_time'		=> $objMovie['movie_insert_time'],
									'movie_insert_ip'		=> $objMovie['movie_insert_ip'],
									'movie_link'			=> $objMovie['movie_link']	);
			}
		}
		else
		{
			throw new CrawlFailedException("url不支持.{$url}");
		}
		/********************************************************************************************************************/
		if($return)
			return $result;
	}

	public function createErrorLog($str)
	{
		$log_file	= LIB_PATH . '/file/crawl_error_logs';
		/********************************************************************************************************************/
		if($handle = fopen($log_file, "ab"))
		{
			fwrite($handle, $str);
			fclose($handle);
		}
	}

	private function isSetUrl($url)
	{
		$obj = getObj('Movie_linkObj');
		$obj->isSetUrl($url);
	}

	public function getCrawlObj($filepath)
	{
		$filename	= basename($filepath,'.php');
		$filename	= str_replace(	array('.','-'),'_',$filename);
		$filename	= is_numeric($filename[0]) ? "www_{$filename}" : $filename;

		if (!class_exists($filename))
		{
			Zend_Loader::loadFile($filepath,ASS_PATH);
		}
		return new $filename();
	}
}