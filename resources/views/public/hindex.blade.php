<!DOCTYPE html>

<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="Generator" content="68ECSHOP v4_1">

<meta name="Keywords" content="">
<meta name="Description" content="">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7">
<title>首页</title>

<link rel="stylesheet" type="text/css" href="/webc/common/css/category.css">
<!-- add -->
<link rel="stylesheet" href="/webc/common/css/index.css">
<link rel="stylesheet" type="text/css" href="/webc/common/css/68ecshop_commin.css">
<!-- endadd -->
<script src="/webc/common/js/hm.js"></script>
<script type="text/javascript" src="/webc/common/js/common.js"></script>
<script type="text/javascript" src="/webc/common/js/global.js"></script>
<script type="text/javascript" src="/webc/common/js/compare.js"></script>
<script type="text/javascript" src="/webc/common/js/jquery_006.js"></script> 
<script type="text/javascript" src="/webc/common/js/search_goods.js"></script> 
<script type="text/javascript" src="/webc/common/js/jquery-lazyload.js"></script> 
<script type="text/javascript" src="/webc/common/js/jquery.json.js"></script>

<!-- add -->
<script src="/webc/common/js/hm(1).js"></script>
<script type="text/javascript" src="/webc/common/js/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="/webc/common/js/jqueryAll.index.min.js"></script>
<script type="text/javascript" src="/webc/common/js/jump.js"></script>
 <script type="text/javascript" src="/webc/common/js/index.js"></script></head>
<!-- endadd -->
<!-- <script type="text/javascript" src="/webc/common/js/transport.js"></script> -->
</head>
<body style="cursor: auto;">
<div role="navigation" id="site-nav"> 
  <script type="text/javascript" src="/webc/common/js/base-2011.js"></script> 

<link rel="stylesheet" type="text/css" href="/webc/common/css/increase-68.css">
<link rel="stylesheet" href="/webc/common/css/68ecshop_commin.css" type="text/css">

<div id="sn-bd">
  <div class="sn-container"> 
  	<script type="text/javascript" src="/webc/common/js/utils.js"></script>
  	<script type="text/javascript" src="/webc/common/js/common.min.js"></script>
    <ul class="sn-quick-menu1">
       <li >
          @if(session('uid'))
          <h3 aria-haspopup="menu-8" tabindex="0" class="menu-hd"><span>您好,{{session('username')}}</span></h3>
          @endif
       </li>
    </ul>
    <ul class="sn-quick-menu">
    <!-- 天气 -->
  <li><iframe allowtransparency="true" frameborder="0" width="180" height="36" scrolling="no" src="http://tianqi.2345.com/plugin/widget/index.htm?s=3&z=2&t=0&v=1&d=3&bd=0&k=000000&f=000000&q=1&e=1&a=1&c=54511&w=180&h=36&align=left"></iframe></li>          
<li class="sn-loginfo" style="width:46px;">
@if(session('uid'))
<a class="sn-login" href="/web/loginout" target="_top">退出</a>
@else
<a class="sn-login" href="/web/login" target="_top">登录</a>
@endif
</li>
<li class="sn-loginfo" style="width:46px;">
<a class="sn-register" href="/web/register" target="_top">注册</a> 
</li>
     
      <li class="sn-mytaobao menu-item j_MyTaobao">
        <div class="sn-menu">
        	<a aria-haspopup="menu-3" tabindex="0" class="menu-hd" href="" target="_top" rel="nofollow">我的买啦<b></b></a>
          	<div id="menu-3" class="menu-bd">
            	<div class="menu-bd-panel" id="myTaobaoPanel">
                	<a href="" target="_top" rel="nofollow">已买宝贝</a>  
                    <a href="/web/pcenter/index" target="_top" rel="nofollow">个&nbsp;&nbsp;人&nbsp;&nbsp;中&nbsp;&nbsp;心</a> 
               </div>
          </div>
        </div>
      </li>
      <li class="sn-cart mini-cart menu">
      	<a id="mc-menu-hd" class="sn-cart-link mui-global-iconfont" href="/web/cart" target="_top" rel="nofollow">购物车</a>
      </li>
      <li class="sn-favorite menu-item">
        <div class="sn-menu"> 
        	<h8 class="menu-hd" aria-haspopup="menu-4" tabindex="0"><span class="sn-collect-link"><a href="/web/pcenter">个人中心</a></span><b></b></h8>
          	<div id="menu-4" class="menu-bd">
          </div>
        </div>
      </li>
      <li class="sn-separator"></li>
      <script type="text/javascript">
		function show_qcord(){
			var qs=document.getElementById('sn-qrcode');
			qs.style.display="block";
		}
		function hide_qcord(){
			var qs=document.getElementById('sn-qrcode');
			qs.style.display="none";
		}
	  </script>
      <li class="menu-item">
      	<div class="sn-menu" style="width:68px">
        <a aria-haspopup="menu-6" tabindex="0" href="" target="_top">关注买啦<b></b></a>
        </div>
      </li>
       <li class="sn-separator"></li>
      <li class="sn-seller menu-item">
        <div class="sn-menu J_DirectPromo">
        <a aria-haspopup="menu-6" tabindex="0" class="menu-hd" href="" target="_top">卖家中心<b></b></a>
        <div class="menu-bd" id="menu-6">
          <ul>
            <li>
               
              <a href="">售后流程</a> 
               
              <a href="">购物流程</a> 
               
              <a href="">订购方式</a> 
               
              <a href="">常见问题</a> 
               
              <a href="" target="_top" title="帮助中心">帮助中心</a> 
            </li>
          </ul>
        </div>
      </div></li>
       <li class="sn-separator"></li>
      <li class="menu-item">
        <div class="sn-menu" style="width:68px">
         <a aria-haspopup="menu-7" tabindex="0" style="width:80px" href="" target="_top">联系客服<b></b></a>
        </div>
      </li>
    </ul>
  </div>
</div>
</div>

<div id="header">
  <div class="headerLayout">
    <div class="headerCon ">
      <h1 id="mallLogo" class="mall-logo">
      	<a href="/index" class="header-logo" title="logo"><img src="/webc/common/img/logo.jpg"></a>
      </h1>
      <div class="header-extra">
        <div class="header-banner"> 
</div>   
     <script src="/webc/common/js/page.js" type="text/javascript"></script>
        <div id="mallSearch" class="mall-search" style="position:relative; z-index:999999999; overflow:visible">
          <div id="search_tips" style="display:none;"></div>
          <ul class="search-type clearfix">
          <li class="cur" num="0">宝贝</li>
          <li num="1">店铺</li>
          </ul>
          <form class="mallSearch-form" method="get" name="searchForm" id="searchForm" action="/web/list/index">
	  		<input type="hidden" name="id" id="searchtype" value="8">
            <fieldset>
              <legend>搜索</legend>
              <div class="mallSearch-input clearfix">
                <div id="s-combobox-135" class="s-combobox">
                  <div class="s-combobox-input-wrap">
                    <input aria-haspopup="true" role="combobox" class="s-combobox-input" name="keywords" id="keyword" tabindex="9" accesskey="s"  autocomplete="off" .placeholder="请输入关键词" value="" type="text">
                  </div>
                </div>
                {{csrf_field()}}
                <input type="submit" value="搜索" class="button">
              </div>
            </fieldset>
          </form>
        
        </div>
      </div>
    </div>
  </div>
</div>
<div class="globa-nav">
  <div class="w">
    <div class="allGoodsCat Left" onmouseover="_show_(this)" onmouseout="_hide_(this)">
   
      <a href="" class="menuEvent" title="查看全部商品分类"><strong class="catName">全部商品分类</strong><i></i></a>
      <div class="expandMenu all_cat" id='mysetcom'> 

@foreach($list as $key=>$row)
<div class="list zknav_{{$key+1}}" onmouseover="_show_(this,{&#39;source&#39;:&#39;JS_side_cat_textarea_{{$key+1}}&#39;,&#39;target&#39;:&#39;JS_side_cat_list_{{$key+1}}&#39;});" onmouseout="_hide_(this);">
  <dl class="cat">
      <dt class="cat{{$key+1}} catName"> 
          <strong class="Left">
              <a href="/web/list?id={{$row->id}}" target="_blank" title="{{$row->name}}">{{$row->name}}</a>
            </strong>
        <p> 
             <!-- 二级 -->
            @foreach($row->sub as $v)
            <a href="/web/list?id={{$v->id}}" target="_blank" title="{{$v->name}}">{{$v->name}}</a> 
            @endforeach
        </p>
      </dt>
  </dl>
  <textarea id="JS_side_cat_textarea_{{$key+1}}" class="none">   <div class="topMap clearfix">
      <div class="subCat clearfix">

        @foreach($row->sub as $v)
        <div class="list1 clearfix" >
          <div class="cat1">
                <a href="/web/list?id={{$v->id}}" target="_blank" title="{{$v->name}}">{{$v->name}}：</a>
         </div>
          <div class="link1">
              @foreach($v->sub as $s)
              <a href="/web/list?id={{$s->id}}" target="_blank" title="{{$s->name}}">{{$s->name}}</a>
              @endforeach
          </div>
        </div>
        @endforeach
          
      </div>
    </div>
  </textarea>
  <div id="JS_side_cat_list_{{$key+1}}" class="hideMap Map_positon{{$key+1}}"></div>
</div>
@endforeach

 
 </div>
    </div>
    <ul class="allMenu Left">
  <li><a class="index nav" href="/index" title="首页">首页</a></li>
   
   @foreach($list as $row)
  <li><a href="/web/list?id={{$row->id}}" class="nav " title="{{$row->name}}">{{$row->name}}</a></li>  
  @endforeach
   
  <!-- <li><a href="http://mailaing.com/pro_search.php?intro=promotion" class="nav " title="团购">团购</a></li>   -->
   
  
  </ul> </div>
</div>
<script type="text/javascript">function _show_(h,b){if(!h){return;}if(b&&b.source&&b.target){var d=(typeof b.source=="string")?M.$("#"+b.source):b.source;var e=(typeof b.target=="string")?M.$("#"+b.target):b.target;if(d&&e&&!e.isDone){e.innerHTML=d.value;d.parentNode.removeChild(d);if(typeof b.callback=="function"){b.callback();}e.isDone=true;}}M.addClass(h,"hover");if(b&&b.isLazyLoad&&h.isDone){var g=h.find("img");for(var a=0,c=g.length;a<c;a++){var f=g[a].getAttribute("data-src_index_menu");if(f){g[a].setAttribute("src",f);g[a].removeAttribute("data-src_index_menu");}}h.isDone=true;}}function _hide_(a){if(!a){return;}if(a.className.indexOf("hover")>-1){M.removeClass(a,"hover");}}function shoucang(){var b=window.location.href;var a=document.title;try{window.external.addFavorite(b,a);}catch(c){try{window.sidebar.addPanel(a,b,"");}catch(c){alert("加入收藏失败，请使用Ctrl+D进行添加");}}}</script>
<script type="text/javascript">
//<![CDATA[


//]]>
</script>

@section('content')
@show
 
	
	<!-- 右侧购物车 -->
<div class="sidebar-nav" style="height: 100%; top: 0px; bottom: auto;">
  <div class="mods">
    <div class="middle-items">
      <div class="mod reserve" style="height:135px;" id="ECS_CARTINFO">
      
<form id="formCart" name="formCart" method="post" action="">
  <a href="/web/cart" class="btn" style="height:135px; padding-top:5px; color:#fff;" id="collectBox"> <i></i> 购<br>
  物<br>
  车<br>
  <span style="margin-top:7px;">0</span> </a>
 
</form>
      </div>
    </div>
    <div class="bottom-items">
      <div class="mod top disabled"> <a href="javascript:;" class="btn">
        <table>
          <tbody>
            <tr>
              <td><i></i></td>
            </tr>
            <tr>
              <td>回 到<br>
                顶 部</td>
            </tr>
          </tbody>
        </table>
        </a> </div>
    </div>
  </div>
</div> 

<!-- endsection 4 -->


<script type="text/javascript">
$(document).ready(function(){ 
var headHeight2=200;  //这个高度其实有更好的办法的。使用者根据自己的需要可以手工调整。
 
var top=$(".top");       //要悬浮的容器的id
$(window).scroll(function(){ 
 
if($(this).scrollTop()>headHeight2){ 
top.removeClass("disabled");  
}
else{ 
top.addClass("disabled"); 
} 
}) 
})
$(".top").click(function(){
$('body,html').animate({scrollTop:0},800);
return false;
});
$("#mod-fold").click(function(){
$('.sidebar-nav').hasClass('fold') ? $('.sidebar-nav').removeClass('fold') : $('.sidebar-nav').addClass('fold');
});
</script>


  <div class="site-footer" style="border-top:1px solid #dfdfdf">
  <div class="wrapper">
<div class="footer-links clearfix"> 
            <dl class="col-links col-links-first">
        <dt>新手上路 </dt>
                <dd><a rel="nofollow" href="" target="_blank">售后流程</a></dd>
                <dd><a rel="nofollow" href="" target="_blank">购物流程</a></dd>
                <dd><a rel="nofollow" href="" target="_blank">订购方式</a></dd>
                <dd><a rel="nofollow" href="" target="_blank">在线支付</a></dd>
                <dd><a rel="nofollow" href="" target="_blank">公司转账</a></dd>
              </dl>
            <dl class="col-links ">
        <dt>配送方式 </dt>
                <dd><a rel="nofollow" href="" target="_blank">货到付款区域</a></dd>
                <dd><a rel="nofollow" href="" target="_blank">配送支付查询</a></dd>
                <dd><a rel="nofollow" href="" target="_blank">支付方式说明</a></dd>
                <dd><a rel="nofollow" href="" target="_blank">如何送礼</a></dd>
                <dd><a rel="nofollow" href="" target="_blank">Global Shipping</a></dd>
              </dl>
            <dl class="col-links ">
        <dt>购物指南</dt>
                <dd><a rel="nofollow" href="" target="_blank">常见问题</a></dd>
                <dd><a rel="nofollow" href="" target="_blank">订购流程</a></dd>
                <dd><a rel="nofollow" href="" target="_blank">注册新会员</a></dd>
                <dd><a rel="nofollow" href="" target="_blank">团购/机票</a></dd>
                <dd><a rel="nofollow" href="" target="_blank">联系客服</a></dd>
              </dl>
            <dl class="col-links ">
        <dt>售后服务</dt>
                <dd><a rel="nofollow" href="" target="_blank">退换货原则</a></dd>
                <dd><a rel="nofollow" href="" target="_blank">售后服务保证</a></dd>
                <dd><a rel="nofollow" href="" target="_blank">换货流程</a></dd>
                <dd><a rel="nofollow" href="" target="_blank">退款说明</a></dd>
                <dd><a rel="nofollow" href="" target="_blank">返修/退换货</a></dd>
              </dl>
            <dl class="col-links ">
        <dt>友情链接 </dt>
                <dd><a rel="nofollow" href="" target="_blank">网站故障报告</a></dd>
                <dd><a rel="nofollow" href="" target="_blank">选机咨询</a></dd>
                <dd><a rel="nofollow" href="" target="_blank">投诉与建议</a></dd>
                <dd><a rel="nofollow" href="" target="_blank">节能补贴</a></dd>
                <dd><a rel="nofollow" href="" target="_blank">京东礼品卡</a></dd>
              </dl>
            <div class="col-contact">
        <p class="phone">400-078-5268</p>
        <p>周一至周五 9:00-17:30<br>
          （仅收市话费）</p>
        <a rel="nofollow" class="btn2 btn-primary btn-small" href="javascript:void(0);" style="color:#fff">24小时在线客服</a> </div>
    </div>
  </div>
</div>
 <link type="text/css" rel="stylesheet" href="/webc/common/css/footer.css">
    <p>
          </p>
    
<div class="am-g am-g_footer">
    <div class="bottomLine bottomLine_ul">
    <ul>
                      <li><a class="bottomline_a" href="" target="_blank">关于我们</a><span>|</span></li>
                 <li><a class="bottomline_a" href="" target="_blank">联系我们</a><span>|</span></li>
                 <li><a class="bottomline_a" href="" target="_blank">商家入驻</a><span>|</span></li>
                 <li><a class="bottomline_a" href="">友情链接</a><span>|</span></li>
                 <li><a class="bottomline_a" href="">站点地图</a><span>|</span></li>
                 <li><a class="bottomline_a" href="">手机商城</a><span>|</span></li>
                 <li><a class="bottomline_a" href="">销售联盟</a><span>|</span></li>
                 <li><a class="bottomline_a" href="">商城社区</a><span>|</span></li>
                 <li><a class="bottomline_a" href="">企业文化</a><span>|</span></li>
                 <li><a class="bottomline_a" href="">帮助中心</a><span style="display:none">|</span></li>
         </ul>
    </div>
</div>
<div class="am-g am-g_footer am-g_footer_bq">
	<div class="bot ">
	<div class="bot_bq">
      <p class="footer_p">  
      <span class="footer_span_sh">© 2005-2016 买啦网 版权所有，并保留所有权利。</span>
      <span class="footer_span">      买啦 Tel: 4008125181      </span>
        <span class="footer_email">      E-mail: maila@163.com      </span>
      </p>
        </div>
    </div>
</div>

</body></html>