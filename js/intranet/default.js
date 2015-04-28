var DOMAIN = location.host.split('.');
	DOMAIN.shift();
	DOMAIN = DOMAIN.join('.');
(function($){
	$(document).ready(function(){
		$('#open_menu').click(function(){
			var menu_status = $(this).prev('div.menu').css('display');
			if(menu_status == 'block'){
				$(this).prev('div.menu').css('display','none');
				$(this).css('background-position','-44px center');
				$(this).css('border-right','1px solid #858585');
				$(this).prev('div.menu').parent('div.left').css('width','6px');
				$('div.center').css('margin-left','0px');
			}else{
				$(this).prev('div.menu').css('display','block');
				$(this).css('background-position','1px center');
				$(this).css('border-right','none');
				$(this).prev('div.menu').parent('div.left').css('width','206px');
				$('div.center').css('margin-left','206px');
			}
		});
		
		$('.logout').click(function(){
			if(confirm('要退出登录吗?')){
				location.href='/intranet/login/dismiss';
			}
		});
	});
})(jQuery);

function open_up_img(return_tag){
	var upImg	= window.open('/intranet/upimg/?return_tag='+return_tag,'upImg','width=400,height=20');
	upImg.focus();
}