(function($){
	var dialog_option = {	
			id		:	'website',
			width	:	400,
			title	:	'网址管理',
			show	:	"blind",
			hide	:	"blind",
			modal	:	true,
			buttons	:	{"Save": function(){if(autoUpdate()==false){return;}reset($( this ));},Cancel:function(){reset($(this));}}
		}
	
	
	$('button#add').click(function(){
		$('#dialog').dialog(dialog_option);
	});
	
	$('button#del').click(function(){
		
		
		var website_id = [];
		$('#list_table').find(':checkbox[name="website_id[]"]:checked').map(function(){ 
			website_id.push($(this).val());
		});
		
		if(website_id.length == 0)
		{
			return false;
		}
		
		if(confirm('你确定要删除选定的项目吗？') == false)
		{
			return false;
		}
		$.post('/intranet_television/website/delete',{website_id:website_id},function(json){
			if(json.error == true)
			{
				return alert(json.error_message);				
			}
			glists.reload();
		},'json');
	});
/******************************************************LIST*********************************************************************************/
	list_manager.prototype.set_row=function(json)
	{
		var $tag = '';	
		
		$tag += '<td><input type="checkbox" name="website_id[]" value="' + json.website_id + '"/></td>';
		$tag += '<td>' + json.website_name + '</td>';
		$tag += '<td>' + json.website_url + '</td>';
		$tag += '<td>' + json.website_hot + '</td>';
		$tag += '<td>' + json.website_check_flag + '</td>';
		$tag += '<td>' + json.website_recommend_time + '</td>';
		$tag += '<td>' + json.website_insert_time + '</td>';
		$tag += '<td><a href="http://www.ip138.com/ips138.asp?ip='+json.website_insert_ip+'&action=2" target="_blank">' + json.website_insert_ip + '</a></td>';
		$tag += '<td><input type="button" class="btn edit" value="EDIT"/>'+
				'<input type="hidden" name="website_description" value="'+json.website_description+'"/>';
		if(json.website_recommend_time)
		{
			$tag += ' <button class="btn no_recommend">取消推荐</button>';
		}
		else
		{
			$tag += ' <button class="btn on_recommend">推荐</button>';
		}		
		$tag += '</td>';
		
		return $tag;
	}	
	
	list_manager.prototype.event=function()
	{
		$('button.on_recommend').click(function(){
			var website_id = $(this).parent().parent().find(':checkbox[name="website_id[]"]').val();
			$.post('/intranet_television/website/is-recommend',{website_id:website_id,is_recommend:'T'},function(json){
				if(json.error == true)
				{
					return alert(json.error_message);				
				}
				glists.reload();
			},'json');
		});
		
		$('button.no_recommend').click(function(){
			var website_id = $(this).parent().parent().find(':checkbox[name="website_id[]"]').val();
			$.post('/intranet_television/website/is-recommend',{website_id:website_id,is_recommend:'F'},function(json){
				if(json.error == true)
				{
					return alert(json.error_message);				
				}
				glists.reload();
			},'json');
		});
		
		$('td>:button.edit').click(function(){
			$('#dialog').find(':hidden[name="website_id"]').val($(this).parent().parent().find(':checkbox[name="website_id[]"]').val());
			$('#dialog').find(':text[name="website_name"]').val($(this).parent().parent().find('td').eq(1).text());
			$('#dialog').find('select[name="website_type"]').val($(this).parent().parent().find(':hidden[name="website_type"]').val());
			$('#dialog').find(':text[name="website_url"]').val($(this).parent().parent().find('td').eq(2).text());
			$('#dialog').find('textarea[name="website_description"]').val($(this).next(':hidden[name="website_description"]').val());
			if($(this).parent().parent().find('td').eq(4).text() == 'T')
			{
				$('#dialog').find(':radio[name="website_check_flag"][value="T"]').click()
			}
			$('#dialog').dialog(dialog_option);
		});
	}
	
	$(document).ready(function(){
		glists = new list_manager('http://www.'+ DOMAIN + '/intranet_television/website/get');
		glists.set_root('#list_table');
		glists.set_list_size(JSON_DATA.list_size);
		glists.set_page_size(10);
		glists.load();
		
		$('#website').addClass('active');
	});
})(jQuery);

function autoUpdate()
{
	for(var i in $('#dialog').find('form .validation'))
	{
		if($('#dialog').find('form .validation').eq(i).val()=='')
		{
			alert($('#dialog').find('form .validation').eq(i).attr('name') + '不能是空.');
			$('#dialog').find('form .validation').eq(i).focus();
			return false;
		}
	}
	
	$.post(	'http://www.'+ DOMAIN + '/intranet_television/website/auto-update',$('#dialog').find('form').serializeArray(),function(json){
			if(json.error == true)
			{
				return alert(json.error_message);				
			}		
			glists.reload();
		},
	'json');	
}

function reset(self)
{
	self.find(':hidden').val('');
	self.find(':text').val('');
	self.find('textarea').val('');
	self.find(':radio[name="website_check_flag"][value="F"]').click();
	$('#dialog').find('select[name="website_type"]').val('DOWN');
	self.dialog('close');
}