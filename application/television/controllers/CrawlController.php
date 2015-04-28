<?php
require_once(APP_PATH.'television/abs/In_controller.php');
class Television_CrawlController extends In_controller
{
	public function init()
	{
		parent::init();
	}

	public function indexAction()
	{
		/**********************************************POST DATA****************************************************/
		$movie_name			= rawurldecode((string)$this->_getParam('s_inu5_movie_name'));
		$movie_img_url		= rawurldecode((string)$this->_getParam('s_inu5_movie_img_url'));
		$movie_starring		= rawurldecode((string)$this->_getParam('s_inu5_movie_starring'));
		$movie_director		= rawurldecode((string)$this->_getParam('s_inu5_movie_director'));
		$movie_release_date	= rawurldecode((string)$this->_getParam('s_inu5_movie_release_date'));
		$fk_category_code	= rawurldecode((string)$this->_getParam('s_inu5_fk_category_code'));
		$movie_link			= rawurldecode((string)$this->_getParam('s_inu5_movie_link'));
		$movie_link_type	= rawurldecode((string)$this->_getParam('s_inu5_movie_link_type'));
		$movie_description	= rawurldecode((string)$this->_getParam('s_inu5_movie_description'));
		$movie_area			= rawurldecode((string)$this->_getParam('s_inu5_movie_area'));
		$movie_language		= rawurldecode((string)$this->_getParam('s_inu5_movie_language'));
		/***********************************************************************************************************/

		try
		{
			$movie_link_obj = getObj('Movie_linkObj');
			$movie_link_obj->isSetUrl($movie_link);

			$movie_online_link	=	array();
			$movie_download_link	=	array();
			if($movie_link_type != ML_DOWN)
			{
				array_push($movie_online_link, array(	'movie_link_url'		=>	$movie_link,
														'movie_link_check_flag'	=>	'F'));
			}
			else
			{
				array_push($movie_download_link, array(	'movie_link_url'		=>	$movie_link,
														'movie_link_check_flag'	=>	'F'));
			}

			$obj = getObj('MovieObj');
			$obj['fk_category_code']	= $fk_category_code;
			$obj['movie_name']			= $movie_name;
			$obj['movie_check_flag']	= 'F';
			$obj['movie_list_img_url']	= $movie_img_url;
			$obj['movie_page_img_url']	= $movie_img_url;
			$obj['movie_starring']		= $movie_starring;
			$obj['movie_director']		= $movie_director;
			$obj['movie_release_date']	= $movie_release_date;
			$obj['movie_description']	= $movie_description;
			$obj['movie_area']			= $movie_area;
			$obj['movie_language']		= $movie_language;
			$obj['movie_online_link']	= $movie_online_link;
			$obj['movie_download_link']	= $movie_download_link;

			$obj->insert();
			exit;
		}
		catch(DbCheckException $e)
		{
			exit;
		}
		catch(Exception $e)
		{
			$error_data		= 	"movie_name={$movie_name},movie_img_url={$movie_img_url},movie_starring={$movie_starring},movie_director={$movie_director},".
								"movie_release_date={$movie_release_date},fk_category_code={$fk_category_code},movie_link={$movie_link},".
								"movie_link_type={$movie_link_type},movie_description={$movie_description},movie_area={$movie_area},movie_language={$movie_language}";
			$error_string	= "Error:日期（" . date('Y-m-d H:i:s') . "）		DATA=("{$error_data}")		MESSAGE=" . $e->getMessage() . "\r\n";

			$fab	= fopen(LIB_PATH.'/file/crawl_error_logs','ab');
			fwrite($fab, $error_string);
			fclose($fab);
			exit;
		}
		/***********************************************************************************************************/
	}

	public function joinCrawlSiteAction()
	{
		/**********************POST DATA*************************************/
		$website_name		= (string)$this->_getParam('website_name');
		$website_url		= (string)$this->_getParam('website_url');
		$crawl_site_qq		= (string)$this->_getParam('crawl_site_qq');
		$crawl_site_msn		= (string)$this->_getParam('crawl_site_msn');
		$crawl_site_email	= (string)$this->_getParam('crawl_site_email');
		$crawl_site_phone	= (string)$this->_getParam('crawl_site_phone');
		/************************RESUTL**********************************/
		try
		{
			$website				= getObj('WebsiteObj');
			$website['website_name']= $website_name;
			$website['website_url']	= $website_url;
			$website->insert();

			$crawl_site						= getObj('Crawl_siteObj');
			$crawl_site['fk_website_id']	= $website['website_id'];
			$crawl_site['crawl_site_qq']	= $crawl_site_qq;
			$crawl_site['crawl_site_msn']	= $crawl_site_msn;
			$crawl_site['crawl_site_email']	= $crawl_site_email;
			$crawl_site['crawl_site_phone']	= $crawl_site_phone;
			$crawl_site->insert();
		}
		catch(Zend_Exception $e)
		{
			echo $e->getMessage();exit;
			parent::msg('对不起，系统有异常，请联系QQ：787211820');
		}

		parent::toBack('提交成功,谢谢您合作！');
	}
}