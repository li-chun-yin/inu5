<?php /*%%SmartyHeaderCode:5640054154fdafa870e7799-77890222%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4dced5215e1cc07b9845782e034e20e7c4438841' => 
    array (
      0 => '/home/www/inu5/application/television/views/layouts/default.phtml',
      1 => 1338191380,
      2 => 'file',
    ),
    'ec999e6b1f626d0ef9a778915a5c1c6217345988' => 
    array (
      0 => '/home/www/inu5/application/television/views/common/header.phtml',
      1 => 1339656993,
      2 => 'file',
    ),
    '21a519ac2ae28acfdf2100b87bb66bbf4fbd4e6b' => 
    array (
      0 => '/home/www/inu5/application/television/views/common/category.phtml',
      1 => 1339660269,
      2 => 'file',
    ),
    '36bb752ddce48dd5b87b2048f54ffbe8a14e798d' => 
    array (
      0 => '/home/www/inu5/application/television/views/scripts/movie/detail.phtml',
      1 => 1339378518,
      2 => 'file',
    ),
    '771a458ec619eb14ec22dac91a8ace1d01345dfa' => 
    array (
      0 => '/home/www/inu5/application/television/views/common/footer.phtml',
      1 => 1339743723,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5640054154fdafa870e7799-77890222',
  'variables' => 
  array (
    'title' => 0,
    'keywords' => 0,
    'description' => 0,
    'header' => 0,
    'category' => 0,
    'content' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fdafa871e02e7_06557677',
  'cache_lifetime' => 3600,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fdafa871e02e7_06557677')) {function content_4fdafa871e02e7_06557677($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<meta name="baidu-site-verification" content="C9QKZT69wSVKSrnH" />
	<meta name="chinaz-site-verification" content="8b77bc1c-97ea-44d5-bc83-e3a2c68fa312" />
	<meta name="google-site-verification" content="CCbVahem7Ve83OKF1aWYXSYAXzBCvQ1ifNX55tiUlJ0" />
	<meta name="robots" content="index,follow">
	<meta name="googlebot" content="index,follow">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>宓捌姹[BD]</title>
	<meta name="keywords" content="影视导航,影视搜索,电影导航,电影搜索,影片导航,影片搜索,最新影片,最新电影,最新影视,电影网站,影视网站" />
	<meta name="description" content="　　该片讲述四个小主人公在峨眉山的一段魔幻奇遇经历，他们以团结勇敢，互助友爱，无私智慧的精神，与邪恶势力做斗争，最终打败邪恶势力，保护了自己的家园。
　　人气快女谈莉娜化身魔幻花仙子，带领四个人见人爱小勇士，在谐星阿龅和逄党龅呐只缘呐浜舷抡绞TG恶魔，逃出魔幻空间。
" />
	<link rel="shortcut icon" href="/favicon.ico" />
	<link href="/css/television/default.css" rel="stylesheet" type="text/css" />
	<script src="/js/jquery/jquery.js"></script>
	<script src="/js/television/default.js"></script>
</head>
<body>
	<div class="header">
		<style>
div#left_header{
	float:left;
	margin-left:50px;
	width:101px;
	height:60px;
}

div#left_header a{
	width:100%;
	height:100%;
	display:block;
}

div.search_box{
	margin-top:10px;
	float:left;
}

div#bdshare{
	float:left;
	margin-top:5px;
}

div.search_box input.search_word{
	margin-left:25px;
	border:1px solid #95C4F0;
	width:500px;
	height:28px;
	font-size:24px;
}

div.search_box input.search_submit{
	background:url('/images/television/blue_btn.png');
	height:32px;
	width:97px;
	padding:0;
	margin:0;
	border:0;
	cursor:pointer;
	font-size:14px;
	color: #FFFFFF;
	font-weight: bold;
	letter-spacing: 5px;
	vertical-align: bottom;
}
</style>
<div id="left_header">
	<a href="/"><img src="/images/Logo.png" alt="由我影视导航"/></a>
</div>
<div class="search_box">
	<form name="formsearch" method="get" action="/television/Search">
		<span><input type="text" name="searchword" value="" class="search_word" id="search_word"/></span>
		<span><input type="submit" value="由我搜索" class="search_submit"/></span>
	</form>
</div>
<div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare">
	<span class="bds_more"></span>
</div>
<link href="/js/jquery/autocomplete/styles.css" rel="stylesheet" type="text/css" />
<script src="/js/jquery/autocomplete/jquery.autocomplete-min.js"></script>
<script type="text/javascript">
(function($){
	$(document).ready(function(){
		$('form[name="formsearch"]').submit(function (){
			if($.trim($('#search_word').val()) == ''){
				return false;
			}
		});
		$('#search_word').autocomplete({
			'serviceUrl':'/television/search/get-expanded'
		});
	});
})(jQuery);
</script>
	</div>
	<div class="content">
		<div class="left">
			<style>
div.category ul{
	width:170px;
	padding:30px 30px 30px 0;
}

div.category ul li.active a{
	border-left:5px solid #DD4B39;
	color:#DD4B39;
}

div.category ul li a{
	border-left:5px solid #FFFFFF;
	font-size:13px;
	padding:5px 5px 5px 50px;
	width:100px;
	display:block;
	cursor:pointer;
	color:#0360AF;
}

div.category ul li a:hover{
	border-left:5px solid #EEEEEE;
	background:#EEEEEE;
}

div.category ul li.active a:hover{
	border-left:5px solid #DD4B39;
}
</style>
<div class="category">
	<ul>
		<li class="active"><a href="/movie_list_cc_0.html" data_id="0">所有</a></li>
			<li >
			<a href="/movie_list_cc_01.html" data_id="01">电影</a>
		</li>
											<li >
			<a href="/movie_list_cc_02.html" data_id="02">电视</a>
		</li>
									<li >
			<a href="/movie_list_cc_03.html" data_id="03">综艺</a>
		</li>
				<li >
			<a href="/movie_list_cc_04.html" data_id="04">动漫</a>
		</li>
				<li >
			<a href="/movie_list_cc_05.html" data_id="05">记录片</a>
		</li>
		</ul>
</div>
<script type="text/javascript">
(function($){
	var category	= [{"category_code":"01","category_name":"\u7535\u5f71"},{"category_code":"01001","category_name":"\u52a8\u4f5c\u7247"},{"category_code":"01002","category_name":"\u559c\u5267\u7247"},{"category_code":"01003","category_name":"\u79d1\u5e7b\u7247"},{"category_code":"01004","category_name":"\u7231\u60c5\u7247"},{"category_code":"01005","category_name":"\u6050\u6016\u7247"},{"category_code":"01006","category_name":"\u6218\u4e89\u7247"},{"category_code":"01007","category_name":"\u5267\u60c5\u7247"},{"category_code":"02","category_name":"\u7535\u89c6"},{"category_code":"02001","category_name":"\u6e2f\u53f0\u5267"},{"category_code":"02002","category_name":"\u5927\u9646\u5267"},{"category_code":"02003","category_name":"\u65e5\u97e9\u5267"},{"category_code":"02004","category_name":"\u6b27\u7f8e\u5267"},{"category_code":"02005","category_name":"\u6d77\u5916\u5267"},{"category_code":"03","category_name":"\u7efc\u827a"},{"category_code":"04","category_name":"\u52a8\u6f2b"},{"category_code":"05","category_name":"\u8bb0\u5f55\u7247"}];
	$(document).ready(function(){
		$('div.category>ul>li>a').mouseover(function(e){
			if(e.target == this){
				category_mouseover($(this));
			}
		});

		$('div.category>ul').mouseout(function(e){
			//alert(1);
			if(e.target == this){
				$('div.category>ul>li[for]').detach();
			}
		});

		$('div.category>ul>li').click(function(e){
			$('div.category>ul>li[class="active"]').removeClass('active');
			$(this).addClass('active');
		});
	});

	category_mouseover	= function(e){
		var this_id = e.attr('data_id');
		var ac_id = $('div.category>ul>li[class="active"]>a').attr('data_id');
		if(this_id == 0)return;
		if($('div.category>ul>li[for="'+this_id+'"]').length>0)return;
		for(i in category){
			if(category[i].category_code.substr(0,this_id.length) == this_id && category[i].category_code.length == this_id.length+3){
				if(category[i].category_code !== ac_id){
					e.parent().after(	'<li for="'+this_id+'" onclick="replaceActive($(this))">'+
										'	<a href="/movie_list_cc_'+category[i].category_code+'.html" data_id="'+category[i].category_code+'" onmouseover="category_mouseover($(this))">'+category[i].category_name+'</a>'+
										'</li>');
				}
			}
		}
	}
	replaceActive = function (e){
		var this_id = e.attr('for');
		$('div.category>ul>li[class="active"]').removeClass('active');
		e.addClass('active');
	}
})(jQuery);
</script>
		</div>
		<div class="center">
			<link href="/css/television/movie/detail.css" rel="stylesheet" type="text/css" />
<!-- *************************************************************************************************************** -->
<div id="movie_info">
	<img src="http://www.44ss.net/PicDownload.aspx?pic=http%3a%2f%2f%7b0%7d%2f201203%2f23%2f20120323162042.jpg" alt="宓捌姹[BD]" align="left"  onerror="this.src='/images/nopic.gif'"/>
	<ul>
		<li><strong>影片名： </strong> <h1>宓捌姹[BD]</h1></li>
		<li><strong>主 演： </strong> <span>谈莉娜,徐嘉苇,刘威,午马,张赫,张立威,</span></li>
		<li><strong>导 演： </strong> <span>郭明尔</span></li>
		<li><strong>上映日期： </strong> <span>2012-03-23</span></li>
		<li><strong>浏览次数： </strong> <span>95</span></li>
		<li><strong>是否验证： </strong> <span>是</span> <span class="red">(未通过验证的影片，可能存在病毒或者,无法正常观看。)</span></li>
		<li>
			<!-- Baidu Button BEGIN -->
		    <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
		        <span class="bds_more">分享到：</span>
		        <a class="bds_qzone">QQ空间</a>
		        <a class="bds_tsina">新浪微博</a>
		        <a class="bds_tqq">腾讯微博</a>
		        <a class="bds_renren">人人网</a>
		        <a class="bds_msn">MSN</a>
		    </div>
			<!-- Baidu Button END -->
		</li>
	</ul>
</div>
<div id="movie_link">
		<h1>宓捌姹[BD] 在线观看URL</h1>
	<ul>
			<li><a href="http://www.44ss.net/ShowMovie.aspx?name=%2587%25e5%25b5%25b0%25c6%25e6%25b1%25f8%255bBD%255d&hid=2464550&boxid=59203&hot=488&tn=%u56E7%u86CB%u5947%u5175%5BBD%5D&type=rmvb&size=1.02G&box=tupian" target="_blank" title="宓捌姹[BD]">地址1</a></li>
		</ul>
	
	</div>
<div id="movie_detail">
	<h1>宓捌姹[BD] 影片介绍</h1>
	<div class="detail">
		　　该片讲述四个小主人公在峨眉山的一段魔幻奇遇经历，他们以团结勇敢，互助友爱，无私智慧的精神，与邪恶势力做斗争，最终打败邪恶势力，保护了自己的家园。
　　人气快女谈莉娜化身魔幻花仙子，带领四个人见人爱小勇士，在谐星阿龅和逄党龅呐只缘呐浜舷抡绞TG恶魔，逃出魔幻空间。

	</div>
</div>
<!-- pintlun BEGIN -->
<script type='text/javascript' charset='utf-8' src='http://open.denglu.cc/connect/commentcode?appid=46895denQgK0uBbbyMhOi0mjSeV1O5&postid=444'></script>
<!-- pinglun END -->
		</div>
		<div style="clear:both;"></div>
	</div>
	<div class="footer">
		<style>
ul.bottom_nav{
	margin:auto;
	width: 295px;
}
ul.bottom_nav li{
	float:left;
	margin-left:10px;
}
p#copyright{
	clear:both;
	text-align:center;
	line-height:3em;
}
</style>
<ul class="bottom_nav">
	<li><a href="/television/etc/page?name=about">关于</a></li>
	<li><a href="/television/etc/page?name=logs">本站日志</a></li>
	<li><a href="/television/etc/page?name=site_submit">提交新站</a></li>
	<li><a href="http://www.gaotetv.com/" title="高特影视网" target="_blank">高特影视网</a></li>
	<li><a href="http://www.tiantianyingshi.com/" title="天天影视" target="_blank">天天影视</a></li>
</ul>
<p id="copyright">Copyright &copy; 2012 inu5.com 沪ICP备 12011640 号</p>

<div style="display:none;">
	<script src="http://s25.cnzz.com/stat.php?id=4075683&web_id=4075683" language="JavaScript"></script>
</div>
<!-- Baidu Button BEGIN -->
<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=688980" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
	document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
</script>
<!-- Baidu Button END -->
	</div>
</body>
</html>
<?php }} ?>