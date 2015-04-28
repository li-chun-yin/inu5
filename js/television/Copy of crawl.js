window.document.write(	'<iframe name="inu5_crawl_frame" style="display:none"></iframe>');
window.document.write(	'<form name="inu5_crawl_form" method="post" action="http://www.inu5.dev/television/crawl/index" target="inu5_crawl_frame" style="display:none;">'+
						'	<input type="hidden" name="s_inu5_movie_name" id="s_inu5_movie_name" value="undefined" />'+
						'	<input type="hidden" name="s_inu5_movie_img_url" id="s_inu5_movie_img_url" value="" />'+
						'	<input type="hidden" name="s_inu5_movie_starring" id="s_inu5_movie_starring" value="" />'+
						'	<input type="hidden" name="s_inu5_movie_director" id="s_inu5_movie_director" value="" />'+
						'	<input type="hidden" name="s_inu5_movie_release_date" id="s_inu5_movie_release_date" value="" />'+
						'	<input type="hidden" name="s_inu5_fk_category_code" id="s_inu5_fk_category_code" value="01" />'+
						'	<input type="hidden" name="s_inu5_movie_link" id="s_inu5_movie_link" value="" />'+
						'	<input type="hidden" name="s_inu5_movie_link_type" id="s_inu5_movie_link_type" value="" />'+
						'	<input type="hidden" name="s_inu5_movie_description" id="s_inu5_movie_description" value="" />'+
						'	<input type="hidden" name="s_inu5_movie_area" id="s_inu5_movie_area" value="" />'+
						'	<input type="hidden" name="s_inu5_movie_language" id="s_inu5_movie_language" value="" />'+
						'	<input type="submit" id="inu5_crawl_submit" />'+
						'</form>');
try{
	if( typeof(inu5_movie_name) == 'undefined' || ! inu5_movie_name ){
		document.getElementById('s_inu5_movie_name').value = encodeURIComponent(document.title);
	}else{
		document.getElementById('s_inu5_movie_name').value = encodeURIComponent(inu5_movie_name);
	}
}catch(e){}
try{
	if( typeof(inu5_movie_img_url) == 'undefined' || ! inu5_movie_img_url ){
		document.getElementById('s_inu5_movie_img_url').value = encodeURIComponent(document.getElementsByTagName('img')[0].src);
	}else{
		document.getElementById('s_inu5_movie_img_url').value = encodeURIComponent(inu5_movie_img_url);
	}
}catch(e){}
try{
	if( typeof(inu5_movie_starring) != 'undefined' && inu5_movie_starring ){
		document.getElementById('s_inu5_movie_starring').value = encodeURIComponent(inu5_movie_starring);
	}
}catch(e){}
try{
	if( typeof(inu5_movie_director) != 'undefined' || inu5_movie_director ){
		document.getElementById('s_inu5_movie_director').value = encodeURIComponent(inu5_movie_director);
	}
}catch(e){}
try{
	if( typeof(inu5_movie_release_date)	!= 'undefined' || inu5_movie_release_date ){
		document.getElementById('s_inu5_movie_release_date').value = encodeURIComponent(inu5_movie_release_date);
	}
}catch(e){}
try{
	if( typeof(inu5_movie_category)	== 'undefined' || ! inu5_movie_category ){
		document.getElementById('s_inu5_fk_category_code').value = encodeURIComponent('01');
	}else{
		document.getElementById('s_inu5_fk_category_code').value = encodeURIComponent(inu5_movie_category);
	}
}catch(e){}
try{
	if( typeof(inu5_movie_link) == 'undefined' || ! inu5_movie_link){
		document.getElementById('s_inu5_movie_link').value = encodeURIComponent(location.href);
	}else{
		document.getElementById('s_inu5_movie_link').value = encodeURIComponent(inu5_movie_link);
	}
}catch(e){}
try{
	if( typeof(inu5_movie_link_type) == 'undefined' || ! inu5_movie_link_type ){
		document.getElementById('s_inu5_movie_link_type').value = encodeURIComponent('ONLINE');
	}else{
		document.getElementById('s_inu5_movie_link_type').value = encodeURIComponent(inu5_movie_link_type);
	}
}catch(e){}
try{
	if( typeof(inu5_movie_description) == 'undefined' || ! inu5_movie_description ){
		document.getElementById('s_inu5_movie_description').value= encodeURIComponent(document.getElementsByTagName('meta')['description'].content);
	}else{
		document.getElementById('s_inu5_movie_description').value= encodeURIComponent(inu5_movie_description);
	}
}catch(e){}
try{
	if( typeof(inu5_movie_area) != 'undefined' || inu5_movie_area ){
		document.getElementById('s_inu5_movie_area').value = encodeURIComponent(inu5_movie_area);
	}
}catch(e){}
try{
	if( typeof(inu5_movie_language) != 'undefined' || inu5_movie_language ){
		document.getElementById('s_inu5_movie_language').value = encodeURIComponent(inu5_movie_language);
	}
}catch(e){}

document.inu5_crawl_form.submit();
