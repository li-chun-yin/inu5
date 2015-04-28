(function($){
		$('form[name="login_form"]').submit(function (){
			if($(':text[name="admin_id"]').val() == '' || $(':password[name="admin_pwd"]').val()=='')
			{
				return false;
			}
		});
})(jQuery);