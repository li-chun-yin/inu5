<?php
require_once(APP_PATH.'intranet/abs/In_controller.php');
require_once(MODEL_PATH.'Etc.php');
class Intranet_SitemapController extends In_controller
{
	function init()
	{
		parent::isLogin();
		header('Content-Type: text/html; charset=utf-8');
	}
	public function indexAction()
	{
		/*************************************************************VAR DATA*****************************************************************/
		$create_string = '';
		/**************************************************************************************************************************************/
		$create_string	.= '<?xml version="1.0" encoding="UTF-8"?>';
		$create_string	.= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

		$mo	=	getModel('Etc');
		$data = $mo->siteMapUrl();
		foreach($data AS $item)
		{
			$create_string .= "<url>
									<loc>{$item['url']}</loc>
									<lastmod>".date('Y-m-d')."</lastmod>
									<changefreq>daily</changefreq>
									<priority>{$item['priority']}</priority>
								</url>";
		}
		$create_string	.= '</urlset>';

		file_put_contents ('sitemap.xml',$create_string);
		echo '重置sitemap成功,具体内容看”http://www.inu5.com/sitemap.xml”';
	}
}