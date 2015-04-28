<?php
/**
 * Smarty plugin
 * @2012.05.20
 */

function smarty_function_pagebar($params, $template)
{
	$result			= '';
	$total_page		= ceil($params['total']/$params['list_size']);
	$page_size		= $params['page_size'];
	$current_page	= $params['current'];
	$style			= isset($params['style'])	? $params['style'] : 'default';
	$hafe_page		= ceil($page_size/2);

	if($total_page < $page_size)$page_size	= $total_page;

	$result	.='<ul class="pagebar">';
	$result	.='<li class="first">First</li>';
	$result	.='<li class="prev">Prev</li>';

	if( $current_page <=$hafe_page )
	{
		for( $i=1; $i<=$page_size;$i++ )
		{
			if($i == $current_page )
			{
				$result.='<li class="active">'.$i.'</li>';
			}
			else
			{
				$result.='<li>'.$i.'</li>';
			}
		}
	}
	else if( $current_page )
	{
		for( $i=1; $i<=$page_size && ($i+$current_page-$hafe_page)<=$total_page; $i++)
		{
				if( ( $i+$current_page-$hafe_page ) == $current_page )
				{
					$result.='<li class="active">'.( $i+$current_page-$hafe_page ).'</li>';
				}
				else
				{
					$result.='<li>'.( $i+$current_page-$hafe_page ).'</li>';
				}
		}
	}
	$result	.='<li class="next">Next</li>';
	$result	.='<li class="last" page="'.$total_page.'">Last</li>';
	$result .='</ul>';

	$result .= '<link href="http://'.$_SERVER['HTTP_HOST'].'/plugins/pagebar/'.$style.'/pagebar.css" rel="stylesheet" type="text/css" />';
	$result .= '<script src="http://'.$_SERVER['HTTP_HOST'].'/plugins/pagebar/'.$style.'/pagebar.js" type="text/javascript"></script>';
	return $result;
}
?>