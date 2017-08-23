@extends('public.hindex')
@section('content')


<link rel="stylesheet" type="text/css" href="/webc/common/css/category.css">
<link rel="stylesheet" type="text/css" href="/webc/common/css/pshow.css">
<link rel="stylesheet" type="text/css" href="/webc/common/css/goods.css">
<link type="text/css" rel="stylesheet" href="/webc/common/css/bdsstyle.css">
<script type="text/javascript">
  $('title').html('详情页');

</script>
<!-- 样式 -->
<style type="text/css">

	*{
		padding:0px;
		margin:0px;
	}
	#small{
		width:390px;
		height:390px;
		position:absolute; 
		left:5px;
		top:15px;
		border: 1px solid #ccc;
		}
	#simg{
		position:absolute;
	}	
	#move{
		width:100px;
		height:100px;
		position:absolute;
		left:0px;
		top:0px;
		background-image: url(/uploads/bg.png);
		display:none;
	}
	#big{
		width:390px;
		height:390px;
		position:absolute;
		left:420px;
		top:10px;
		overflow:hidden;
		z-index:99;
		display:none;
	}
	#bimg{
		position:absolute;
		width:1000px;
		height:1000px;
	}

	#imgs{
		width:100px;
		height:100px;
		position:absolute;
		top:430px;
		left:-5px;
		list-style-type:none;
	}	


</style>

<input id="chat_goods_id" value="155" type="hidden">
<div id="bg" class="bg" style="display:none;"></div>


  <div class="blank"></div>
  <div class="w">
  <div class="breadcrumb"><i></i><a href="">首页</a> <code>&gt;</code> <a href="">手机数码</a> <code>&gt;</code> <a href="">热卖手机</a> <code>&gt;</code> <a href="">三星盖乐世</a> <code>&gt;</code></div>
</div>
<div class="blank"></div>
  <div class="w">
    <div id="product-intro" class="goods_photo"> 
       
      <form action="/web/carttest" method="post" name="ECS_FORMBUY" id="ECS_FORMBUY">
        <div class="clearfix" style="width:591px; min-height:510px;">
          <div class="goods_info">
            <div id="name">

            <!-- 产品名字 -->
              <h1>产品名字：{{$list1->name}}</h1>
            </div>

                       
                        <div id="summary-price" class="clearfix">
              <div class="mar_l">
              	                <div class="market_prices_t"> <span class="price">市场价：</span><font class="market_price">{{$list1->oldprice}}元</font> </div>
                 
                <p> 
                  <span class="price" style="width:80px;">本店售价：</span><strong class="p-price" id="ECS_GOODS_AMOUNT">{{$list1->price}}元</strong>
                 
              </div>
              <div class="show_price" style="z-index:101"> 
               
              </div>
            </div>
            <ul id="summary1">
                       </ul>
            <div id="summary-qita" class="clearfix">
              <ul class="qita">
              
			            </div>
			            <ul style="display: block;" id="summary">
                    <li class="padd padd-promotion clearfix">  
                         
                                <div id="manzeng" class="dd " style="position:relative;"> <a></a>  </div>

			  </style>
              
                          </ul>
            <ul id="choose" class="choose_bor">
              <li style="padding:0 0 7px 0px; overflow:visible;z-index:2; position:relative">
             
              </li>
           
              <li id="choose-amount">
                <div class="dt">数量：</div>
                <div class="dd">
                  <div class="wrap-input"> 


                   <!--  <a class="btn-reduce" href="javascript:;" onclick="goods_cut();changePrice();">减少数量</a> -->
                    <input name="num" class="text" id="number" type="text" value='1'>
                   <!--  <a class="btn-add" href="javascript:;" onclick="goods_add();changePrice();">增加数量</a>  -->
           				（库存<font id="shows_number">{{$list1->store}}</font>）
                   </div>
                </div>
              </li>
                          </ul>
            <div class="buyNub-buy-wrap">
     
              <div style="display: block;" id="choose-btns" class="buyNub-buy"> 
                <input type="hidden" name='id' value="{{$list1->id}}">
                 
                <button type="submit" name="bi_addToCart" class="u-buy1">立即购买</button> <button type="submit" name="bi_addToCart" class="u-buy2">加入购物车</button> 
                 
                <!-- <a href="" class="btn-coll ">收藏</a> <a> -->
                <div> <span class="arr"></span>
                  <div class="m-qrcode-wrap"></div>
                </div>
                </a>  
              </div>
          </div>
          </div>
           
          <span class="clr"></span> </div> 
           {{csrf_field()}}
      </form>
     <script type="text/javascript">
            $("input[name='num']").blur(function(){
                val=$(this).val();
                val=parseInt(val);

                if(val<1 || isNaN(val)){
                  $(this).val(1);
                }
                // val=$(this).val();

                //库存量
                kucun=$(this).next('font').html();
                if(val>kucun){
                  $(this).val(kucun);
                }

            });
     </script>
   
  <div id="preview">
      		<!-- 小框 -->
   			<div id="small">
   					<!-- 小照片 -->
					<img src="{{$list1->pic}}" id="simg" width="100%" height="100%">
					<!-- 移动滑块 -->
					<div id="move"></div>
					
			</div>
			<!-- 大div -->
		<div id="big">
				<img src="{{$list1->pic}}" id="bimg">
		</div>
			<ul id="imgs">
					<!--点击小图 -->
					<li style="width:100px;height:100px;border:1px dashed #ccc; margin-left:10px;">
					<img src="{{$list1->pic}}" width="100%" height="100px"></li>
			</ul>			
	
</div>

      <div id="demo2" style="display: inline; overflow: visible; width: 180px;"></div>
    </div>
  </div>
  <span class="scrright" onmouseover="moveRight()" onmousedown="clickRight()" onmouseup="moveRight()" onmouseout="scrollStop()"></span>
 <script type="text/javascript">
// 	// //获取div元素对象
	small=document.getElementById('small');
	simg=document.getElementById('simg');
	move=document.getElementById('move');
	big=document.getElementById('big');
	bimg=document.getElementById('bimg');
	imgs=document.getElementById('imgs');

//给small去绑定一个鼠标的移动时间
small.onmousemove=function(e){
	move.style.display="block";
	big.style.display="block";
	//cursor鼠标样式
	move.style.cursor="move";

	//浏览器的兼容处理
	ee=e||window.event;
	//获取文档区横坐标和纵坐标(没有滚动条)
	// clientX  clientY
	//获取鼠标文档的坐标
	x=ee.pageX;
	y=ee.pageY;

	var sTop=document.body.scrollTop + document.documentElement.scrollTop;
	var sLeft=document.body.scrollLeft + document.documentElement.scrollLeft;
	x1=small.getBoundingClientRect().left+sLeft;//
	y1=small.getBoundingClientRect().top+sTop;
	// xx=x-40;
	// yy=y-200;
	// alert(x+":"+y);
	//获取small距离父级边框的距
	// x1=small.offsetLeft;
	// y1=small.offsetTop;
	// alert(x1+":"+y1);
	// alert(x1);
	//获取move的自身元素的高度和宽度的一半
	m_w=move.offsetWidth/2;
	m_h=move.offsetHeight/2;

	//获取left和top
	l=x-x1-m_w;
	t=y-y1-m_h;
	// alert(l+":"+t);

	// 上
	if(t<0){
		t=0;
	}

	//下
	if(t>small.offsetHeight-move.offsetHeight){
		t=small.offsetHeight-move.offsetHeight;
	}

	//左
	if(l<0){
		l=0;
	}

	//右
	if(l>small.offsetWidth-move.offsetWidth){
		l=small.offsetWidth-move.offsetWidth;
	}

	// 把l和t赋给move的left和top
	move.style.left=l+"px";
	move.style.top=t+"px";

	//获取大图的left和top值
	//大图和大框的比例
	ll=bimg.offsetWidth/big.offsetWidth;
	yy=bimg.offsetHeight/big.offsetHeight;

	//小框的大小
	move.style.width=small.offsetWidth/ll+"px";
	move.style.height=small.offsetHeight/yy+'px';

	bimg.style.left=-l*ll+"px";
	bimg.style.top=-t*yy+"px";
}

// 移出
small.onmouseout=function(){
	move.style.display="none";
	big.style.display="none";
}
//获取图片结合节点
imgid=imgs.getElementsByTagName('img');

for(var i=0;i<imgid.length;i++){
	imgid[i].onclick=function(){
		//获取src中的属性
		src=this.getAttribute('src');
		//设置simg和bimg属性
		simg.src=src;
		bimg.src=src;
	}
}

   
      </script>
</div>
					
		      <div id="supp_info"> 
         
       

</div>
    </div>
  </div>
  <div class="blank"></div>
  <div class="blank"></div>
  <div class="w"> <div class="clearfix"></div> 
<div class="goods_best">
	<div class="mt">
    	<h2>推荐新品</h2>
    </div>
    <div class="colList"> 
     <a id="btn-left1" class="prev" title="上一个" onclick="top4()"></a>
      <div class="slider1 colFrame" background:green;>

		<ul style="width: 1860px;">
		 @foreach($new as $row)
      	    		<li>
            	<div class="p-img"><a href="/web/detail/{{$row->id}}" ><img  src="{{$row->pic}}" height="160" width="160"></a></div>
                <div class="rain-product-info">
            	<div class="p-price"><strong class="best_goods_price"> 
              	价格{{$row->price}}元
              	</strong>
                </div>
                <div class="rate">{{$row->name}}&nbsp;&nbsp;<a href="/web/detail/{{$row->id}}">点击购买</a></div>
              </div>
            </li>
            	@endforeach
   
      	    	</ul>
      </div>
     <a id="btn-right1" class="next" title="下一个" onclick="bottom4()"></a> 
    </div>
  
</div>
     <div class="left">
      <div id="related-sorts" class="m m2">
        <div class="mt">
          <h2>相关产品分类</h2>
        </div>
        <div class="mc">
          <ul class="lh">
          					@foreach($new as $row)
                        <li><a href="/web/detail/{{$row->id}}">{{$row->name}}</a></li>
                        	@endforeach
                      </ul>
        </div>
      </div>
      
      <div id="related-brands" class="m m2">
        
        <div class="mc">
          <style type="text/css">
		 *{margin:0;padding:0;}
		 #content{width:300px;margin:0 auto;padding:10px;background:#eee;border:1px solid #999;}
		 #content p span{color:red;font:bold 20px Arial;}
		 #content p a{font:12px/23px ’宋体’;color:#888;}
		 .div1{ display:none;}
		 </style>
		 </head>
		 <body><div id="content">
		 <h1>限时抢购啦！</h1>
		 <p>还剩<span id="times"></span></p>
		 </div>
		 <SCRIPT LANGUAGE="JavaScript">
		 function fresh()
		 {
		 var endtime=new Date("2016/11/06,10:0:0");
		 var nowtime = new Date();
		 var leftsecond=parseInt((endtime.getTime()-nowtime.getTime())/1000);
		 d=parseInt(leftsecond/3600/24);
		 h=parseInt((leftsecond/3600)%24);
		 m=parseInt((leftsecond/60)%60);
		 s=parseInt(leftsecond%60);
		 document.getElementById("times").innerHTML=h+"小时"+m+"分"+s+"秒";
		 if(leftsecond<=0){
		 document.getElementById("times").innerHTML="抢购已结束";
		 clearInterval(sh);
		 }
		 }
		 fresh()
		 var sh;
		 sh=setInterval(fresh,1000);
		 </SCRIPT>
		        </div>
		      </div>
		      
		             
		      <div class="m m2 collect">
			<div class="mt">
		   <h1>&nbsp;&nbsp;&nbsp;祝你购物愉快</h1>
		      </div>
		      <a style="cursor: pointer;" id="btn-left" class="prev" title="上一个" onclick="top2()"></a>
		      <a style="cursor: pointer;" id="btn-right" class="next" title="下一个" onclick="bottom2()"></a> 
		    </div>
		   
		</div>
  
    
   
      <div style="height:8px; line-height:8px;"></div>
         </div>
    
    <div class="right goods_right">       <div id="wrapper" class="m m1">
        <div style="position: static; top: 0px;" class="mt" id="main-nav-holder">
          <ul class="tab" id="nav">
            <li class="boldtit_list h_list" onclick="change_widget(1, this);"><a href="">规格参数</a></li>
            
          </ul>
          <div style="width:170px;float:right; position:relative;left:0;top:0"></a>
            <div style="height: 1854px;" class="ce_right">
              <ul class="abs_ul">
                
              </ul>
            </div>
          </div>
        </div>
        <div id="main_widget_1">
          <div class="mc" id="os_canshu">
            <ul class="detail-list">
            
             
               
                          </ul>
          </div>
          <div class="mc" id="os_jieshao">
            <div class="blank20"></div>
            <div class="detail-content"> <p>{!!$list1->content!!}</p></div>
          </div>
          <div class="mc" id="os_pinglun">
            <div class="blank20"></div>
        
<div class="blank"></div>
<div class="my_comment_tab">
	<ul class="clearfix">
    	<li id="mct_0" class="cur">全部评价<span></span></li>
    	<!-- <li class="" id="mct_1" onclick="ShowMyComments(155,1,1)">好评<span>(0)</span></li> -->
    
  </ul>
</div>
<div class="blank"></div>
  <div class="my_comment_list" id="ECS_MYCOMMENTS">
      <div class="no_comment">
           @foreach($comment as $row)
            <div class="pd_comment-item">
                  <div class="pd_comment-text-box">
                    <div class="pd_comment-user">&nbsp;&nbsp;&nbsp;用户：{{$row->uname}}</div>
                    <!-- <div class="pd_comment-date">&nbsp;&nbsp;&nbsp;类型:</div> -->
                </div>
                <div class="pd_comment-score">
                    <span class="pd_comment-score-text">&nbsp;&nbsp;&nbsp;评分：
                    @if($row->status==1)
                      好评
                    @elseif($row->status==2)
                      中评
                    @else
                      差评
                    @endif
                    </span><br>
                    <!-- <span class="icon-star_fat stars light"></span> -->
                    <span class="pd_comment-score-text">&nbsp;&nbsp;&nbsp;评价:{{$row->content}}</span><br>
                </div>
                </div>
                <span class="pd_comment-score-text">&nbsp;&nbsp;&nbsp;
                --------------------------------------------------------------------------------------------------------------------------</span>

              @endforeach

      </div>
  </div>
</div>
          <div class="mc" id="os_advantage">
            <div class="blank20"></div>
            <div class="my_goods_info">
    <div class="tab_title"> 
          <span>公司位置</span>
    </div>
    <div class="goods_info_con">
      <!-- <img src="/webc/common/img/s-package.jpg" alt="我们的优势" width="790"> -->
      <style type="text/css">
          html,body{margin:0;padding:0;}
          .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
          .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
          </style>
            <script type="text/javascript" src="jquery-1.8.3.min.js"></script>
            <script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
          </head>
          <body>
            <button>查看</button>
            <button>关闭</button>
            <div style="width:697px;height:550px;border:#ccc solid 1px;" id="dituContent"></div>
          </body>
          <script type="text/javascript">
            //获取button
            $("button").click(function(){
              switch($(this).html()){
                case "查看":
                // $("#dituContent").show(2000);
                $("#dituContent").slideDown(2000);
                // $("#dituContent").fadeIn(2000);
                break;
                case "关闭":
                // $("#dituContent").hide(3000);
                $("#dituContent").slideUp(2000);
                // $("#dituContent").fadeOut(2000);
                break;
              }
            })
          </script>
           <script type="text/javascript">
          //创建和初始化地图函数：
          function initMap(){
          createMap();//创建地图
          setMapEvent();//设置地图事件
          addMapControl();//向地图添加控件
          addMarker();//向地图中添加marker
          }

          //创建地图函数：
          function createMap(){
          var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
          var point = new BMap.Point(115.949652,28.693851);//定义一个中心点坐标
          map.centerAndZoom(point,18);//设定地图的中心点和坐标并将地图显示在地图容器中
          window.map = map;//将map变量存储在全局
          }

          //地图事件设置函数：
          function setMapEvent(){
          map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
          map.enableScrollWheelZoom();//启用地图滚轮放大缩小
          map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
          map.enableKeyboard();//启用键盘上下左右键移动地图
          }

          //地图控件添加函数：
          function addMapControl(){
          //向地图中添加缩放控件
          var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
          map.addControl(ctrl_nav);
          //向地图中添加缩略图控件
          var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:1});
          map.addControl(ctrl_ove);
          //向地图中添加比例尺控件
          var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
          map.addControl(ctrl_sca);
          }

          //标注点数组
          var markerArr = [{title:"百恒网络",content:"电话：0791-88117053<br/>手机：15079002975",point:"115.950312|28.693447",isOpen:1,icon:{w:23,h:25,l:46,t:21,x:9,lb:12}}
          ];
          //创建marker
          function addMarker(){
          for(var i=0;i<markerArr.length;i++){
          var json = markerArr[i];
          var p0 = json.point.split("|")[0];
          var p1 = json.point.split("|")[1];
          var point = new BMap.Point(p0,p1);
          var iconImg = createIcon(json.icon);
          var marker = new BMap.Marker(point,{icon:iconImg});
          var iw = createInfoWindow(i);
          var label = new BMap.Label(json.title,{"offset":new BMap.Size(json.icon.lb-json.icon.x+10,-20)});
          marker.setLabel(label);
          map.addOverlay(marker);
          label.setStyle({
          borderColor:"#808080",
          color:"#333",
          cursor:"pointer"
          });

          (function(){
          var index = i;
          var _iw = createInfoWindow(i);
          var _marker = marker;
          _marker.addEventListener("click",function(){
          this.openInfoWindow(_iw);
          });
          _iw.addEventListener("open",function(){
          _marker.getLabel().hide();
          })
          _iw.addEventListener("close",function(){
          _marker.getLabel().show();
          })
          label.addEventListener("click",function(){
          _marker.openInfoWindow(_iw);
          })
          if(!!json.isOpen){
          label.hide();
          _marker.openInfoWindow(_iw);
          }
          })()
          }
          }
          //创建InfoWindow
          function createInfoWindow(i){
          var json = markerArr[i];
          var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>"+json.content+"</div>");
          return iw;
          }
          //创建一个Icon
          function createIcon(json){
          var icon = new BMap.Icon("http://map.baidu.com/image/us_cursor.gif", new BMap.Size(json.w,json.h),{imageOffset: new BMap.Size(-json.l,-json.t),infoWindowOffset:new BMap.Size(json.lb+5,1),offset:new BMap.Size(json.x,json.h)})
          return icon;
          }

          initMap();//创建和初始化地图
</script>
    </div>
</div>
 </div>
          <div class="mc" id="os_shouhou">
            <div class="blank20"></div>
            <div class="my_goods_info">
  <div class="tab_title"> <span>售后保障</span> </div>
  <div class="goods_info_con"> 质保期：一年<br>
    售后服务电话：400-078-5268
    品牌官方网站：http://www.68ecshop.com<br>
    售后服务电话：400-078-5268<br>
    品牌官方网站：<a target="_blank" href="#">http://www.68ecshop.com</a><br>
    <div class="baozhang_info">本商城向您保证所售商品均为正品行货，本商城自营商品自带机打发票，与商品一起寄送。凭
质保证书及本商城发票，可享受全国联保服务（奢侈品、钟表除外；奢侈品、钟表由本商城联系保修，享受法定三包售后服务），与您亲临商场选购的商品享受相同
的质量保证。本商城还为您提供具有竞争力的商品价格和<a href="#" target="_blank">运费政策</a>，请您放心购买！ <br>
      <br>
      注：因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，本司不能确保客户收到的货物与商城图片、产地、附件说明完全一致。只能确保为原厂正货！并且保证与当时市场上同样主流新品一致。若本商城没有及时更新，请大家谅解！
      <div id="state"><strong>权利声明：</strong><br>
        本商城上的所有商品信息、客户评价、商品咨询、网友讨论等内容，是京东商城重要的经营资源，未经许可，禁止非法转载使用。
        <p><b>注：</b>本站商品信息均来自于厂商，其真实性、准确性和合法性由信息拥有者（厂商）负责。本站不提供任何保证，并不承担任何法律责任。</p>
      </div>
    </div>
  </div>
</div>
 </div>
          <div class="mc" id="os_changjian">
            <div class="blank20"></div>
            <div class="wenti">
    <div class="tab_title"> 
    	<span>常见问题</span>
    </div>
	<div class="tab_body">
    <div class="list">
      <div class="question clearfix">
      	<span class="icon Left"></span>
        <strong class="common_right">下单后可以修改订单吗？</strong>
      </div>
      <div class="answer clearfix">
      	<span class="icon Left"></span>
        <p class="common_right">由本网站发货的订单，在订单打印之前可以修改，打开“订单详情”页面，点击右上角的“修改订单”即可，若没有修改订单按钮，则表示订单无法修改。</p>
      </div>
    </div>
    <div class="list">
      <div class="question clearfix">
      	<span class="icon Left"></span> 
        <strong class="common_right">无货商品几天可以到货？</strong>
      </div>
      <div class="answer clearfix">
      	<span class="icon Left"></span>
        <p class="common_right">您可以通过以下方法获取商品的到货时间：若商品页面中，显示“无货”时：商品具体的到货时间是无法确定的，您可以通过商品页面的“到货通知”功能获得商品到货提醒。</p>
      </div>
    </div>
    <div class="list">
      <div class="question clearfix">
      	<span class="icon Left"></span>
        <strong class="common_right">订单如何取消？</strong>
      </div>
      <div class="answer clearfix">
      	<span class="icon Left"></span>
        <p class="common_right"> 如订单处于暂停状态，进入“我的订单"页面，找到要取消的订单，点击“取消订单”按钮。</p>
      </div>
    </div>
    <div class="list">
      <div class="question clearfix">
      	<span class="icon Left"></span>
        <strong class="common_right">可以开发票吗？</strong>
      </div>
      <div class="answer clearfix">
      	<span class="icon Left"></span>
        <p class="common_right">本网站所售商品都是正品行货，均开具正规发票（图书商品用户自由选择是否开发票），发票金额含配送费金额，另有说明的除外。</p>
      </div>
    </div>
    <div class="list">
      <div class="question clearfix">
      	<span class="icon Left"></span> 
        <strong class="common_right">如何联系商家？</strong>
      </div>
      <div class="answer clearfix">
      	<span class="icon Left"></span>
        <p class="common_right">在商品页面右则，您可以看到卖家信息，点击“联系客服”按钮，咨询卖家的在线客服人员，已开通400电话的卖家，您可直接致电卖家。</p>
      </div>
    </div>
    <div class="list">
      <div class="question clearfix">
      	<span class="icon Left"></span>
        <strong class="common_right">收到的商品少了/发错了怎么办？</strong>
      </div>
      <div class="answer clearfix">
      	<span class="icon Left"></span>
        <p class="common_right">同个订单购买多个商品可能会分为一个以上包裹发出，可能不会同时送达，建议您耐心等待1-2天，如未收到，本网站自营商品可直接联系京东在线客服，第三方商家商品请联系商家在线客服。</p>
      </div>
    </div>
    <div class="list none">
      <div class="question clearfix">
      	<span class="icon Left"></span>
        <strong class="common_right">如何申请退货/换货？</strong>
      </div>
      <div class="answer clearfix">
      	<span class="icon Left"></span>
        <p class="common_right">登陆网站，进入“我的订单”，点击客户服务下的返修/退换货或商品右则的申请返修/退换货，出现返修及退换货首页，点击“申请”即可操作退换货及返修，提交成功后请耐心等待，由专业的售后工作人员受理您的申请。</p>
      </div>
    </div>
    <div class="list" style="border:none">
      <div class="question clearfix">
      	<span class="icon Left"></span>
        <strong class="common_right">退换货/维修需要多长时间？</strong>
      </div>
      <div class="answer clearfix">
      	<span class="icon Left"></span>
        <p class="common_right">一般情况下，退货处理周期（不包含检测时间）：自接收到问题商品之日起 7 日之内为您处理完成，各支付方式退款时间请点击查阅退款多久可以到账；<br>
						换货处理周期：自接收到问题商品之日起 15 日之内为您处理完成；<br>
                        正常维修处理周期：自接收到问题商品之日起 30 日内为您处理完成。
        </p>
      </div>
    </div>
  </div>
</div> </div>
        </div>
      </div>

    </div>
     
  </div>
  <div style="height:20px; line-height:20px; clear:both"></div>
  <div class="site-footer" style="border-top:1px solid #dfdfdf">
  <div class="wrapper">


<div class="sidebar-nav" style="height: 100%; top: 0px; bottom: auto;">
  <div class="mods">


    <span class="cart_arrow"><b class="arrow-1"></b> <b class="arrow-2"></b></span> </div>






      </div>
      

<script>
header_login();
</script>
</body></html>
@endsection