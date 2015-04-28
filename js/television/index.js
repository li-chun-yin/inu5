(function($){
	$(document).ready(function(){
		var zoom_li		= $('div.action_content>ul>li.zoom');
		var is_animate	= false;
		/*********************************************************************************************************************/
		$('form[name="formsearch"]').submit(function (){
			if($.trim($('#search_word').val()) == ''){
				return false;
			}
		});
		$('#search_word').autocomplete({serviceUrl:'/television/search/get-expanded'});
		var action_timer = setInterval("autoAction()",10000);

		autoAction = function(){
			$('a#action_next').click();
		};
		$('a#action_prev').click(function(){
			if(is_animate){
				return;
			}else{
				is_animate = true;
			}
			var ul		= $('div.action_content>ul');
			var movie_id= $('div.action_content>ul>li:eq(9)').attr('data_id');
			ul.animate({'margin-left':(-54-216)}, 1000,function(){
				zoom_li.removeClass('zoom');
				var tag	= $('div.action_content>ul>li:first').clone(true);			
				$('div.action_content>ul>li:first').detach();
				ul.append(tag);
				ul.css({'margin-left':-216});			
				is_animate	= false;
				zoom_li	= $('div.action_content>ul>li:eq(8)').addClass('zoom');
			});	
			movie_change(movie_id);
		});
		
		$('a#action_next').click(function(){
			if(is_animate){
				return;
			}else{
				is_animate = true;
			}
			var ul		= $('div.action_content>ul');
			var movie_id= $('div.action_content>ul>li:eq(7)').attr('data_id');
			ul.animate({'margin-left':(54-216)}, 1000,function(){
				zoom_li.removeClass('zoom');
				var tag	= $('div.action_content>ul>li:last').clone(true);			
				$('div.action_content>ul>li:last').detach();
				ul.prepend(tag);
				ul.css({'margin-left':-216});			
				is_animate	= false;
				zoom_li	= $('div.action_content>ul>li:eq(8)').addClass('zoom');
			});
			movie_change(movie_id);
		});
		
		$('div.action_content>ul>li').hover(
			function(){
				clearInterval(action_timer);
				zoom_li.removeClass('zoom');
				$(this).addClass('zoom');
			},
			function(){
				action_timer=setInterval("autoAction()",5000);
				$(this).removeClass('zoom');
				if($('div.action_content>ul>li.zoom').length == 0){
					zoom_li.addClass('zoom');
				}
			}	
		);		

		$('div.action_content>ul>li').click(function(){	
			if(is_animate){
				return;
			}else{
				is_animate	= true;
			}
			var index	= $('div.action_content>ul>li').index($(this));
			var ul		= $('div.action_content>ul');
			var movie_id= $(this).attr('data_id');
			if(index===8){
				is_animate	= false;
				return;
			}
			if(index>8){
				var step	= index-9+1;
				var step_px	= step*54+216;
			
				ul.animate({'margin-left':-step_px}, 1000,function(){
					for(var i=0; i<step;i++){
						var tag = $('div.action_content>ul>li').eq(i).clone(true);
						$('div.action_content>ul>li').eq(i).detach();
						ul.append(tag);
					}
					ul.css({'margin-left':-216});
					is_animate	= false;
				});		
			}else if(index<8){
				var step	= 9-index-1;
				var step_px	= step*54-216;
				var len = $('div.action_content>ul>li').length;
				$('div.action_content>ul').animate({'margin-left':step_px}, 1000,function(){
					for(var i= 0; i<step;i++){
						var tag = $('div.action_content>ul>li').eq(len-i-1).clone(true);
						$('div.action_content>ul>li').eq(len-i-1).detach();
						ul.prepend(tag);
					}
					ul.css({'margin-left':-216});
					is_animate	= false;
				});
			}		
			zoom_li = $(this);			
			movie_change(movie_id);
		});
		
		$('div#action_bar>.action_content>ul>li>img,div#recommend_movie_detail>div.detail>.left>a>img').map(function(){
			$(this).attr('src',$(this).attr('data'));
		});
	});
	
	function movie_change(movie_id){
		$('div.recommend_movie_detail>div[class="detail action"]').fadeOut(2000,function(){
			$('div.recommend_movie_detail>div[class="detail action"]').removeClass('action');
		});
		$('div.recommend_movie_detail>div[data_id="'+movie_id+'"]').fadeIn(2000,function(){
			$('div.recommend_movie_detail>div[data_id="'+movie_id+'"]').addClass('action');
		});
	}
})(jQuery);