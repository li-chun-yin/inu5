function list_manager(url)
{
	this.url		= url;	
	this.root		= '#list_table';
	this.json_data	= JSON_DATA ? JSON_DATA : {'lists':null,'total':0};
	this.lists		= this.json_data.lists;
	this.total		= this.json_data.total;
	this.page		= 1;
	this.page_size	= 10;
	this.list_size	= 20;
	this.param		= {};
}	
list_manager.prototype.set_root =function($id)
{
	return this.root = $id;
};
list_manager.prototype.set_data =function(data)
{
	this.json_data = data;
	this.lists		= this.json_data.lists;
	this.total		= this.json_data.total;
};
list_manager.prototype.set_page =function(page)
{
	return this.page = page;
};
	
list_manager.prototype.set_page_size = function(page_size)
{
	total_page=Math.ceil(this.total/this.list_size);
	
	return this.page_size = (total_page<page_size) ? total_page : page_size;
};
	
list_manager.prototype.set_list_size = function(size)
{
	return this.list_size = size;
};

list_manager.prototype.set_param = function(name,value)
{
	this.param[name] = value;
};
	
list_manager.prototype.load = function()
{
	this.set_lists();
};
	
list_manager.prototype.add_hover_class=function()
{
	$(this.root).find('tbody>tr').hover(
		function(){$(this).addClass('hover');},
		function(){$(this).removeClass('hover');}
	);			
};
	
list_manager.prototype.pagebar = function()
{
	var start 		= (this.page-this.page_size)>0 ? this.page-((this.page%this.page_size==0)?this.page_size:this.page%this.page_size) : 0;
	var total_page	=Math.ceil(this.total/this.list_size);
	var $bar = [];
	$bar.push('<ul>');
	$bar.push('<li><a href="#">&lt;&lt;</a></li>');
	$bar.push('<li><a href="#">&lt;</a></li>');
	for(var i=start; i<this.page_size + start && i<total_page;)
	{
		$bar.push('<li><a href="#" ' + (i==this.page-1 ? 'class="on"' : '') + '>' + ++i + '</a></li>');			
	}
	$bar.push('<li><a href="#">&gt;</a></li>');
	$bar.push('<li><a href="#">&gt;&gt;</a></li>');
	$bar.push('<li><span><input type="text" name="page" /><a>直接跳转</a></span></li>');
	$bar.push('</ul>');
	
	$(this.root).find('tfoot div.pagebar').append($bar.join(''));
	this.paging();
	return;
};
	
list_manager.prototype.paging = function()
{
	var self = this;
	total_page=Math.ceil(this.total/this.list_size);
	$(this.root).find('tfoot div.pagebar').find('a').click(function(){
		var current_page	= Number($(this).parent().parent().find('a.on').html());
		page = $(this).html();		
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
			case '直接跳转':
				page	= $(this).prev().val();
				break;
			default:
				page	= page;
		}
		self.set_page(page);
		self.reload();
	});
};
	
list_manager.prototype.reload = function()
{
	$('div#loadmask').show().mask("loading...");
	
	var root			= $(this.root);
	var self			= this;
	self.param.type		= 'json';
	self.param.view		= true;
	self.param.page		= this.page;
	self.param.list_size= this.list_size;
	$.post(this.url,self.param,function(json){
		if(json.error)
		{
			return alert(json.error_message);
		}
		root.find('tbody').empty();
		root.find('tfoot .pagebar').empty();
		self.total=json.total;
		self.lists=json.lists;
		self.set_lists();
		self.paging();
		$('div#total_box>strong').text(json.total);
		
		$('div#loadmask').hide().unmask();
	},'json');
};

list_manager.prototype.set_lists = function()
{
	var $tag = [];
	for(var i in this.lists)
	{
		$tag.push('<tr>');
		$tag.push(this.set_row(this.lists[i]));
		$tag.push('</tr>');
	}
	$(this.root).find('tbody').append($tag.join(''));
	this.add_hover_class();
	this.pagebar();
	this.event();
};

list_manager.prototype.event=function(){};
list_manager.prototype.set_row=function(json){};//需要返回一个html字符串

$(':checkbox[name="check_all"]').toggle(
	function(){
		$(':checkbox[name="check_all"]').parent().parent().parent().next().find(':checkbox').attr('checked',true);
	},
	function(){
		$(':checkbox[name="check_all"]').parent().parent().parent().next().find(':checkbox').attr('checked',false);}
);

$('div#total_box>strong').text(JSON_DATA.total);