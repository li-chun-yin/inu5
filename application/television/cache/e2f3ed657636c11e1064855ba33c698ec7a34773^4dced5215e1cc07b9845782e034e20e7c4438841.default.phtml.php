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
  'unifunc' => 'content_4fdafb8aa279a1_22481121',
  'has_nocache_code' => false,
  'cache_lifetime' => 3600,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fdafb8aa279a1_22481121')) {function content_4fdafb8aa279a1_22481121($_smarty_tpl) {?><!DOCTYPE html>
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
			<a href="/movie_list_cc_02002.html" data_id="02002">大陆剧</a>
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
				<img data="http://www.inu5.com/uploadImg/JBG.jpg" alt="仁显王后的男人" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1397.html" title="仁显王后的男人">仁显王后的男人</a></span></h1>
				<p class="movie_starring"><strong> 主演：刘仁娜 池贤宇 金镇佑 柯得熙</strong></p>
				<p class="movie_director"></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.inu5.com/uploadImg/22222.jpg" alt="金太郎的幸福生活" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1395.html" title="金太郎的幸福生活">金太郎的幸福生活</a></span></h1>
				<p class="movie_starring"><strong> 主演：宋丹丹 李小璐 王雷 范明 杜源</strong></p>
				<p class="movie_director"><strong> 导演：余淳</strong></p>
				<p> 上映：2012-05-22</p>
			</li>
					<li class="movie_item">
				<img data="http://img.51dy.com/pic/img/2011-12/791.jpg" alt="新拿什么拯救你我的爱人" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1367.html" title="新拿什么拯救你我的爱人">新拿什么拯救你我的爱人</a></span></h1>
				<p class="movie_starring"><strong> 主演：董璇 张歆艺 贾乃亮 崔林</strong></p>
				<p class="movie_director"></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.v933.com//pic/uploadimg/2012-4/30847.jpg" alt="拿什么满足你，我的婆婆" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1362.html" title="拿什么满足你，我的婆婆">拿什么满足你，我的婆婆</a></span></h1>
				<p class="movie_starring"><strong> 主演：张凯丽 姚芊羽..</strong></p>
				<p class="movie_director"><strong> 导演： 王小康</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.v933.com//pic/uploadimg/2012-4/10158.jpg" alt="你到底要什么" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1363.html" title="你到底要什么">你到底要什么</a></span></h1>
				<p class="movie_starring"><strong> 主演：胡可 王亚楠 ..</strong></p>
				<p class="movie_director"><strong> 导演： 胡可</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://img1.c3.letv.com/ptv/letv_vrs/2011/7/tv/2d241f62baeb4171ba3b08dad1b5836c.jpg" alt="你到底要什么" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1349.html" title="你到底要什么">你到底要什么</a></span></h1>
				<p class="movie_starring"><strong> 主演：胡可 王亚楠 陈刚 杨明娜 叶芮羽</strong></p>
				<p class="movie_director"><strong> 导演：李源 李楠</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.inu5.com/uploadImg/122.jpg" alt="牵牛的夏天" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1345.html" title="牵牛的夏天">牵牛的夏天</a></span></h1>
				<p class="movie_starring"><strong> 主演：彭于晏 张檬 张峻宁 冯媛甄</strong></p>
				<p class="movie_director"><strong> 导演：蒋家俊</strong></p>
				<p> 上映：2012-05-22</p>
			</li>
					<li class="movie_item">
				<img data="http://img.51dy.com/pic/e189a8c4392e4c84b78990ce8a1e65c4.jpg" alt="第一次的亲密接触（电视剧）" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1319.html" title="第一次的亲密接触（电视剧）">第一次的亲密接触（电视剧）</a></span></h1>
				<p class="movie_starring"><strong> 主演：佟大为 孙锂华 薛佳凝 徐洪浩 王海珍</strong></p>
				<p class="movie_director"></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.v933.com//pic/uploadimg/2012-4/5055.jpg" alt="第一次亲密接触" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1315.html" title="第一次亲密接触">第一次亲密接触</a></span></h1>
				<p class="movie_starring"><strong> 主演：佟大为，孙锂华..</strong></p>
				<p class="movie_director"><strong> 导演： 佟大为</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.v933.com//pic/uploadimg/2012-4/3345.jpg" alt="我的第一次" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1316.html" title="我的第一次">我的第一次</a></span></h1>
				<p class="movie_starring"><strong> 主演：阿雅 柳翰雅 ..</strong></p>
				<p class="movie_director"><strong> 导演： 未知</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://i1.letvimg.com/vrs/201203/22/e189a8c4392e4c84b78990ce8a1e65c4.jpg" alt="第一次的亲密接触" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1299.html" title="第一次的亲密接触">第一次的亲密接触</a></span></h1>
				<p class="movie_starring"><strong> 主演：佟大为 孙锂华 薛佳凝 徐洪浩 王海珍</strong></p>
				<p class="movie_director"><strong> 导演：崔钟</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://img.51dy.com/pic/bf48756324170b0c0c33fa85.jpg" alt="亲爱的回家" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1250.html" title="亲爱的回家">亲爱的回家</a></span></h1>
				<p class="movie_starring"><strong> 主演：韩雪，蒋毅，于娜，胡兵，陆昱霖，骆达华</strong></p>
				<p class="movie_director"><strong> 导演：罗灿然</strong></p>
				<p> 上映：2012-02-25</p>
			</li>
					<li class="movie_item">
				<img data="http://img.51dy.com/pic/201231214244654171.jpg" alt="激情燃烧的岁月3之国脉" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1245.html" title="激情燃烧的岁月3之国脉">激情燃烧的岁月3之国脉</a></span></h1>
				<p class="movie_starring"><strong> 主演：冯国庆 刘跃军 涂凌 郭东文 郭晓晓 郭铁成</strong></p>
				<p class="movie_director"><strong> 导演：安战军</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://img.51dy.com/pic/img/2011-12/994.jpg" alt="激情燃烧的岁月" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1246.html" title="激情燃烧的岁月">激情燃烧的岁月</a></span></h1>
				<p class="movie_starring"><strong> 主演：孙海英 黄海波 吕丽萍 吕晓禾 陈丽娜</strong></p>
				<p class="movie_director"><strong> 导演： 康洪雷</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.v933.com//pic/uploadimg/2012-4/22318.jpg" alt="激情燃烧的岁月2  大陆" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1243.html" title="激情燃烧的岁月2  大陆">激情燃烧的岁月2  大陆</a></span></h1>
				<p class="movie_starring"><strong> 主演：赵毅 史林 李..</strong></p>
				<p class="movie_director"><strong> 导演： 武斐</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://img1.c3.letv.com/ptv/letv_vrs/2011/7/tv/ae8c0eee457344e0bcbf9219ccde4da7.jpg" alt="画皮电视剧共34集全" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1208.html" title="画皮电视剧共34集全">画皮电视剧共34集全</a></span></h1>
				<p class="movie_starring"><strong> 主演：杨幂 薛凯琪 陈怡蓉 李宗翰 凌潇肃</strong></p>
				<p class="movie_director"><strong> 导演：高林豹</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://i.6.cn/tu.6.cn/e8/8a/f1/0c22e8b703fc4c1ffbd431695272e1fb.jpg" alt="被遗弃的秘密" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1197.html" title="被遗弃的秘密">被遗弃的秘密</a></span></h1>
				<p class="movie_starring"><strong> 主演：甘婷婷 乔振宇 蒋梦婕 罗晋 何晟铭 藏心术</strong></p>
				<p class="movie_director"></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://img.51dy.com/pic/8605f5f86c179045d9f9fd83.jpg" alt="心术" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1195.html" title="心术">心术</a></span></h1>
				<p class="movie_starring"><strong> 主演：吴秀波 海清 张嘉译 陈赫 杨紫 韩雨芹 于毅 张子枫 王诗槐 姚安濂 胡可</strong></p>
				<p class="movie_director"></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://t3.baidu.com/it/u=2509103926,4249047352&fm=20" alt="叶落长安" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1169.html" title="叶落长安">叶落长安</a></span></h1>
				<p class="movie_starring"><strong> 主演：陈小艺  倪大红  刘涛</strong></p>
				<p class="movie_director"><strong> 导演：姚晓峰</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.ddoo.cc/pic/uploadimg/2012-5/201252113322476479.jpg" alt="再婚进行时" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1168.html" title="再婚进行时">再婚进行时</a></span></h1>
				<p class="movie_starring"><strong> 主演：姚芊羽  张铎  高露</strong></p>
				<p class="movie_director"><strong> 导演：李威</strong></p>
				<p> 上映：2011-11-02</p>
			</li>
				</ul>
		<div class="page_bar">
			<ul class="pagebar"><li class="first">First</li><li class="prev">Prev</li><li class="active">1</li><li>2</li><li>3</li><li>4</li><li>5</li><li>6</li><li>7</li><li class="next">Next</li><li class="last" page="7">Last</li></ul><link href="http://www.inu5.dev/plugins/pagebar/list/pagebar.css" rel="stylesheet" type="text/css" /><script src="http://www.inu5.dev/plugins/pagebar/list/pagebar.js" type="text/javascript"></script>
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