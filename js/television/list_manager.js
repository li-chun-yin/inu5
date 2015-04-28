function list_manager(url)
{
	this.url		= url;	
	this.root		= '#list_box';
	this.root_tag	= $(this.root);
	this.json_data	= JSON_DATA ? JSON_DATA : {'lists':null,'total':0};
	this.lists		= this.json_data.lists;
	this.total		= this.json_data.total;
	this.page		= 1;
	this.page_size	= 10;
	this.list_size	= 20;
}	
list_manager.prototype.set_root =function($id)
{
	return this.root = $id;
}	

list_manager.prototype.set_data =function(data)
{
	this.json_data = data;
	this.lists		= this.json_data.lists;
	this.total		= this.json_data.total;
}

list_manager.prototype.set_page =function(page)
{
	return this.page = page;
}
	
list_manager.prototype.set_page_size = function(page_size)
{
	total_page=Math.ceil(this.total/(this.json_data.list_size?this.json_data.list_size:this.list_size));
	return this.page_size = (total_page<page_size) ? total_page : page_size;
}
	
list_manager.prototype.set_list_size = function(size)
{
	return this.list_size = size;
}
	
list_manager.prototype.load = function()
{
	this.set_list_size(this.json_data.list_size);
	this.set_lists();
}
	
list_manager.prototype.add_hover_class=function()
{
	$(this.root).find('tbody>tr').hover(
		function(){$(this).addClass('hover');},
		function(){$(this).removeClass('hover');}
	);			
}
	
list_manager.prototype.pagebar = function()
{
	var start 		= (this.page-this.page_size)>0 ? this.page-((this.page%this.page_size==0)?this.page_size:this.page%this.page_size) : 0;
	var total_page	=Math.ceil(this.total/this.list_size);
	var $bar = [];
	$bar.push('<span>共'+this.total+'条数据 页次:'+this.page+'/'+total_page+'页</span>');
	$bar.push('<div style="float:right;">');
	$bar.push('<a>&lt;&lt;</a>');
	$bar.push('<a>&lt;</a>');
	for(var i=start; i<this.page_size + start && i<total_page;)
	{
		if(i==this.page-1)
		{
			$bar.push('<a style="padding:0;"><em>' + ++i + '</em></a>');	
		}
		else
		{
			$bar.push('<a>' + ++i + '</a>');
		}				
	}
	$bar.push('<a>&gt;</a>');
	$bar.push('<a>&gt;&gt;</a>');
	$bar.push('<span><input type="text" name="page" /><input type="button" value="跳转" class="btn"/></span>');
	$bar.push('</div>');
	
	this.root_tag.find('.pagebox').empty().append($bar.join(''));
	this.paging();
	return;
}
	
list_manager.prototype.paging = function()
{
	var self = this;
	total_page=Math.ceil(this.total/this.list_size);
	
	this.root_tag.find('.pagebox').find(':button.btn').click(function(){
		self.set_page($(this).prev().val());
		self.reload();
	});
	this.root_tag.find('.pagebox').find('a').click(function(){
		var current_page	= Number($(this).parent().parent().find('em').html());
		var page = $(this).html();		
		switch(page)
		{
			case '&lt;&lt;':
				page	= 1;
				break;
			case '&lt;':
				page	= (current_page - 1) ? (--current_page) : 1;
				break;
			case '&gt;':
				page	= ((current_page+1)>total_page) ? total_page : (++current_page);
				break;
			case '&gt;&gt;':
				page	= total_page;
				break;
			case '跳转':
				page	= $(this).prev().val();
				break;
			default:
				page	= page;
		}
		self.set_page(page);
		self.reload();
	});
}
	
list_manager.prototype.reload = function()
{
	var root_tag = this.root_tag;
	var self = this;
	$.post(this.url,{type:'json',view:true,page:this.page,list_size:this.list_size},function(json){
		if(json.error)
		{
			return alert(json.error_message);
		}
		root_tag.find('ul').empty().attr('json_data',json);
		self.lists=json.lists;
		self.set_lists();
	},'json');
}

list_manager.prototype.set_lists = function()
{
	var $tag = [];
	for(var i in this.lists)
	{
		$tag.push('<li onmouseover="this.className=\'over\'" onmouseout="this.className=\'\'">');
		$tag.push(this.set_row(this.lists[i]));
		$tag.push('</li>');
	}
	$(this.root).find('ul').append($tag.join(''));
	this.add_hover_class();
	this.pagebar();
	this.event();
}

list_manager.prototype.event=function(){}
list_manager.prototype.set_row=function(json){}//需要返回一个html字符串

$(':checkbox[name="check_all"]').click(function(){
	$(':checkbox[name="check_all"]').parent().parent().parent().next().find(':checkbox').click();
});