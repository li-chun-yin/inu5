(function($){
	$(document).ready(function(){
		$('#category').addClass('active');
		
		$('select.category').map(function(i){
			$(this).click(function(){
				var self = $(this);
				if(self.val()==null){return false};
				var category_code = self.val()[0].split('||')[1];
				$.post(	'http://www.'+ DOMAIN + '/intranet_television/category/get',{category_code:category_code},function(json){
					//if(i==0)
					self.next().empty().next().empty().next().empty().next().empty().next().empty();
					if(json.error == false)
					{
						var $tag = '';
						for(var i in json.lists)
						{
							$tag += '<option value="'+json.lists[i].category_id+'||' + json.lists[i].category_code + '">' + json.lists[i].category_name + '</option>';
						}
						self.next().append($tag);
					}
				},'json');
			});
		});
		
		$('button#reset').click(function(){
			var $category_tag	= $('select.category>option:selected').last();
			var category_name	= $category_tag.html();
			var category_id		= $category_tag.val().split('||')[0];
			
			if($category_tag.length == 0) return false;
			if(category_name = prompt('类别名称',category_name))
			{
				update(category_id,category_name,$category_tag);
			}
		});
		
		$('button#add').click(function(){
			var $category_tag		= $('select.category>option:selected').last();
			var category_name		= $category_tag.html();
			var parent_category_code= $category_tag.val() ? $category_tag.val().split('||')[1] : 0;
			if(category_name = prompt('类别名称'))
			{
				(parent_category_code==0) ? $select = $('select.category').first() : $select = $category_tag.parent().next();				
				insert(parent_category_code,category_name,$select);
			}
		});	
		
		$('button#del').click(function(){
			var $category_tag		= $('select.category>option:selected').last();
			var category_id			= $category_tag.val() ? $category_tag.val().split('||')[0] : 0;			
			if($category_tag.length == 0) return false;
			if(confirm('删除操作不可以恢复，请谨慎操作.要删除当前类别以及所有当前类别下的子类别？'))
			{
				del(category_id,$category_tag);
			}
		});
	});
})(jQuery);

function update(category_id,category_name,$category_tag)
{
	$.post(	'http://www.'+ DOMAIN + '/intranet_television/category/update',
		{category_id:category_id,category_name:category_name},
		function(json)
		{
			if(json.error == false)
			{
				$category_tag.html(category_name);
			}
			else
			{
				return alert('Error.');
			}
		},
	'json');	
}

function insert(parent_category_code,category_name,$select)
{
	$.post(	'http://www.'+ DOMAIN + '/intranet_television/category/add',
		{category_name:category_name,parent_category_code:parent_category_code},
		function(json)
		{
			if(json.error == false)
			{
				$select.append('<option value="'+json.category_seq + '||' + json.category_code +'">'+category_name+'</option>');
			}
			else
			{
				return alert('Error.');
			}
		},
	'json');	
}

function del(category_id,$category_tag)
{
	$.post(	'http://www.'+ DOMAIN + '/intranet_television/category/delete',{category_id:category_id},function(json){
		if(json.error == false)
		{
			$category_tag.parent().next().empty();
			$category_tag.detach();
		}
		else
		{
			return alert('Error.');
		}
	},'json');
}