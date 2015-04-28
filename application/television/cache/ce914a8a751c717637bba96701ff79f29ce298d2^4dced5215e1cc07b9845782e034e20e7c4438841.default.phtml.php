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
  'unifunc' => 'content_4fdafb82b6f603_33632742',
  'has_nocache_code' => false,
  'cache_lifetime' => 3600,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fdafb82b6f603_33632742')) {function content_4fdafb82b6f603_33632742($_smarty_tpl) {?><!DOCTYPE html>
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
			<li >
			<a href="/movie_list_cc_01.html" data_id="01">电影</a>
		</li>
											<li >
			<a href="/movie_list_cc_02.html" data_id="02">电视</a>
		</li>
						<li class="active">
			<a href="/movie_list_cc_02003.html" data_id="02003">日韩剧</a>
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
				<img data="http://www.v933.com//pic/uploadimg/2012-6/33356.jpg" alt="黄色复仇草 " align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1386.html" title="黄色复仇草 ">黄色复仇草 </a></span></h1>
				<p class="movie_starring"><strong> 主演：李宥利 郑灿 ..</strong></p>
				<p class="movie_director"><strong> 导演： 崔恩静</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.inu5.com/uploadImg/12345.png" alt="爱情是什么 " align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1360.html" title="爱情是什么 ">爱情是什么 </a></span></h1>
				<p class="movie_starring"><strong> 主演：李顺载 尹汝贞..</strong></p>
				<p class="movie_director"><strong> 导演： 李顺载</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://i3.letvimg.com/vrs/201205/07/98c855b6f28549209b197bf607447696.jpg" alt="再一次向你求婚" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1300.html" title="再一次向你求婚">再一次向你求婚</a></span></h1>
				<p class="movie_starring"><strong> 主演：竹野内丰 和久井映见 山本裕典 仓科加奈 市川由衣 渡辺哲 松下洸平 橋本真実 入江甚仪 山野海 久松龍一 三浦力 光石研 小野寺昭</strong></p>
				<p class="movie_director"><strong> 导演：村上正典</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://img1.c3.letv.com/ptv/letv_vrs/2011/7/commic/f51051b7c3b743a48c8d8b18cfe692fd.jpg" alt="英雄奥特曼" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1182.html" title="英雄奥特曼">英雄奥特曼</a></span></h1>
				<p class="movie_starring"></p>
				<p class="movie_director"></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.v933.com//pic/uploadimg/2012-4/5107.jpg" alt="老千  韩国" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1149.html" title="老千  韩国">老千  韩国</a></span></h1>
				<p class="movie_starring"><strong> 主演：张赫 韩艺瑟 ..</strong></p>
				<p class="movie_director"><strong> 导演： 张赫</strong></p>
				<p> 上映：2012-01-01</p>
			</li>
					<li class="movie_item">
				<img data="http://img1.c3.letv.com/ptv/letv_vrs/2011/7/tv/e97af1f665a5478da4817052fba89976.jpg" alt="老千 韩剧电视剧共21集全" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1145.html" title="老千 韩剧电视剧共21集全">老千 韩剧电视剧共21集全</a></span></h1>
				<p class="movie_starring"><strong> 主演：张赫 韩艺瑟 姜成妍 金民俊 金甲洙</strong></p>
				<p class="movie_director"><strong> 导演：姜信孝</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://img.51dy.com/pic/2012327051099133.jpg" alt="爱情雨" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1071.html" title="爱情雨">爱情雨</a></span></h1>
				<p class="movie_starring"><strong> 主演：张根硕  林允儿  金时厚</strong></p>
				<p class="movie_director"><strong> 导演： 尹锡湖</strong></p>
				<p> 上映：2012-03-26</p>
			</li>
					<li class="movie_item">
				<img data="http://img1.c3.letv.com/ptv/letv_vrs/2011/11/80877610483644cea2514e522ccdde73.jpg" alt="绝对彼氏" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1054.html" title="绝对彼氏">绝对彼氏</a></span></h1>
				<p class="movie_starring"><strong> 主演：速水重道 相武纱季 水岛宏 中村俊介 佐佐木藏之介</strong></p>
				<p class="movie_director"><strong> 导演：土方政人</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.v933.com//pic/uploadimg/2012-4/21557.jpg" alt="都市传说之女" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_973.html" title="都市传说之女">都市传说之女</a></span></h1>
				<p class="movie_starring"><strong> 主演：长泽雅美 沟端..</strong></p>
				<p class="movie_director"><strong> 导演： 横地郁英</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.v933.com//pic/uploadimg/2012-4/21291.jpg" alt="赤道的男人" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_924.html" title="赤道的男人">赤道的男人</a></span></h1>
				<p class="movie_starring"><strong> 主演：严泰雄 吴智昊..</strong></p>
				<p class="movie_director"><strong> 导演： 李宝英</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.v933.com//pic/uploadimg/2012-4/21389.jpg" alt="屋塔房王世子" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_925.html" title="屋塔房王世子">屋塔房王世子</a></span></h1>
				<p class="movie_starring"><strong> 主演：朴有天 韩智敏..</strong></p>
				<p class="movie_director"><strong> 导演： 不详</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.v933.com//pic/uploadimg/2012-4/21720.jpg" alt="傻瓜妈妈" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_929.html" title="傻瓜妈妈">傻瓜妈妈</a></span></h1>
				<p class="movie_starring"><strong> 主演：金贤珠 申贤俊..</strong></p>
				<p class="movie_director"><strong> 导演： 李东勋</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.v933.com//pic/uploadimg/2012-4/21292.jpg" alt="屋塔房的王世子" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_930.html" title="屋塔房的王世子">屋塔房的王世子</a></span></h1>
				<p class="movie_starring"><strong> 主演：朴有天 韩智敏..</strong></p>
				<p class="movie_director"><strong> 导演： 李泰成</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.v933.com//pic/uploadimg/2012-4/21688.jpg" alt="爱的捆绑泰剧" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_932.html" title="爱的捆绑泰剧">爱的捆绑泰剧</a></span></h1>
				<p class="movie_starring"><strong> 主演：Kob Ste..</strong></p>
				<p class="movie_director"><strong> 导演： Kob</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://i0.letvimg.com/vrs/201205/16/b0d108ceadfc49a799fbfab4a61f2178.jpg" alt="世界奇妙物语2012春季特别篇电视剧共1集全" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_892.html" title="世界奇妙物语2012春季特别篇电视剧共1集全">世界奇妙物语2012春季特别篇电视剧共1集全</a></span></h1>
				<p class="movie_starring"><strong> 主演：铃木福 ともさかりえ 川冈大次郎 仲间由纪惠 永井大 高桥克典 白石美帆 滨田岳 渡辺いっけい 忽那汐里 石黑英雄 堀内敬子</strong></p>
				<p class="movie_director"><strong> 导演：高丸雅隆 小林義則 佐藤源太 植田泰史YasushiUeda 後藤康介</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://i-7.vcimg.com/31f9d40eee8fb1fbbf4a756ecaed3aeb133706(120x170)/thumb.jpg" alt="胜者即是正义 " align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_604.html" title="胜者即是正义 ">胜者即是正义 </a></span></h1>
				<p class="movie_starring"><strong> 主演：堺雅人   新垣结衣   生濑胜久 小池荣子</strong></p>
				<p class="movie_director"><strong> 导演：石川淳一</strong></p>
				<p> 上映：2012-04-17</p>
			</li>
					<li class="movie_item">
				<img data="http://www.44ss.net/PicDownload.aspx?pic=http%3a%2f%2f%7b0%7d%2f201202%2f26%2f20120226222451.jpg" alt="林师傅在首尔" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_556.html" title="林师傅在首尔">林师傅在首尔</a></span></h1>
				<p class="movie_starring"><strong> 主演：林永健 张瑞希 徐冬冬 宁丹琳 张佳宁 </strong></p>
				<p class="movie_director"><strong> 导演：余淳</strong></p>
				<p> 上映：2012-02-26</p>
			</li>
					<li class="movie_item">
				<img data="http://www.44ss.net/PicDownload.aspx?pic=http%3a%2f%2f%7b0%7d%2f201201%2f30%2f20120130102911.jpg" alt="粉爱粉爱你" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_548.html" title="粉爱粉爱你">粉爱粉爱你</a></span></h1>
				<p class="movie_starring"><strong> 主演：蓝正龙 周汤豪 邱翊橙 白梓轩 </strong></p>
				<p class="movie_director"><strong> 导演：刘俊杰</strong></p>
				<p> 上映：2012-01-29</p>
			</li>
					<li class="movie_item">
				<img data="http://www.44ss.net/PicDownload.aspx?pic=http%3a%2f%2f%7b0%7d%2f201203%2f23%2f20120323095355.jpg" alt="屋塔房王世子" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_547.html" title="屋塔房王世子">屋塔房王世子</a></span></h1>
				<p class="movie_starring"><strong> 主演：朴有天 韩智敏 李泰成 郑柔美 </strong></p>
				<p class="movie_director"><strong> 导演：申允燮</strong></p>
				<p> 上映：2012-03-21</p>
			</li>
					<li class="movie_item">
				<img data="http://img1.c3.letv.com/ptv/letv_vrs/2011/7/4b8bd5fe67e14f54a74673ccb64ad0bc.jpg" alt="哆啦A梦大雄与绿巨人传" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_482.html" title="哆啦A梦大雄与绿巨人传">哆啦A梦大雄与绿巨人传</a></span></h1>
				<p class="movie_starring"><strong> 主演：堀北真希  三宅裕司 </strong></p>
				<p class="movie_director"><strong> 导演：渡边步</strong></p>
				<p> 上映：2009-08-04</p>
			</li>
				</ul>
		<div class="page_bar">
			<ul class="pagebar"><li class="first">First</li><li class="prev">Prev</li><li class="active">1</li><li>2</li><li>3</li><li class="next">Next</li><li class="last" page="3">Last</li></ul><link href="http://www.inu5.dev/plugins/pagebar/list/pagebar.css" rel="stylesheet" type="text/css" /><script src="http://www.inu5.dev/plugins/pagebar/list/pagebar.js" type="text/javascript"></script>
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