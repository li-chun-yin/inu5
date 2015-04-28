<?php /* Smarty version Smarty-3.1.8, created on 2012-07-13 16:47:16
         compiled from "/home/www/inu5/application/television/views/scripts/movie/list.phtml" */ ?>
<?php /*%%SmartyHeaderCode:8370227044fffe0948542d9-52950021%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26d9e20788657bebe7b12b1ed03c68b9a3da17ef' => 
    array (
      0 => '/home/www/inu5/application/television/views/scripts/movie/list.phtml',
      1 => 1339657976,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8370227044fffe0948542d9-52950021',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'movies' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fffe094898bd4_63943448',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fffe094898bd4_63943448')) {function content_4fffe094898bd4_63943448($_smarty_tpl) {?><?php if (!is_callable('smarty_function_pagebar')) include '/home/www/inu5/plugins/function.pagebar.php';
?><link href="/css/television/movie/list.css" rel="stylesheet" type="text/css" />
<!-- *************************************************************************************************************** -->
<div class="movie_lists" id="movie_lists">
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
" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_<?php echo $_smarty_tpl->tpl_vars['item']->value['movie_id'];?>
.html" title="<?php echo $_smarty_tpl->tpl_vars['item']->value['movie_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['movie_name'];?>
</a></span></h1>
				<p class="movie_starring"><?php if ($_smarty_tpl->tpl_vars['item']->value['movie_starring']){?><strong> 主演：<?php echo $_smarty_tpl->tpl_vars['item']->value['movie_starring'];?>
</strong><?php }?></p>
				<p class="movie_director"><?php if ($_smarty_tpl->tpl_vars['item']->value['movie_director']){?><strong> 导演：<?php echo $_smarty_tpl->tpl_vars['item']->value['movie_director'];?>
</strong><?php }?></p>
				<p><?php if ($_smarty_tpl->tpl_vars['item']->value['movie_release_date']){?> 上映：<?php echo $_smarty_tpl->tpl_vars['item']->value['movie_release_date'];?>
<?php }?></p>
			</li>
		<?php } ?>
		</ul>
		<div class="page_bar">
			<?php echo smarty_function_pagebar(array('style'=>'list','total'=>$_smarty_tpl->tpl_vars['movies']->value['total'],'list_size'=>$_smarty_tpl->tpl_vars['movies']->value['list_size'],'current'=>$_smarty_tpl->tpl_vars['movies']->value['page'],'page_size'=>10),$_smarty_tpl);?>

		</div>
	<?php }?>
</div>
<!-- ********************************************************************** -->
<script src="/js/television/movie/list.js"></script>
<!-- ********************************************************************** --><?php }} ?>