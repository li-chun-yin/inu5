<?php /* Smarty version Smarty-3.1.8, created on 2012-07-13 16:47:03
         compiled from "/home/www/inu5/application/television/views/scripts/movie/detail.phtml" */ ?>
<?php /*%%SmartyHeaderCode:7145020694fffe087c26c24-25870196%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36bb752ddce48dd5b87b2048f54ffbe8a14e798d' => 
    array (
      0 => '/home/www/inu5/application/television/views/scripts/movie/detail.phtml',
      1 => 1341367652,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7145020694fffe087c26c24-25870196',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'item' => 0,
    'key' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fffe087c81dd3_75228029',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fffe087c81dd3_75228029')) {function content_4fffe087c81dd3_75228029($_smarty_tpl) {?><link href="/css/television/movie/detail.css" rel="stylesheet" type="text/css" />
<!-- *************************************************************************************************************** -->
<div id="movie_info">
	<img src="http://<?php echo $_smarty_tpl->tpl_vars['data']->value['movie_list_img_url'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['data']->value['movie_name'];?>
" align="left"  onerror="this.src='/images/nopic.gif'"/>
	<ul>
		<li><strong>影片名： </strong> <h1><?php echo $_smarty_tpl->tpl_vars['data']->value['movie_name'];?>
</h1></li>
		<li><strong>主 演： </strong> <span><?php echo $_smarty_tpl->tpl_vars['data']->value['movie_starring'];?>
</span></li>
		<li><strong>导 演： </strong> <span><?php echo $_smarty_tpl->tpl_vars['data']->value['movie_director'];?>
</span></li>
		<li><strong>上映日期： </strong> <span><?php echo $_smarty_tpl->tpl_vars['data']->value['movie_release_date'];?>
</span></li>
		<li><strong>浏览次数： </strong> <span><?php echo $_smarty_tpl->tpl_vars['data']->value['movie_hot'];?>
</span></li>
		<li><strong>是否验证： </strong> <span><?php echo $_smarty_tpl->tpl_vars['data']->value['movie_ischeck'];?>
</span> <span class="red">(未通过验证的影片，可能存在病毒或者,无法正常观看。)</span></li>
		<li>
			<!-- Baidu Button BEGIN -->
		    <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
		        <span class="bds_more">分享到：</span>
		        <a class="bds_qzone">QQ空间</a>
		        <a class="bds_tsina">新浪微博</a>
		        <a class="bds_tqq">腾讯微博</a>
		        <a class="bds_renren">人人网</a>
		        <a class="bds_msn">MSN</a>
		    </div>
			<!-- Baidu Button END -->
		</li>
	</ul>
</div>
<div id="movie_link">
	<?php if (count($_smarty_tpl->tpl_vars['data']->value['movie_online_link'])>0){?>
	<h1><?php echo $_smarty_tpl->tpl_vars['data']->value['movie_name'];?>
 在线观看URL</h1>
	<ul>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['movie_online_link']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
		<li><a href="http://<?php echo $_smarty_tpl->tpl_vars['item']->value['movie_link_url'];?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['data']->value['movie_name'];?>
">地址<?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</a></li>
	<?php } ?>
	</ul>
	<?php }?>

	<?php if (count($_smarty_tpl->tpl_vars['data']->value['movie_download_link'])>0){?>
	<h1 class="top_border"><?php echo $_smarty_tpl->tpl_vars['data']->value['movie_name'];?>
 下载资源URL</h1>
	<ul>
	<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value['movie_online_link']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
		<li><a href="http://<?php echo $_smarty_tpl->tpl_vars['item']->value['movie_link_url'];?>
" target="_blank" title="<?php echo $_smarty_tpl->tpl_vars['data']->value['movie_name'];?>
">下载<?php echo $_smarty_tpl->tpl_vars['key']->value+1;?>
</a></li>
	<?php } ?>
	</ul>
	<?php }?>
	<div style="clear:both;"></div>
</div>
<?php if ($_smarty_tpl->tpl_vars['data']->value['movie_description']){?>
<div id="movie_detail">
	<h1><?php echo $_smarty_tpl->tpl_vars['data']->value['movie_name'];?>
 影片介绍</h1>
	<div class="detail">
		<?php echo $_smarty_tpl->tpl_vars['data']->value['movie_description'];?>

	</div>
</div>
<?php }?>
<!-- pintlun BEGIN -->
<script type='text/javascript' charset='utf-8' src='http://open.denglu.cc/connect/commentcode?appid=46895denQgK0uBbbyMhOi0mjSeV1O5&postid=<?php echo $_smarty_tpl->tpl_vars['data']->value['movie_id'];?>
'></script>
<!-- pinglun END --><?php }} ?>