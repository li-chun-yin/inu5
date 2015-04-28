(function($){
	var tag			= $('div#crawl_content');
	var failed_tag	= $('div#crawl_failed');
	
	$('#display').toggle(
		function(){
			tag.hide();
			failed_tag.show();
			$(this).text('显示全部');
		},
		function(){
			tag.show();
			failed_tag.hide();
			$(this).text('只显示失败');
		}
	);
	/************************************************************************************************************************************************************/
	var i = 0,j=0;
	var timer = setTimeout("crawl()",100);

	crawl = function (){
		tag.append('<p>正在从<strong>'+CRAWL_FILES[j]+'</strong>抓取关键字<strong>' + SEARCH_WORD_VALUE[i] + '</strong> . . . . . . . . . . . . </p>');
		
		$.post('/intranet_television/search-word/start-crawl/',{'search_word':SEARCH_WORD_VALUE[i],'crawl_files_name':CRAWL_FILES[j]},function(json){
			if(json.error == true)
			{
				tag.children('p:last').html('从<strong>'+CRAWL_FILES[j]+'</strong>抓取关键字<strong>' + SEARCH_WORD_VALUE[i] + '</strong>失败.<strong>' + json.error_message + '</strong>');
				failed_tag.append('<p>从<strong>'+CRAWL_FILES[j]+'</strong>抓取关键字<strong>' + SEARCH_WORD_VALUE[i] + '</strong>失败.<strong>' + json.error_message + '</strong></p>');
			}
			else
			{
				tag.children('p:last').html('从<strong>'+CRAWL_FILES[j]+'</strong>抓取关键字<strong>' + SEARCH_WORD_VALUE[i] + '</strong>完成.');
			}		
			
			if(j == CRAWL_FILES.length-1)
			{
				if(i<SEARCH_WORD_VALUE.length-1)
				{
					j=0;
					i++;
					tag.append('<hr/>');
					setTimeout("crawl()",100);
				}
			}
			else
			{
				j++;
				setTimeout("crawl()",100);
			}			
		},'json');
	}
	/************************************************************************************************************************************************************/
})(jQuery);
