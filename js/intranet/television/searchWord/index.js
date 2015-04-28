(function($){
	$('#search_word').addClass('active');
	$("#sdate,#edate").datepicker( $.datepicker.regional[ "zh-CN" ] );
/*******************************************************************************************************************************************/
	$(':button[name="search"]').click(function(){
		if($(':text[name="sdate"]').val()>$(':text[name="edate"]').val())
		{
			return alert('开始日期不能大于结束日期。');
		}
		glists.set_param('sk',$('select[name="sk"]').val());
		glists.set_param('sv',$(':text[name="sv"]').val());
		glists.set_param('sdate',$(':text[name="sdate"]').val());
		glists.set_param('edate',$(':text[name="edate"]').val());
		glists.set_param('search_word_display',$('select[name="search_word_display"]').val());
		glists.set_page(1);
		glists.reload();
	});
	
	$('button#crawl_flag').click(function(){
		if(confirm('状态改为已抓取以后，不可已恢复，请谨慎操作！ 确定要将状态更改为已抓取吗？'))
		{
			$.post('/intranet_television/search-word/update-crawl-true',$('form[name="list_form"]').serialize(),function(json){
				if(json.error==true)
				{
					return alert(json.error_message);
				}
				glists.reload();
			},'json');
		}
	});
	
	$('button#crawl').click(function(){
		if(confirm('确定要开始抓取这选选中的关键字吗？'))
		{
			$('form[name="list_form"]').attr({'action':'/intranet_television/search-word/start-crawl/','target':'_blank'});
			$('form[name="list_form"]').get(0).submit();
		}
	});
/******************************************************LIST*********************************************************************************/
	list_manager.prototype.set_row=function(json)
	{
		var $tag = '';	
		
		$tag += '<td><input type="checkbox" name="search_word_value[]" value="' + json.search_word_value + '"/></td>';
		$tag += '<td>' + json.search_word_value + '</td>';
		$tag += '<td>' + json.search_word_useful_true_cnt + '</td>';
		$tag += '<td>' + json.search_word_useful_false_cnt + '</td>';
		$tag += '<td>' + json.search_word_crawl_true_cnt + '</td>';
		$tag += '<td>' + json.search_word_crawl_false_cnt + '</td>';
		$tag += '<td>' + json.search_word_total_cnt + '</td>';
		
		return $tag;
	}	
	
	list_manager.prototype.event=function()
	{
		$(this.root+'>tbody>tr').map(function(){
			/*******************************************判断是不是需要抓取******************************************************/
			var search_word_total			= $(this).children('td:last').text();
			var search_word_useful_true		= $(this).children('td:eq(2)').text();
			var search_word_useful_false	= $(this).children('td:eq(3)').text();
			var search_word_crawl_true		= $(this).children('td:eq(4)').text();
			var search_word_crawl_false		= $(this).children('td:eq(5)').text();
			if(search_word_crawl_true == 0)							//如果这个关键字没有被抓取过，则字体显示红色粗体，表示需要抓取
			{
				$(this).children('td').css({'color':'red','font-weight':'bolder'});
				$(this).find('td>:checkbox').click();
			}
			else if(search_word_useful_false > 0 && search_word_crawl_false > 0)	//抓取过，并且很有可能数据比较过时
			{
				$(this).children('td').css({'color':'blue'});
			}
			else if(search_word_useful_false == 0 && search_word_crawl_false>0)		//可能最近抓取过，数据可以正常使用
			{
				$(this).children('td').css({'color':'green'});
			}
			else if(search_word_crawl_true == search_word_total && search_word_crawl_false == 0) //如果搜索关键字已经抓取完成，把checkbox去掉。
			{
				$(this).children('td:first').html('已抓取');
			}
			/***************************************************************************************************************/
		});
	}
	
	$(document).ready(function(){
		glists = new list_manager('http://www.'+ DOMAIN + '/intranet_television/search-word/get');
		glists.set_root('#list_table');
		glists.set_list_size(JSON_DATA.list_size);
		glists.set_page_size(10);	
		glists.load();	
	});
})(jQuery);