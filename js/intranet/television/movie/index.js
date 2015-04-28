(function($){		
	$('select[name="movie_check_flag"]').change(function(){
		glists.set_param('movie_check_flag',$(this).val());
		glists.reload();		
	});
	$(':button[name="search"]').click(function(){
		glists.set_param('sk',$('select[name="sk"]').val());
		glists.set_param('sv',$(':text[name="sv"]').val());
		glists.set_page(1);
		glists.reload();
	});
	
	$('#movie').addClass('active');
	
	$('button#add').click(function(){
		set_search_category(0,'fk_category_codes[]');
		$('#dialog').dialog(dialog_option);
	});
	
	$('button#merege').click(function(){
		if(confirm('合并以后，不可已恢复！你确定要合并选中的项目吗？'))
		{
			$('div#loadmask').show().mask("loading...");
			$.post('/intranet_television/movie/merege',$('form[name="list_form"]').serialize(),function(json){
				if(json.error == true)
				{
					return alert(json.error_message);
				}
				glists.reload();
			},'json');
		}
	});
	
	$('button#autoAddByUrl').click(function(){
		$('div#loadmask').show().mask("loading...");
		var movie_link_url = $(this).prev(':text[name="movie_link_url"]').val();
		var online_url_tag		= [];
		var download_url_tag	= [];
		$.post('/intranet_television/movie/insert-by-url',{movie_link_url:movie_link_url},function(json){
			glists.reload();
			$('div#loadmask').hide().unmask();
			if(json.error == true)
			{
				return alert(json.error_message);				
			}
			$('#dialog').find(':hidden[name="movie_id"]').val(json.lists.movie_id);
			$('#dialog').find(':text[name="movie_name"]').val(json.lists.movie_name);
			$('#dialog').find(':text[name="movie_list_img_url"]').val(json.lists.movie_list_img_url);
			$('#dialog').find(':text[name="movie_page_img_url"]').val(json.lists.movie_page_img_url);
			$('#dialog').find(':text[name="movie_starring"]').val(json.lists.movie_starring);
			$('#dialog').find(':text[name="movie_director"]').val(json.lists.movie_director);
			$('#dialog').find(':text[name="movie_release_date"]').val(json.lists.movie_release_date);
			$('#dialog').find('textarea[name="movie_description"]').val(json.lists.movie_description);
			if(json.lists.movie_check_flag == 'T')
			{
				$('#dialog').find(':radio[name="movie_check_flag"][value="T"]').click();
			}
			if(json.lists.movie_online_link.length>0)
			{
				for(var i in json.lists.movie_online_link)
				{
					online_url_tag.push('<div>http://'+
										'	<input class="movie_online_url" type="text" name="movie_online_url[]" value="'+json.lists.movie_online_link[i].movie_link_url+'"/>'+
										'	<input type="hidden" name="movie_online_url_id[]" value="'+json.lists.movie_online_link[i].movie_link_id+'"/>'+
										'</div>');
				}
			}
			
			if(json.lists.movie_download_link.length>0)
			{
				for(var i in json.lists.movie_download_link)
				{
					download_url_tag.push(	'<div>http://'+
											'	<input class="movie_download_url" type="text" name="movie_download_url[]" value="'+json.lists.movie_download_link[i].movie_link_url+'"/>'+
											'	<input type="hidden" name="movie_download_url_id[]" value="'+json.lists.movie_download_link[i].movie_link_id+'"/>'+
											'</div>');
				}
			}
			
			if(online_url_tag.length >0 )
			{
				$('#dialog :text[name="movie_online_url[]"]').parent().parent().prepend(online_url_tag.join(''));
			}
			if(download_url_tag.length >0 )
			{
				$('#dialog :text[name="movie_download_url[]"]').parent().parent().prepend(download_url_tag.join(''));
			}
			set_search_category(0,'fk_category_codes[]',json.lists.fk_category_code);
			$('#dialog').dialog(dialog_option);
		},'json');
	});
	
	$('button#del').click(function(){
		
		$('div#loadmask').show().mask("loading...");
		
		var movie_id = [];
		
		$('#list_table').find(':checkbox[name="movie_id[]"]:checked').map(function(){ 
			movie_id.push($(this).val());
			$(this).closest('tr').detach();
		});
		
		if(movie_id.length <1)
		{
			return false;
		}
		
		$.post('/intranet_television/movie/delete',{movie_id:movie_id},function(json){
			if(json.error == true)
			{
				return alert(json.error_message);				
			}			
			$('div#loadmask').hide().unmask();
		},'json');
	});	

/******************************************************LIST*********************************************************************************/
	list_manager.prototype.set_row=function(json)
	{
		var $tag = '';	
		$tag += '<td><input type="checkbox" name="movie_id[]" value="' + json.movie_id + '"/></td>';
		$tag += '<td>' + json.movie_name + '<img data="http://'+json.movie_list_img_url+'" style="display:none;" /></td>';
		$tag += '<td>' + json.movie_hot + '</td>';
		$tag += '<td>' + json.movie_check_flag + '</td>';
		$tag += '<td>' + json.movie_recommend_time + '</td>';
		$tag += '<td>' + json.movie_insert_time + '</td>';
		$tag += '<td><a href="http://www.ip138.com/ips138.asp?ip='+json.movie_insert_ip+'&action=2" target="_blank">' + json.movie_insert_ip + '</a></td>';
		$tag += '<td><input type="button" class="btn edit" value="EDIT"/>';
		if(json.movie_recommend_time)
		{
			$tag += ' <button class="btn no_recommend">取消推荐</button>';
		}
		else
		{
			$tag += ' <button class="btn on_recommend">推荐</button>';
		}		
		$tag += '</td>';
		
		return $tag;
	};
	
	list_manager.prototype.event=function()
	{
		$(this.root+'>tbody>tr').map(function(){
			
			var tr=$(this);
			
			tr.children('td').eq(1).hover(
				function(){
					var img = $(this).children('img');
					if(img.attr('src') == undefined)
					{
						img.attr('src',img.attr('data'));
					}
					$(this).mousemove(function(e){
						var left	= (e.pageX - img.width()-20) + 'px';
						var top		= (e.pageY - img.height()/1.2) + 'px';
						img.css({'position':'absolute','top':top,'left':left});
					});
					img.show();
				},
				function(){
					var img = $(this).children('img');
					img.hide();
				}
			);
			
			tr.find('button.on_recommend').click(function(){
				var movie_id = $(this).parent().parent().find(':checkbox[name="movie_id[]"]').val();
				$.post('/intranet_television/movie/is-recommend',{movie_id:movie_id,is_recommend:'T'},function(json){
					if(json.error == true)
					{
						return alert(json.error_message);				
					}
					glists.reload();
				},'json');
			});
			
			tr.find('button.no_recommend').click(function(){
				var movie_id = $(this).parent().parent().find(':checkbox[name="movie_id[]"]').val();
				$.post('/intranet_television/movie/is-recommend',{movie_id:movie_id,is_recommend:'F'},function(json){
					if(json.error == true)
					{
						return alert(json.error_message);				
					}
					glists.reload();
				},'json');
			});
			
			
			tr.find('td>:button.edit').click(function(){
				var post_obj			= {movie_id:null};
				var online_url_tag		= [];
				var download_url_tag	= [];
				post_obj.movie_id = $(this).parent().parent().find('td:first>:checkbox').val();
				$.post('/intranet_television/movie/load',post_obj,function(json){
					if(json.error == false)
					{
						$('#dialog').find(':hidden[name="movie_id"]').val(json.lists.movie_id);
						$('#dialog').find(':text[name="movie_name"]').val(json.lists.movie_name);
						$('#dialog').find(':text[name="movie_list_img_url"]').val(json.lists.movie_list_img_url);
						$('#dialog').find(':text[name="movie_page_img_url"]').val(json.lists.movie_page_img_url);
						$('#dialog').find(':text[name="movie_starring"]').val(json.lists.movie_starring);
						$('#dialog').find(':text[name="movie_director"]').val(json.lists.movie_director);
						$('#dialog').find(':text[name="movie_release_date"]').val(json.lists.movie_release_date);
						$('#dialog').find('textarea[name="movie_description"]').val(json.lists.movie_description);
						if(json.lists.movie_check_flag == 'T')
						{
							$('#dialog').find(':radio[name="movie_check_flag"][value="T"]').click();
						}
						if(json.lists.movie_online_link.length>0)
						{
							for(var i in json.lists.movie_online_link)
							{
								online_url_tag.push('<div>http://'+
													'	<input class="movie_online_url" type="text" name="movie_online_url[]" value="'+json.lists.movie_online_link[i].movie_link_url+'"/>'+
													'	<input type="hidden" name="movie_online_url_id[]" value="'+json.lists.movie_online_link[i].movie_link_id+'"/>'+
													'</div>');
							}
						}
						
						if(json.lists.movie_download_link.length>0)
						{
							for(var i in json.lists.movie_download_link)
							{
								download_url_tag.push(	'<div>http://'+
														'	<input class="movie_download_url" type="text" name="movie_download_url[]" value="'+json.lists.movie_download_link[i].movie_link_url+'"/>'+
														'	<input type="hidden" name="movie_download_url_id[]" value="'+json.lists.movie_download_link[i].movie_link_id+'"/>'+
														'</div>');
							}
						}
						
						if(online_url_tag.length >0 )
						{
							$('#dialog :text[name="movie_online_url[]"]').parent().parent().prepend(online_url_tag.join(''));
						}
						if(download_url_tag.length >0 )
						{
							$('#dialog :text[name="movie_download_url[]"]').parent().parent().prepend(download_url_tag.join(''));
						}
						
						set_search_category(0,'fk_category_codes[]',json.lists.fk_category_code);
						$('#dialog').dialog(dialog_option);
					}
				},'json');
				

			});
		});
	};
	
	$(document).ready(function(){
		glists = new list_manager('/intranet_television/movie/get');
		glists.set_root('#list_table');
		glists.set_data(JSON_DATA);
		glists.set_list_size(JSON_DATA.list_size);
		glists.set_page_size(10);		
		glists.load();
		set_search_category(0,'category');
	});
})(jQuery);

function set_search_category(parent_code,select_name,select_code)
{
	var option_tag = [];
	switch (parent_code.length)
	{
		case 17:
			break;
		case 14:
			$('select[name="'+select_name+'"]').slice(5).detach();
			break;
		case 11:
			$('select[name="'+select_name+'"]').slice(4).detach();
			break;
		case 8:
			$('select[name="'+select_name+'"]').slice(3).detach();
			break;
		case 5:
			$('select[name="'+select_name+'"]').slice(2).detach();
			break;
		case 2:
			$('select[name="'+select_name+'"]').slice(1).detach();
			break;
		default:
			$('select[name="'+select_name+'"]').slice(1).detach();
	}

	for(var i in CATEGORY)
	{
		switch (parent_code.length)
		{
			case 17:
				break;
			case 14:
				if(CATEGORY[i].category_code.length == 17 && CATEGORY[i].category_code.substr(0,14) == parent_code)
				{
					option_tag.push('<option value="'+CATEGORY[i].category_code+'" onclick="set_search_category(\''+CATEGORY[i].category_code+'\',\''+select_name+'\',\''+select_code+'\');">'+CATEGORY[i].category_name+'</option>');
					
				}
				break;
			case 11:
				if(CATEGORY[i].category_code.length == 14 && CATEGORY[i].category_code.substr(0,11) == parent_code)
				{
					option_tag.push('<option value="'+CATEGORY[i].category_code+'" onclick="set_search_category(\''+CATEGORY[i].category_code+'\',\''+select_name+'\',\''+select_code+'\');">'+CATEGORY[i].category_name+'</option>');
					
				}
				break;
			case 8:
				if(CATEGORY[i].category_code.length == 11 && CATEGORY[i].category_code.substr(0,8) == parent_code)
				{
					option_tag.push('<option value="'+CATEGORY[i].category_code+'" onclick="set_search_category(\''+CATEGORY[i].category_code+'\',\''+select_name+'\',\''+select_code+'\');">'+CATEGORY[i].category_name+'</option>');
					
				}
				break;
			case 5:
				if(CATEGORY[i].category_code.length == 8 && CATEGORY[i].category_code.substr(0,5) == parent_code)
				{
					option_tag.push('<option value="'+CATEGORY[i].category_code+'" onclick="set_search_category(\''+CATEGORY[i].category_code+'\',\''+select_name+'\',\''+select_code+'\');">'+CATEGORY[i].category_name+'</option>');
					
				}
				break;
			case 2:
				if(CATEGORY[i].category_code.length == 5 && CATEGORY[i].category_code.substr(0,2) == parent_code)
				{
					option_tag.push('<option value="'+CATEGORY[i].category_code+'" onclick="set_search_category(\''+CATEGORY[i].category_code+'\',\''+select_name+'\',\''+select_code+'\');">'+CATEGORY[i].category_name+'</option>');					
				}
				break;
			default:
				if(CATEGORY[i].category_code.length == 2)
				{
					option_tag.push('<option value="'+CATEGORY[i].category_code+'" onclick="set_search_category(\''+CATEGORY[i].category_code+'\',\''+select_name+'\',\''+select_code+'\');">'+CATEGORY[i].category_name+'</option>');
					
				}
		}
	}

	if(option_tag.length == 0)
	{
		delete(glists.param.fk_category_code);
		return false;
	}

	switch (parent_code.length)
	{
		case 17:
			break;
		case 14:
			if($('select[name="'+select_name+'"].children5').length)
			{
				option_tag.unshift('<option value="00000000000000000" onclick="set_search_category(\'00000000000000000\',\''+select_name+'\',\''+select_code+'\');">==分类==</option>');
				$('select[name="'+select_name+'"].children5').empty().append(option_tag.toString());
			}
			else
			{		
				option_tag.unshift('<option value="00000000000000000" onclick="set_search_category(\'00000000000000000\',\''+select_name+'\',\''+select_code+'\');">==分类==</option>');
				$('select[name="'+select_name+'"].children4').after('<select name="'+select_name+'" class="children5">'+option_tag.toString()+'</select>');
			}
			break;
		case 11:
			if($('select[name="'+select_name+'"].children4').length)
			{
				option_tag.unshift('<option value="00000000000000" onclick="set_search_category(\'00000000000000\',\''+select_name+'\',\''+select_code+'\');">==分类==</option>');
				$('select[name="'+select_name+'"].children4').empty().append(option_tag.toString());
			}
			else
			{
				option_tag.unshift('<option value="00000000000000" onclick="set_search_category(\'00000000000000\',\''+select_name+'\',\''+select_code+'\');">==分类==</option>');
				$('select[name="'+select_name+'"].children3').after('<select name="'+select_name+'" class="children4">'+option_tag.toString()+'</select>');
			}
			break;
		case 8:
			if($('select[name="'+select_name+'"].children3').length)
			{
				option_tag.unshift('<option value="00000000000" onclick="set_search_category(\'00000000000\',\''+select_name+'\',\''+select_code+'\');">==分类==</option>');
				$('select[name="'+select_name+'"].children3').empty().append(option_tag.toString());
			}
			else
			{
				option_tag.unshift('<option value="00000000000" onclick="set_search_category(\'00000000000\',\''+select_name+'\',\''+select_code+'\');">==分类==</option>');
				$('select[name="'+select_name+'"].children2').after('<select name="'+select_name+'" class="children3">'+option_tag.toString()+'</select>');
			}
			break;
		case 5:
			if($('select[name="'+select_name+'"].children2').length)
			{
				option_tag.unshift('<option value="00000000" onclick="set_search_category(\'00000000\',\''+select_name+'\',\''+select_code+'\');">==分类==</option>');
				$('select[name="'+select_name+'"].children2').empty().append(option_tag.toString());
			}
			else
			{
				option_tag.unshift('<option value="00000000" onclick="set_search_category(\'00000000\',\''+select_name+'\',\''+select_code+'\');">==分类==</option>');
				$('select[name="'+select_name+'"].children1').after('<select name="'+select_name+'" class="children2">'+option_tag.toString()+'</select>');
			}
			break;
		case 2:
			if($('select[name="'+select_name+'"].children1').length)
			{
				option_tag.unshift('<option value="00000" onclick="set_search_category(\'00000\',\''+select_name+'\',\''+select_code+'\');">==分类==</option>');
				$('select[name="'+select_name+'"].children1').empty().append(option_tag.toString());
			}
			else
			{
				option_tag.unshift('<option value="00000" onclick="set_search_category(\'00000\',\''+select_name+'\',\''+select_code+'\');">==分类==</option>');
				
				$('select[name="'+select_name+'"]').after('<select name="'+select_name+'" class="children1">'+option_tag.toString()+'</select>');
			}
			break;
		default:
				option_tag.unshift('<option value="00" onclick="set_search_category(\'00\',\''+select_name+'\',\''+select_code+'\');">==分类==</option>');
				$('select[name="'+select_name+'"]').empty().append(option_tag.toString());
	}
	
	if(select_code != undefined && select_code != '')
	{
		switch (parent_code.length)
		{
			case 14:
				select_code = select_code.substr(0,17);
				$('select[name="'+select_name+'"].children5').val(select_code).children('option[value="'+select_code+'"]').click();
				break;
			case 11:
				select_code = select_code.substr(0,14);
				$('select[name="'+select_name+'"].children4').val(select_code).children('option[value="'+select_code+'"]').click();
				break;
			case 8:
				select_code = select_code.substr(0,11);
				$('select[name="'+select_name+'"].children3').val(select_code).children('option[value="'+select_code+'"]').click();
				break;
			case 5:
				select_code = select_code.substr(0,8);
				$('select[name="'+select_name+'"].children2').val(select_code).children('option[value="'+select_code+'"]').click();
				break;
			case 2:
				select_code = select_code.substr(0,5);
				$('select[name="'+select_name+'"].children1').val(select_code).children('option[value="'+select_code+'"]').click();
				break;
			default:
				select_code = select_code.substr(0,2);
				$('select[name="'+select_name+'"]').val(select_code).children('option[value="'+select_code+'"]').click();
		}
	}
	
	if( $('select[name="category"]').data("events") )
	{
		delete $('select[name="category"]').data("events")['change'];
	}
	
	$('select[name="category"]').change(function(){
		if($(this).val()!=0)
		{
			glists.set_param('fk_category_code',$(this).val());
			glists.reload();
		}
	});
}

var dialog_option = {	
		id		:	'movie',
		width	:	450,
		title	:	'影片管理',
		show	:	"blind",
		hide	:	"blind",
		modal	:	true,
		buttons	:	{"Save": function(){if(autoUpdate()==false){return;}$(this).dialog('close');},Cancel:function(){$(this).dialog('close');}}
	};

dialog_option.close	= function (){
	var self = $('div.ui-dialog');
	self.find(':text').val('');
	self.find(':hidden[name="movie_id"]').val('0');
	self.find('textarea').val('');
	self.find(':radio[name="movie_check_flag"][value="F"]').click();
	self.find(':text[name^="movie_online_url"]').parent().parent().html('<div>http://'+
																		'	<input class="movie_online_url" type="text" value="" name="movie_online_url[]">'+
																		'	<input type="hidden" name="movie_online_url_id[]">'+
																		'</div>');
	self.find(':text[name^="movie_download_url"]').parent().parent().html(	'<div>http://'+
																			'<input class="movie_download_url" type="text" value="" name="movie_download_url[]">'+
																			'<input type="hidden" name="movie_download_id[]">'+
																			'</div>');
	self.find('#movie_name ~ div').detach();
};

dialog_option.open	= function(){
	if($('div.ui-dialog').find('#movie_name').data("events") == undefined)
	{
		$('div.ui-dialog').find('#movie_name').change(function(){
			var self = $(this);
			self.parent().find('div').detach();
			$.post('/intranet_television/movie/load-by-name',{'movie_name':$(this).val()},function(json){
				if(!json.error)
				{
					var tag = [];
					for(var i in json.lists)
					{
						tag.push('<div>');
						tag.push('<span><img src="http://'+json.lists[i].movie_list_img_url+'" alt="'+json.lists[i].movie_name+'" height="80"/></span>');
						tag.push('<span><a href="'+json.lists[i].movie_online_link+'" target="_blank">在线'+json.lists[i].movie_name+'</a></span>');
						tag.push('<span><a href="'+json.lists[i].movie_download_link+'" target="_blank">下载'+json.lists[i].movie_name+'</a></span>');
						tag.push('</div>');
					}
					self.after(tag.join(' '));
				}
			},'json');
		});
	}
};
/******************************************************LIST*********************************************************************************/

function autoUpdate()
{
	var fk_category_code = $('#dialog').find('select[name="fk_category_codes[]"]:last').val();
	fk_category_code = fk_category_code > 0 ? fk_category_code : $('#dialog').find('select[name="fk_category_codes[]"]:last').prev().val();
	$('#dialog').find(':hidden[name="fk_category_code"]').val(fk_category_code);

	for(var i in $('#dialog').find('form .validation'))
	{
		if($('#dialog').find('form .validation').eq(i).val()=='')
		{
			alert($('#dialog').find('form .validation').eq(i).attr('name') + '不能是空.');
			$('#dialog').find('form .validation').eq(i).focus();
			return false;
		}
	}

	$.post(	'/intranet_television/movie/auto-update',$('#dialog').find('form').serializeArray(),function(json){
			if(json.error == true)
			{
				return alert(json.error_message);				
			}		
			glists.reload();
		},
	'json');	
}
function ad_url(self){
	var $div = self.parent().next().children('div').last();
	$div.clone(true).insertAfter($div);
	self.parent().next().children('div').last().find('input').val('');
}
	
function de_url(self){
	
	var $div = self.parent().next().children('div');

	if($div.length<=1 || $div.last().children(':hidden[name="movie_online_url_id[]"]').val() > 0)
	{
		return false;
	}
	$div.last().detach();
}

