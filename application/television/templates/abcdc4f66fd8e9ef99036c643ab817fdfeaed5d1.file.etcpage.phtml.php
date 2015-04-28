<?php /* Smarty version Smarty-3.1.8, created on 2012-07-13 16:47:07
         compiled from "/home/www/inu5/application/television/views/layouts/etcpage.phtml" */ ?>
<?php /*%%SmartyHeaderCode:12849218054fffe08b3ff755-29838444%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'abcdc4f66fd8e9ef99036c643ab817fdfeaed5d1' => 
    array (
      0 => '/home/www/inu5/application/television/views/layouts/etcpage.phtml',
      1 => 1338191380,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12849218054fffe08b3ff755-29838444',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'keywords' => 0,
    'description' => 0,
    'etc_header' => 0,
    'content' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fffe08b44e8c1_82302441',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fffe08b44e8c1_82302441')) {function content_4fffe08b44e8c1_82302441($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<meta name="baidu-site-verification" content="C9QKZT69wSVKSrnH" />
	<meta name="chinaz-site-verification" content="8b77bc1c-97ea-44d5-bc83-e3a2c68fa312" />
	<meta name="google-site-verification" content="CCbVahem7Ve83OKF1aWYXSYAXzBCvQ1ifNX55tiUlJ0" />
	<meta name="robots" content="index,follow">
	<meta name="googlebot" content="index,follow">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
	<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
" />
	<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['description']->value;?>
" />
	<link rel="shortcut icon" href="/favicon.ico" />
	<link href="/css/television/default.css" rel="stylesheet" type="text/css" />
	<script src="/js/jquery/jquery.js"></script>
	<script src="/js/television/default.js"></script>
</head>
<body>
	<div class="header">
		<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['etc_header']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
	<div class="content">
		<div class="center">
			<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['content']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		</div>
		<div style="clear:both;"></div>
	</div>
	<div class="footer">
		<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
</body>
</html>
<?php }} ?>