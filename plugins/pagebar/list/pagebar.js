(function($){
	$(document).ready(function(){
		$('ul.pagebar>li').click(function(){
			if($(this).attr('class') == 'active')return;
			var current_page = 0;
		
			if($(this).text() == 'First'){
				if($('ul.pagebar>li[class="active"]').text() == 1)return;
				current_page = 1;
			}else if($(this).text() == 'Prev'){			
				current_page = $('ul.pagebar>li[class="active"]').prev().text();
				if(current_page == 'Prev') return;
			}else if($(this).text() == 'Next'){
				current_page = $('ul.pagebar>li[class="active"]').next().text();
				if(current_page == 'Next') return;
			}else if($(this).text() == 'Last'){
				if($('ul.pagebar>li[class="active"]').text() == $(this).attr('page'))return;
				current_page = $(this).attr('page');
			}else{
				current_page = $(this).text();
			}
			
			if(!isNaN($(this).text())){
				$('ul.pagebar>li[class="active"]').removeClass('active');
				$(this).addClass('active');	
			}
			
			if(location.href.search(/_p_/)>0){
				location.href	= location.href.replace(/_p_\d+/i,'_p_'+current_page);
			}else{
				location.href	= location.href.replace(/(\.html)/,'_p_'+current_page+'$1');
			}
		});
	});
})(jQuery);