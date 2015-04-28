<?php
function fb($data)
{
	$writer = new Zend_Log_Writer_Firebug();
	$logger = new Zend_Log($writer);
	// Use this in your model, view and controller files
	$logger->log($data, Zend_Log::INFO);
}

function get_ip()
{
	if(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR']>0)
	{
		$ip = sprintf("%u",ip2long($_SERVER['REMOTE_ADDR']));
	}
	else
	{
		$ip = ip2long('127.0.0.1');
	}
	return $ip;
}

/**
 * 过滤html文本内容。
 * 删除html标记，只保留默认只保留<p>标记
 * @param $html
 */
//function resetHtml($html)
//{
//
//}

/**
 * @2012.03.28
 * Enter description here ...
 * @param (string) $object
 */
function getObj($object)
{
	if (!class_exists($object))
	{
		Zend_Loader::loadFile("{$object}.php",OBJ_PATH);
	}
	return new $object();
}

/**
 * @2012.04.01
 * Enter description here ...
 * @param (string) $object
 */
function getAss($object)
{
	if (!class_exists($object))
	{
		Zend_Loader::loadFile("{$object}.php",ASS_PATH);
	}
	return new $object();
}

/**
 * @2012.04.04
 * Enter description here ...
 * @param (string) $object
 */
function getModel($object)
{
	if (!class_exists($object))
	{
		Zend_Loader::loadFile("{$object}.php",MODEL_PATH);
	}
	return new $object();
}

function getSo($project)
{
	if (!class_exists('So'))
	{
		Zend_Loader::loadFile("So.php",SO_PATH);
	}
	return new So($project);
}