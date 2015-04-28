<?php /* Smarty version Smarty-3.1.8, created on 2012-07-04 09:35:59
         compiled from "/home/www/inu5/application/television/views/scripts/search/index.phtml" */ ?>
<?php /*%%SmartyHeaderCode:17673685804ff39dffaf0040-30542910%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1bbc9f746f0a521fc68c969e815504bacd6510b' => 
    array (
      0 => '/home/www/inu5/application/television/views/scripts/search/index.phtml',
      1 => 1339656231,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17673685804ff39dffaf0040-30542910',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'movies' => 0,
    'item' => 0,
    'search_word_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4ff39dffb583d7_85863396',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ff39dffb583d7_85863396')) {function content_4ff39dffb583d7_85863396($_smarty_tpl) {?><?php if (!is_callable('smarty_function_pagebar')) include '/home/www/inu5/plugins/function.pagebar.php';
?><link href="/css/television/search/index.css" rel="stylesheet" type="text/css" />
<!-- *************************************************************************************************************** -->
<div class="search_lists" id="search_lists">
	<?php if ($_smarty_tpl->tpl_vars['movies']->value['error']==true){?>
		<p><?php echo $_smarty_tpl->tpl_vars['movies']->value['error_message'];?>
</p>
	<?php }else{ ?>
		<ul>
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['movies']->value['lists']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
			<li class="movie_item">
				<img data="http://<?php echo $_smarty_tpl->tpl_vars['item']->value['movie_list_img_url'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['movie_name'];?>
" align="left" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_<?php echo $_smarty_tpl->tpl_vars['item']->value['movie_id'];?>
.html" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['movie_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['movie_name'];?>
</a> <span class="update_date">更新日期:<?php echo $_smarty_tpl->tpl_vars['item']->value['movie_insert_date'];?>
</span></h1>
				<?php if ($_smarty_tpl->tpl_vars['item']->value['movie_starring']){?><p><strong> 主演：<?php echo $_smarty_tpl->tpl_vars['item']->value['movie_starring'];?>
</strong></p><?php }?>
				<?php if ($_smarty_tpl->tpl_vars['item']->value['movie_director']){?><p><strong> 导演：<?php echo $_smarty_tpl->tpl_vars['item']->value['movie_director'];?>
</strong></p><?php }?>
				<?php if ($_smarty_tpl->tpl_vars['item']->value['movie_description']){?><p><?php echo $_smarty_tpl->tpl_vars['item']->value['movie_description'];?>
</p><?php }?>
			</li>
		<?php } ?>
		</ul>
		<div class="page_bar">
			<?php echo smarty_function_pagebar(array('total'=>$_smarty_tpl->tpl_vars['movies']->value['total'],'list_size'=>$_smarty_tpl->tpl_vars['movies']->value['list_size'],'current'=>$_smarty_tpl->tpl_vars['movies']->value['page'],'page_size'=>10),$_smarty_tpl);?>

			<p class="search_time">一共找到约 <u><?php echo $_smarty_tpl->tpl_vars['movies']->value['total'];?>
</u> 条结果 （用时 <u><?php echo $_smarty_tpl->tpl_vars['movies']->value['search_time'];?>
</u> 秒）</p>
		</div>
		<?php if (count($_smarty_tpl->tpl_vars['movies']->value['related_words'])>0){?>
		<div class="related_words">
			<h1>相关关键字</h1>
			<ul>
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['movies']->value['related_words']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
				<li><a href="/television/Search?searchword=<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['item']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</a></li>
			<?php } ?>
			</ul>
		<?php }?>
		</div>
	<?php }?>
</div>

<!--<?php if ($_smarty_tpl->tpl_vars['movies']->value['error']==false){?>-->
<div class="customer_valuation" style="clear:both">
	<form name="customer_valuation_form" onsubmit="return false;">
		<input type="hidden" name="search_word_id" value="<?php echo $_smarty_tpl->tpl_vars['search_word_id']->value;?>
" />
		<lable>亲！ 搜索结果对你有用吗?</lable>
		<input type="radio" name="search_word_useful_flag" value="T" checked="checked" />有用
		<input type="radio" name="search_word_useful_flag" value="F" />没用
		<input type="submit" value="提交" />
	</form>
</div>
<!--<?php }?>-->
<!-- ********************************************************************** -->
<script src="/js/television/search/index.js"></script>
<!-- ********************************************************************** --><?php }} ?>