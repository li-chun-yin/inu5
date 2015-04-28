<?php /*%%SmartyHeaderCode:9113675554fdafb7fc9b770-99053508%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
    '26d9e20788657bebe7b12b1ed03c68b9a3da17ef' => 
    array (
      0 => '/home/www/inu5/application/television/views/scripts/movie/list.phtml',
      1 => 1339657976,
      2 => 'file',
    ),
    '771a458ec619eb14ec22dac91a8ace1d01345dfa' => 
    array (
      0 => '/home/www/inu5/application/television/views/common/footer.phtml',
      1 => 1339743723,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9113675554fdafb7fc9b770-99053508',
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4fdafb8827ece4_59298327',
  'has_nocache_code' => false,
  'cache_lifetime' => 3600,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fdafb8827ece4_59298327')) {function content_4fdafb8827ece4_59298327($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<meta name="baidu-site-verification" content="C9QKZT69wSVKSrnH" />
	<meta name="chinaz-site-verification" content="8b77bc1c-97ea-44d5-bc83-e3a2c68fa312" />
	<meta name="google-site-verification" content="CCbVahem7Ve83OKF1aWYXSYAXzBCvQ1ifNX55tiUlJ0" />
	<meta name="robots" content="index,follow">
	<meta name="googlebot" content="index,follow">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>由我影视导航|为您轻松找到想看的影片而努力!</title>
	<meta name="keywords" content="影视导航,影视搜索,电影导航,电影搜索,影片导航,影片搜索,最新影片,最新电影,最新影视,电影网站,影视网站" />
	<meta name="description" content="由我影视导航,是一个专业影视剧搜索网站,只要你想看,一定帮你搜到影片为目标。" />
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
		<li ><a href="/movie_list_cc_0.html" data_id="0">所有</a></li>
			<li class="active">
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
			<link href="/css/television/movie/list.css" rel="stylesheet" type="text/css" />
<!-- *************************************************************************************************************** -->
<div class="movie_lists" id="movie_lists">
			<ul>
					<li class="movie_item">
				<img data="http://www.inu5.com/uploadImg/10000000000.png" alt="兔子洞" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1423.html" title="兔子洞">兔子洞</a></span></h1>
				<p class="movie_starring"><strong> 主演：妮可·基德曼 艾伦·艾克哈特 黛安·韦斯特 迈尔斯·特勒 坦米·布兰查德</strong></p>
				<p class="movie_director"><strong> 导演：约翰·卡梅隆·米切尔</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.inu5.com/uploadImg/120000.jpg" alt="喜剧明星" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1415.html" title="喜剧明星">喜剧明星</a></span></h1>
				<p class="movie_starring"><strong> 主演：Kevin Carlin</strong></p>
				<p class="movie_director"></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.inu5.com/uploadImg/120000.jpg" alt="奢华喜剧第一季" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1416.html" title="奢华喜剧第一季">奢华喜剧第一季</a></span></h1>
				<p class="movie_starring"><strong> 主演：尔・费丁 迈克尔 菲尔</strong></p>
				<p class="movie_director"></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.inu5.com/uploadImg/1444.jpg" alt="人间喜剧" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1417.html" title="人间喜剧">人间喜剧</a></span></h1>
				<p class="movie_starring"><strong> 主演：杜汶泽 王祖蓝 徐天佑 薛凯琪 许绍雄 罗凯珊 C君 吴家丽 李曼筠 李力持 罗永昌 郑保瑞 郭子健 冯志强 潘恒生 黄又南</strong></p>
				<p class="movie_director"></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.inu5.com/uploadImg/234755555.jpg" alt="喜剧之王" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1418.html" title="喜剧之王">喜剧之王</a></span></h1>
				<p class="movie_starring"><strong> 主演：周星驰 张柏芝 莫文蔚 吴孟达 林子善 田启文 李兆基 成龙</strong></p>
				<p class="movie_director"></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.inu5.com/uploadImg/21201000.jpg" alt="我为喜剧狂" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1419.html" title="我为喜剧狂">我为喜剧狂</a></span></h1>
				<p class="movie_starring"><strong> 主演：蒂娜・菲   崔西・摩根  简・科拉克斯基  亚历克・鲍德温</strong></p>
				<p class="movie_director"></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.inu5.com/uploadImg/UG$4~}V]%Y30Y26()NDD2PM.jpg" alt="里约性喜剧" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1420.html" title="里约性喜剧">里约性喜剧</a></span></h1>
				<p class="movie_starring"><strong> 主演：夏洛特・兰普林 比尔・普尔曼</strong></p>
				<p class="movie_director"><strong> 导演：Jonathan,Nossiter</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.inu5.com/uploadImg/65456666.jpg" alt="爱情喜剧" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1421.html" title="爱情喜剧">爱情喜剧</a></span></h1>
				<p class="movie_starring"><strong> 主演：香里奈 北乃纪伊 田中圭</strong></p>
				<p class="movie_director"></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.inu5.com/uploadImg/1000.jpg" alt="我为喜剧狂第五季" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1422.html" title="我为喜剧狂第五季">我为喜剧狂第五季</a></span></h1>
				<p class="movie_starring"><strong> 主演：Tina Fey Tracy Morgan  Scott Adsit</strong></p>
				<p class="movie_director"></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.inu5.com/uploadImg/12222.jpg" alt="喜剧电影 爆笑" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1412.html" title="喜剧电影 爆笑">喜剧电影 爆笑</a></span></h1>
				<p class="movie_starring"></p>
				<p class="movie_director"></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.inu5.com/uploadImg/1356545555.jpg" alt="我为喜剧狂第六季" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1413.html" title="我为喜剧狂第六季">我为喜剧狂第六季</a></span></h1>
				<p class="movie_starring"><strong> 主演：Tina Fey Alec Baldwin Tracy</strong></p>
				<p class="movie_director"></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.v933.com//pic/uploadimg/2012-4/24739.jpg" alt="我为喜剧狂  欧美" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1402.html" title="我为喜剧狂  欧美">我为喜剧狂  欧美</a></span></h1>
				<p class="movie_starring"><strong> 主演：演: 蒂娜・菲..</strong></p>
				<p class="movie_director"><strong> 导演： 暂无相关</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.v933.com//pic/uploadimg/2012-4/15742.jpg" alt="里约性喜剧  美国" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1403.html" title="里约性喜剧  美国">里约性喜剧  美国</a></span></h1>
				<p class="movie_starring"><strong> 主演：夏洛特・兰普林..</strong></p>
				<p class="movie_director"><strong> 导演： 夏洛特</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.v933.com//pic/uploadimg/2012-4/19740.jpg" alt="奢华喜剧第一季  美国" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1404.html" title="奢华喜剧第一季  美国">奢华喜剧第一季  美国</a></span></h1>
				<p class="movie_starring"><strong> 主演：诺尔・费丁 迈..</strong></p>
				<p class="movie_director"><strong> 导演： 诺尔・费丁</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.v933.com//pic/uploadimg/2012-4/17648.jpg" alt="喜剧之王  香港" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1406.html" title="喜剧之王  香港">喜剧之王  香港</a></span></h1>
				<p class="movie_starring"><strong> 主演：周星驰 莫文蔚..</strong></p>
				<p class="movie_director"><strong> 导演： 周星驰,李力持</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.v933.com//pic/uploadimg/2012-4/16104.gif" alt="权力喜剧  美国" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1407.html" title="权力喜剧  美国">权力喜剧  美国</a></span></h1>
				<p class="movie_starring"><strong> 主演：伊莎贝尔・赫波..</strong></p>
				<p class="movie_director"><strong> 导演： 克劳德・夏布洛尔</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.v933.com//pic/uploadimg/2012-4/30902.jpg" alt="我为喜剧狂第5季  欧美" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1408.html" title="我为喜剧狂第5季  欧美">我为喜剧狂第5季  欧美</a></span></h1>
				<p class="movie_starring"><strong> 主演：Tina Fe..</strong></p>
				<p class="movie_director"><strong> 导演： 暂无相关</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.inu5.com/uploadImg/jbc.jpg" alt="越狱" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1401.html" title="越狱">越狱</a></span></h1>
				<p class="movie_starring"><strong> 主演：查理.卓别林 艾德娜.珀薇安丝 埃里克.坎贝尔</strong></p>
				<p class="movie_director"><strong> 导演：查理.卓别林</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.v933.com//pic/uploadimg/2012-4/20048.jpg" alt="复仇者" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1387.html" title="复仇者">复仇者</a></span></h1>
				<p class="movie_starring"><strong> 主演：拉尔夫・费因斯..</strong></p>
				<p class="movie_director"><strong> 导演： 拉尔夫</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.inu5.com/uploadImg/12546849684684.jpg" alt="灵魂战车2：复仇之魂" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1390.html" title="灵魂战车2：复仇之魂">灵魂战车2：复仇之魂</a></span></h1>
				<p class="movie_starring"><strong> 主演：尼古拉斯・凯奇..</strong></p>
				<p class="movie_director"><strong> 导演： 暂无相关</strong></p>
				<p> 上映：2011-12-11</p>
			</li>
				</ul>
		<div class="page_bar">
			<ul class="pagebar"><li class="first">First</li><li class="prev">Prev</li><li class="active">1</li><li>2</li><li>3</li><li>4</li><li>5</li><li>6</li><li>7</li><li>8</li><li>9</li><li>10</li><li class="next">Next</li><li class="last" page="24">Last</li></ul><link href="http://www.inu5.dev/plugins/pagebar/list/pagebar.css" rel="stylesheet" type="text/css" /><script src="http://www.inu5.dev/plugins/pagebar/list/pagebar.js" type="text/javascript"></script>
		</div>
	</div>
<!-- ********************************************************************** -->
<script src="/js/television/movie/list.js"></script>
<!-- ********************************************************************** -->
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