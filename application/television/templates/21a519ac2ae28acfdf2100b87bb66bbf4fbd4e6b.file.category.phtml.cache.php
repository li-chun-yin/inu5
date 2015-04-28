<?php /* Smarty version Smarty-3.1.8, created on 2012-06-15 17:08:15
         compiled from "/home/www/inu5/application/television/views/common/category.phtml" */ ?>
<?php /*%%SmartyHeaderCode:20717521204fdafb7fcedde0-20108009%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21a519ac2ae28acfdf2100b87bb66bbf4fbd4e6b' => 
    array (
      0 => '/home/www/inu5/application/television/views/common/category.phtml',
      1 => 1339660269,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20717521204fdafb7fcedde0-20108009',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'category_data' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fdafb7fd43378_21000982',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fdafb7fd43378_21000982')) {function content_4fdafb7fd43378_21000982($_smarty_tpl) {?><style>
div.category ul{
	width:170px;
	padding:30px 30px 30px 0;
}

div.category ul li.active a{
	border-left:5px solid #DD4B39;
	color:#DD4B39;
}

div.category ul li a{
	border-left:5px solid #FFFFFF;
	font-size:13px;
	padding:5px 5px 5px 50px;
	width:100px;
	display:block;
	cursor:pointer;
	color:#0360AF;
}

div.category ul li a:hover{
	border-left:5px solid #EEEEEE;
	background:#EEEEEE;
}

div.category ul li.active a:hover{
	border-left:5px solid #DD4B39;
}
</style>
<div class="category">
	<ul>
		<li <?php if (empty($_GET['category_code'])){?>class="active"<?php }?>><a href="/movie_list_cc_0.html" data_id="0">所有</a></li>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['category_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
	<?php if (strlen($_smarty_tpl->tpl_vars['item']->value['category_code'])==2){?>
		<li <?php if (isset($_GET['category_code'])&&$_GET['category_code']==$_smarty_tpl->tpl_vars['item']->value['category_code']){?>class="active"<?php }?>>
			<a href="/movie_list_cc_<?php echo $_smarty_tpl->tpl_vars['item']->value['category_code'];?>
.html" data_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['category_code'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['category_name'];?>
</a>
		</li>
	<?php }elseif(isset($_GET['category_code'])&&$_GET['category_code']==$_smarty_tpl->tpl_vars['item']->value['category_code']){?>
		<li class="active">
			<a href="/movie_list_cc_<?php echo $_smarty_tpl->tpl_vars['item']->value['category_code'];?>
.html" data_id="<?php echo $_smarty_tpl->tpl_vars['item']->value['category_code'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['category_name'];?>
</a>
		</li>
	<?php }?>
<?php } ?>
	</ul>
</div>
<script type="text/javascript">
(function($){
	var category	= <?php echo json_encode($_smarty_tpl->tpl_vars['category_data']->value);?>
;
	$(document).ready(function(){
		$('div.category>ul>li>a').mouseover(function(e){
			if(e.target == this){
				category_mouseover($(this));
			}
		});

		$('div.category>ul').mouseout(function(e){
			//alert(1);
			if(e.target == this){
				$('div.category>ul>li[for]').detach();
			}
		});

		$('div.category>ul>li').click(function(e){
			$('div.category>ul>li[class="active"]').removeClass('active');
			$(this).addClass('active');
		});
	});

	category_mouseover	= function(e){
		var this_id = e.attr('data_id');
		var ac_id = $('div.category>ul>li[class="active"]>a').attr('data_id');
		if(this_id == 0)return;
		if($('div.category>ul>li[for="'+this_id+'"]').length>0)return;
		for(i in category){
			if(category[i].category_code.substr(0,this_id.length) == this_id && category[i].category_code.length == this_id.length+3){
				if(category[i].category_code !== ac_id){
					e.parent().after(	'<li for="'+this_id+'" onclick="replaceActive($(this))">'+
										'	<a href="/movie_list_cc_'+category[i].category_code+'.html" data_id="'+category[i].category_code+'" onmouseover="category_mouseover($(this))">'+category[i].category_name+'</a>'+
										'</li>');
				}
			}
		}
	}
	replaceActive = function (e){
		var this_id = e.attr('for');
		$('div.category>ul>li[class="active"]').removeClass('active');
		e.addClass('active');
	}
})(jQuery);
</script><?php }} ?>