<?php /* Smarty version Smarty-3.1.8, created on 2012-06-19 16:23:55
         compiled from "/home/www/inu5/application/television/views/scripts/index.phtml" */ ?>
<?php /*%%SmartyHeaderCode:1192574394fe0371b89f292-81617502%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3a853a8880aba8d51374b03919544ca3a30ce9c' => 
    array (
      0 => '/home/www/inu5/application/television/views/scripts/index.phtml',
      1 => 1339655030,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1192574394fe0371b89f292-81617502',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'recommend_movie' => 0,
    'key' => 0,
    'item' => 0,
    'recommend_website' => 0,
    'hot_movie' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fe0371b91fee5_09520533',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fe0371b91fee5_09520533')) {function content_4fe0371b91fee5_09520533($_smarty_tpl) {?><link href="/css/television/index.css" rel="stylesheet" type="text/css" />
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------ -->
<div class="recommend_today">
	<div class="action_bar_background"></div>
	<div id="action_bar">
		<a id="action_prev" onmouseover="$(this).addClass('hover')" onmouseout="$(this).removeClass('hover')"></a>
		<div class="action_content">
			<ul>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['recommend_movie']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
				<li <?php if ($_smarty_tpl->tpl_vars['key']->value==8){?>class="zoom"<?php }?> data_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['movie_id'];?>
"><img data="http://<?php echo $_smarty_tpl->tpl_vars['item']->value['movie_list_img_url'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['movie_name'];?>
" onerror="this.src='/images/nopic.gif'"/></li>
<?php } ?>
			</ul>
		</div>
		<a id="action_next" onmouseover="$(this).addClass('hover')" onmouseout="$(this).removeClass('hover')"></a>
	</div>
	<div class="recommend_movie_detail" id="recommend_movie_detail">
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['recommend_movie']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
		<div class="detail<?php if ($_smarty_tpl->tpl_vars['key']->value==8){?> action<?php }?>" data_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['movie_id'];?>
">
			<div class="left">
				<a href="/movie_detail_id_<?php echo $_smarty_tpl->tpl_vars['item']->value['movie_id'];?>
.html" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['movie_name'];?>
">
					<img data="http://<?php echo $_smarty_tpl->tpl_vars['item']->value['movie_list_img_url'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['movie_name'];?>
" onerror="this.src='/images/nopic.gif'"/>
				</a>
			</div>
			<div class="right">
				<h1><a href="/movie_detail_id_<?php echo $_smarty_tpl->tpl_vars['item']->value['movie_id'];?>
.html" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['movie_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['movie_name'];?>
</a></h1>
				<?php if ($_smarty_tpl->tpl_vars['item']->value['movie_starring']){?><p class="starring"><strong> 主演：<?php echo $_smarty_tpl->tpl_vars['item']->value['movie_starring'];?>
</strong></p><?php }?>
				<?php if ($_smarty_tpl->tpl_vars['item']->value['movie_director']){?><p class="director"><strong> 导演：<?php echo $_smarty_tpl->tpl_vars['item']->value['movie_director'];?>
</strong></p><?php }?>
				<?php if ($_smarty_tpl->tpl_vars['item']->value['movie_release_date']){?><p class="release_date"><strong> 上映日期：<?php echo $_smarty_tpl->tpl_vars['item']->value['movie_release_date'];?>
</strong></p><?php }?>
				<?php if ($_smarty_tpl->tpl_vars['item']->value['movie_hot']){?><p class="hot"><strong> 浏览次数：<?php echo $_smarty_tpl->tpl_vars['item']->value['movie_hot'];?>
</strong></p><?php }?>
				<?php if ($_smarty_tpl->tpl_vars['item']->value['movie_description']){?><p class="description"><?php echo $_smarty_tpl->tpl_vars['item']->value['movie_description'];?>
</p><?php }?>
			</div>
		</div>
<?php } ?>
	</div>
</div>
<div class="search_box">
	<form name="formsearch" method="get" action="/television/Search">
		<div class="logo"><img src="/images/Logo.png" alt="由我影视导航"/></div>
		<div class="top20 keyword"><input type="text" name="searchword" value="" class="search_word" id="search_word"/></div>
		<div class="top20 left5 width97"><input type="submit" value="由我搜索" class="search_submit"/></div>
		<div class="top15 left5 share">
			<span class="bdshare_t bds_tools_32 get-codes-bdshare">
			    <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare">
			        <span class="bds_more">分享</span>
			    </div>
			</span>
		</div>
	</form>
	<link href="/js/jquery/autocomplete/styles.css" rel="stylesheet" type="text/css" />
	<script src="/js/jquery/autocomplete/jquery.autocomplete-min.js"></script>
</div>
<div class="recommend_website">
	<h3>推荐网站</h3>
	<ul>
	<!--<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['recommend_website']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>-->
		<li><a target="_blank" href="/television/website/hit?id=<?php echo $_smarty_tpl->tpl_vars['item']->value['website_id'];?>
&url=<?php echo $_smarty_tpl->tpl_vars['item']->value['website_url'];?>
" title="由我影视导航"><?php echo $_smarty_tpl->tpl_vars['item']->value['website_name'];?>
</a></li>
	<!--<?php } ?>-->
	</ul>
</div>

<div class="hot_movie">
	<h3>热门影视</h3>
	<ul>
	<!--<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['hot_movie']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>-->
		<li><a href="/movie_detail_id_<?php echo $_smarty_tpl->tpl_vars['item']->value['movie_id'];?>
.html" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['movie_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['movie_name'];?>
</a></li>
	<!--<?php } ?>-->
	</ul>
</div>
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------ -->
<script src="/js/television/index.js"></script><?php }} ?>