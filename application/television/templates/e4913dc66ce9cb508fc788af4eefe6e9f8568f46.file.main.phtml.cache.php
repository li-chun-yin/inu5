<?php /* Smarty version Smarty-3.1.8, created on 2012-06-19 16:23:55
         compiled from "/home/www/inu5/application/television/views/layouts/main.phtml" */ ?>
<?php /*%%SmartyHeaderCode:20178156014fe0371b848be2-67233955%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e4913dc66ce9cb508fc788af4eefe6e9f8568f46' => 
    array (
      0 => '/home/www/inu5/application/television/views/layouts/main.phtml',
      1 => 1338191380,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20178156014fe0371b848be2-67233955',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'keywords' => 0,
    'description' => 0,
    'content' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fe0371b89bb66_67042611',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fe0371b89bb66_67042611')) {function content_4fe0371b89bb66_67042611($_smarty_tpl) {?><!DOCTYPE html>
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
	    <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
	        <span class="bds_more">分享到：</span>
	        <a class="bds_qzone"></a>
	        <a class="bds_tsina"></a>
	        <a class="bds_tqq"></a>
	        <a class="bds_renren"></a>
			<a class="shareCount"></a>
	    </div>
	</div>
	<div class="content">
		<div class="center">
		<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['content']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

		</div>
		<div style="clear:both;"></div>
	</div>
	<div class="footer">
	<?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['footer']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

	</div>
</body>
</html><?php }} ?>