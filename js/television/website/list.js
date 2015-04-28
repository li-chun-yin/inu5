var SITETYPE	= location.search.split('=')[1];
var glists		= null;
(function($){
/******************************************************LIST*********************************************************************************/
	list_manager.prototype.set_row=function(json)
	{
		$tag =	'';
		$tag +=	'<a href="/television/website/hit?id='+json.website_id+'&url='+json.website_url+'" target="_blank">' + json.website_name + '</a>';
		return $tag;
	}	
	
	list_manager.prototype.event=function()
	{
	}
	
	$(document).ready(function(){
		glists = new list_manager('/television/website/get-websites/?sitetype='+SITETYPE);
		glists.set_root('#list_box');
//		glists.set_page_size(10);		
		glists.load();
	});
})(jQuery);