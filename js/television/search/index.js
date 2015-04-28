(function($){
	$('form[name="customer_valuation_form"]>:submit').click(function(){
		$.post('/television/search/update-useful-flag',$('form[name="customer_valuation_form"]').serialize(),function(json){
			if(	json.error	== true)
			{
				return alert('系统错误.');
			}
			$('div.customer_valuation').html('<p align="center"> 谢谢你！</p>');
		},'json');
	});
	
	$(document).ready(function(){
		$('div#search_lists>ul>li.movie_item>img').map(function(){
			$(this).attr('src',$(this).attr('data'));
		});
	});
})(jQuery);