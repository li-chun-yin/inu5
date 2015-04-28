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
  'unifunc' => 'content_4fdafb8e8035f2_42891661',
  'has_nocache_code' => false,
  'cache_lifetime' => 3600,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fdafb8e8035f2_42891661')) {function content_4fdafb8e8035f2_42891661($_smarty_tpl) {?><!DOCTYPE html>
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
				<img data="http://img1.c3.letv.com/ptv/letv_vrs/2011/7/tv/9da20bdac2f94d328ccdcb0b81248acc.jpg" alt="唐山大地震电视剧共20集全" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1166.html" title="唐山大地震电视剧共20集全">唐山大地震电视剧共20集全</a></span></h1>
				<p class="movie_starring"><strong> 主演：张延 黄海波 李雪健 谷智鑫 贾一平</strong></p>
				<p class="movie_director"><strong> 导演：钟少雄</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://img.51dy.com/pic/u=888503482,687232085&fm=0&gp=0.jpg" alt="东北往事之黑道风云二十年" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1163.html" title="东北往事之黑道风云二十年">东北往事之黑道风云二十年</a></span></h1>
				<p class="movie_starring"><strong> 主演：赵本山，小沈阳，宋小宝，程野</strong></p>
				<p class="movie_director"><strong> 导演：张钧涵   宋汶霏   张经伟   韩张</strong></p>
				<p> 上映：2012-04-16</p>
			</li>
					<li class="movie_item">
				<img data="http://img.51dy.com/pic/4fb7cd0f88d42.jpg" alt="舌尖上的中国" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1160.html" title="舌尖上的中国">舌尖上的中国</a></span></h1>
				<p class="movie_starring"><strong> 主演：无</strong></p>
				<p class="movie_director"><strong> 导演：陈晓卿</strong></p>
				<p> 上映：2012-05-15</p>
			</li>
					<li class="movie_item">
				<img data="http://www.v933.com//pic/uploadimg/2012-4/32037.jpg" alt="温柔的背后3之温柔的谎言 " align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1127.html" title="温柔的背后3之温柔的谎言 ">温柔的背后3之温柔的谎言 </a></span></h1>
				<p class="movie_starring"><strong> 主演：孙雅 侯天来 ..</strong></p>
				<p class="movie_director"><strong> 导演： 暂无相关</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.v933.com//pic/uploadimg/2012-4/20768.jpg" alt="温柔的谎言" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1128.html" title="温柔的谎言">温柔的谎言</a></span></h1>
				<p class="movie_starring"><strong> 主演：孙雅</strong></p>
				<p class="movie_director"><strong> 导演： 孙雅</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://img1.c3.letv.com/ptv/letv_vrs/2011/10/b9f6fdc97d5f49b899ca5a82ee5ef74c.jpg" alt="笑傲江湖" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1125.html" title="笑傲江湖">笑傲江湖</a></span></h1>
				<p class="movie_starring"><strong> 主演：范文芳 马景涛 李锦梅 郑各评 刘谦益</strong></p>
				<p class="movie_director"><strong> 导演：霍志揩</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://img1.c3.letv.com/ptv/letv_vrs/2011/9/258482840a7443709856e4cb9905bac7.jpg" alt="笑傲江湖电视剧共52集全" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1126.html" title="笑傲江湖电视剧共52集全">笑傲江湖电视剧共52集全</a></span></h1>
				<p class="movie_starring"><strong> 主演：任贤齐 袁咏仪 陈德容 宋达民 岳跃利</strong></p>
				<p class="movie_director"><strong> 导演：赖水清 李惠民</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://i2.letvimg.com/vrs/201204/19/252276666a6041cc86d89e25914d06d9.jpg" alt="飞虎神鹰前传电视剧共20集全" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1123.html" title="飞虎神鹰前传电视剧共20集全">飞虎神鹰前传电视剧共20集全</a></span></h1>
				<p class="movie_starring"><strong> 主演：张子健</strong></p>
				<p class="movie_director"><strong> 导演：钱雁秋</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://img1.c3.letv.com/ptv/letv_vrs/2011/10/3b5b41c8142e4b74be17105544a2883d.jpg" alt="飞虎神鹰电视剧共42集全" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1124.html" title="飞虎神鹰电视剧共42集全">飞虎神鹰电视剧共42集全</a></span></h1>
				<p class="movie_starring"><strong> 主演：张子健 梁冠华 曲栅栅 苑冉 须乾</strong></p>
				<p class="movie_director"><strong> 导演：钱雁秋</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.v933.com//pic/uploadimg/2012-4/56.jpg" alt="艰难爱情" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1121.html" title="艰难爱情">艰难爱情</a></span></h1>
				<p class="movie_starring"><strong> 主演：邓超  车晓 ..</strong></p>
				<p class="movie_director"><strong> 导演： 未知</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://i0.letvimg.com/vrs/201204/26/b28ff4090e4142ed8fb189bbf122d3ca.jpg" alt="樱桃" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1118.html" title="樱桃">樱桃</a></span></h1>
				<p class="movie_starring"><strong> 主演：沈春阳 宋小宝 小沈阳 赵本山</strong></p>
				<p class="movie_director"><strong> 导演：王振宏</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://i2.letvimg.com/vrs/201204/26/db3c5b569dbd47e0aab8aa2d7bb5adc8.jpg" alt="樱桃血" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1119.html" title="樱桃血">樱桃血</a></span></h1>
				<p class="movie_starring"><strong> 主演：妮基·瑞德 乔纳森·塔克 迈克尔·奥吉弗</strong></p>
				<p class="movie_director"><strong> 导演：NicholasDiBella</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://i3.letvimg.com/vrs/201204/27/c55898891a584a51bdaba4282aabeef7.jpg" alt="回到三国" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1114.html" title="回到三国">回到三国</a></span></h1>
				<p class="movie_starring"><strong> 主演：马国明 林峰 杨怡 陈展鹏 敖嘉年</strong></p>
				<p class="movie_director"><strong> 导演：刘家豪</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://img1.c3.letv.com/ptv/letv_vrs/2011/7/tv/539b726713d94f0cad72915853f9694d.jpg" alt="新三国" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1115.html" title="新三国">新三国</a></span></h1>
				<p class="movie_starring"><strong> 主演：陆毅 聂远 张博 于和伟 于荣光</strong></p>
				<p class="movie_director"><strong> 导演：高希希</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://img1.c3.letv.com/ptv/letv_vrs/2011/7/tv/fa28e39ef1fd40a1bbc8fb9a9b294a18.jpg" alt="三国演义" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1116.html" title="三国演义">三国演义</a></span></h1>
				<p class="movie_starring"><strong> 主演：唐国强 鲍国安 陆树铭 孙彦军 吴晓东</strong></p>
				<p class="movie_director"><strong> 导演：王扶林</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.v933.com//pic/uploadimg/2012-4/15130.jpg" alt="武则天秘史" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1113.html" title="武则天秘史">武则天秘史</a></span></h1>
				<p class="movie_starring"><strong> 主演：殷桃 刘晓庆 ..</strong></p>
				<p class="movie_director"><strong> 导演： 澄丰</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://www.v933.com//pic/uploadimg/2012-4/10050.jpg" alt="雍正王朝" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1112.html" title="雍正王朝">雍正王朝</a></span></h1>
				<p class="movie_starring"><strong> 主演：唐国强 王绘春..</strong></p>
				<p class="movie_director"><strong> 导演： 唐国强</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://img1.c3.letv.com/ptv/letv_vrs/2011/7/tv/4e0ef05558a9436d8b986f4017e07c68.jpg" alt="老西游记" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1109.html" title="老西游记">老西游记</a></span></h1>
				<p class="movie_starring"><strong> 主演：闫怀礼 六小龄童 徐少华 马德华 迟重瑞</strong></p>
				<p class="movie_director"><strong> 导演：杨洁</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://i2.letvimg.com/vrs/201201/30/5dcbd13d480b4ec583e685a68bb2cb72.jpg" alt="新西游记" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1110.html" title="新西游记">新西游记</a></span></h1>
				<p class="movie_starring"><strong> 主演：吴樾 聂远 臧金生 徐锦江 王九胜</strong></p>
				<p class="movie_director"><strong> 导演：张建亚</strong></p>
				<p></p>
			</li>
					<li class="movie_item">
				<img data="http://img.51dy.com/pic/4f81b4455f398.jpg" alt="绝对达令" align="center" onerror="this.src='/images/nopic.gif'"/>
				<h1><a href="/movie_detail_id_1108.html" title="绝对达令">绝对达令</a></span></h1>
				<p class="movie_starring"><strong> 主演：汪东城  具惠善  谢坤达  夏如芝</strong></p>
				<p class="movie_director"><strong> 导演： 刘俊杰</strong></p>
				<p></p>
			</li>
				</ul>
		<div class="page_bar">
			<ul class="pagebar"><li class="first">First</li><li class="prev">Prev</li><li>1</li><li class="active">2</li><li>3</li><li>4</li><li>5</li><li>6</li><li>7</li><li class="next">Next</li><li class="last" page="7">Last</li></ul><link href="http://www.inu5.dev/plugins/pagebar/list/pagebar.css" rel="stylesheet" type="text/css" /><script src="http://www.inu5.dev/plugins/pagebar/list/pagebar.js" type="text/javascript"></script>
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