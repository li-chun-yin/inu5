(function($){	
	$(document).ready(function(){
		$('div#movie_lists>ul>li.movie_item>img').map(function(){
			$(this).attr('src',$(this).attr('data'));
		});
	});
})(jQuery);