@extends('public.hindex')
@section('content')
<!-- lunbo -->
<style type="text/css">
  
  #dd1{
    width:30px;
    height:30px;
    background-color: orange;
    line-height:30px;
    text-align:center;
    border-radius:30px;
    cursor:pointer;
    position:absolute;
    left:260px;
    top:430px;

  }
</style>
<div class="home-focus-layout">
			<ul id="" class="full-screen-slidesaa">
    <li>
        @foreach($pic as $row)
           <img name="myimg" width="780px" height="508px" src="{{$row->lunbopic}}" style="display:none">
        @endforeach

     <!--   <img name="myimg" width="780px" height="508px" src="/webc/lunbo/1.jpg">  
       <img name="myimg" width="780px" height="508px" src="/webc/lunbo/2.jpg" style="display:none"> 
       <img name="myimg" width="780px" height="508px" src="/webc/lunbo/3.jpg" style="display:none"> 
       <img name="myimg" width="780px" height="508px" src="/webc/lunbo/4.jpg" style="display:none"> 
       <img name="myimg" width="780px" height="508px" src="/webc/lunbo/5.jpg" style="display:none">  -->
    </li>
    @foreach($pic as $row)
         <div id="dd1" name="anniu"></div>
    @endforeach   
    
    

   
  </ul>
  

			<div class="right-sidebar">
<div class="order_type" style="height:455px;background:#FFFFFF;">
  <div class="title">商城公告</div>
  
<div class="tabs-panel ">
  <ul class="mall-news">
        @foreach($notice as $key=>$row)
        <li>
          <i>{{$key+1}}</i>
          <a target="_blank" href="">{{$row->contens}}</a> </li>
        @endforeach
       <!--  <li><i>1</i><a target="_blank" href="" title="商家帮助指南">商家帮助指南 </a> </li> -->
       
  </ul>
</div>
</div>
				<div class="tabs-panel" style="background:#FFFFFF;">
                    <a href="" title="申请商家入驻；已提交申请，可查看当前审核状态。" class="store-join-btn" target="_blank">&nbsp;</a>
                    <a href="" target="_blank" class="store-join-help">
                        <i class="icon-cog"></i>
                        登录商家管理中心
                    </a>
				</div>
		
			</div>
		</div>
  <!-- 轮播图特效 -->
   <script type="text/javascript">

  m=-1;
  //获取图片集合对象(根据指定的名称获取图片元素集合)
  list=document.getElementsByName('myimg');
  //获取按钮对象集合
  list1=document.getElementsByName('anniu');
  // alert(list1.length);
  x=260;
  //遍历

  for(var i=0;i<list1.length;i++){

    //鼠标移入
    list1[i].onmouseover=function(){
      this.style.backgroundColor="pink";
      clearTimeout(mytime);
      m=this.innerHTML-1;
      show(m);
    }

    //鼠标移出
    list1[i].onmouseout=function(){
      this.style.backgroundColor="orange";
      m--;
      running();
    };

    list1[i].style.left=x+"px";
    list1[i].innerHTML=i+1;
  
    x+=50;
  }
  
  function show(m){
    //遍历
    for(var i=0;i<list.length;i++){
      if(m==i){
        list[i].style.display="block";
        list1[i].style.backgroundColor="pink";
      }else{
        list[i].style.display="none";
        list1[i].style.backgroundColor="orange";
      }
    }
  }
  function running(){
    m++;
    if(m==list.length){
      m=0;
    }
    show(m);
    mytime=setTimeout(running,1500);
  }
  running();

</script>
<!-- lunboend -->

<!-- seciton tow -->

 <script type="text/javascript">function fun(type_id, no_have_val) {
    no_have = (typeof(no_have_val) == "undefined" ? 0 : no_have_val) Ajax.call('user.php?act=user_bonus', 'id=' + type_id + '&no_have=' + no_have, collectResponse, 'GET', 'JSON');
  }
  function collectResponse(result) {
    alert(result.message);
  }</script>
<div class="blank5"></div>
<div class="home-sale-layout wrapper">
  <div class="left-layout">
    <ul class="tabs-nav">
     <!--  <li class="">
        <i class="arrow"></i>
        <h3>疯狂抢购</h3></li> -->
   
      <li class="">
        <i class="arrow"></i>
        <h3>新品上市</h3></li>
    </ul>
 
   <!--  <div class="tabs-panel sale-goods-list">
      <ul>
        <li>
          <dl>
            <dt class="goods-name">
              <a target="_blank" href="http://www.mailaing.com/goods.php?id=245" title="">李延震</a></dt>
            <dd class="goods-thumb">
              <a target="_blank" href="http://www.mailaing.com/goods.php?id=245" title="">
                <img src="./买啦网 - 买!我所爱_files/245_thumb_G_1469681885996.jpg" alt=""></a>
            </dd>
            <dd class="goods-price">商城价：
              <em>0.12</em></dd>
          </dl>
        </li>
        <li>
          <dl>
            <dt class="goods-name">
              <a target="_blank" href="http://www.mailaing.com/goods.php?id=249" title="">刘浩</a></dt>
            <dd class="goods-thumb">
              <a target="_blank" href="http://www.mailaing.com/goods.php?id=249" title="">
                <img src="./买啦网 - 买!我所爱_files/249_thumb_G_1469685506337.jpg" alt=""></a>
            </dd>
            <dd class="goods-price">商城价：
              <em>0.00</em></dd>
          </dl>
        </li>
        <li>
          <dl>
            <dt class="goods-name">
              <a target="_blank" href="http://www.mailaing.com/goods.php?id=250" title="">军涛</a></dt>
            <dd class="goods-thumb">
              <a target="_blank" href="http://www.mailaing.com/goods.php?id=250" title="">
                <img src="./买啦网 - 买!我所爱_files/250_thumb_G_1469686902379.jpg" alt=""></a>
            </dd>
            <dd class="goods-price">商城价：
              <em>0.01</em></dd>
          </dl>
        </li>
        <li>
          <dl>
            <dt class="goods-name">
              <a target="_blank" href="http://www.mailaing.com/goods.php?id=243" title="">图片商品</a></dt>
            <dd class="goods-thumb">
              <a target="_blank" href="http://www.mailaing.com/goods.php?id=243" title="">
                <img src="./买啦网 - 买!我所爱_files/243_thumb_G_1468369162429.jpg" alt=""></a>
            </dd>
            <dd class="goods-price">商城价：
              <em>2.00</em></dd>
          </dl>
        </li>
        <li>
          <dl>
            <dt class="goods-name">
              <a target="_blank" href="http://www.mailaing.com/goods.php?id=240" title="">裤子</a></dt>
            <dd class="goods-thumb">
              <a target="_blank" href="http://www.mailaing.com/goods.php?id=240" title="">
                <img src="./买啦网 - 买!我所爱_files/1409272951415985699.jpg" alt=""></a>
            </dd>
            <dd class="goods-price">商城价：
              <em>45.00</em></dd>
          </dl>
        </li>
        <li>
          <dl>
            <dt class="goods-name">
              <a target="_blank" href="http://www.mailaing.com/goods.php?id=240" title="">裤子</a></dt>
            <dd class="goods-thumb">
              <a target="_blank" href="http://www.mailaing.com/goods.php?id=240" title="">
                <img src="./买啦网 - 买!我所爱_files/1409272951415985699.jpg" alt=""></a>
            </dd>
            <dd class="goods-price">商城价：
              <em>45.00</em></dd>
          </dl>
        </li>
      </ul>
    </div> -->
   <!--  <div class="tabs-panel sale-goods-list tabs-hide">
      <ul>
        <li>
          <dl>
            <dt class="goods-name">
              <a target="_blank" href="http://www.mailaing.com/goods.php?id=220" title="润本（RUNBEN）驱蚊手环 植物精油驱蚊贴3条装">润本（RUNBEN）驱蚊手环 植物精油驱蚊贴3条...</a></dt>
            <dd class="goods-thumb">
              <a target="_blank" href="http://www.mailaing.com/goods.php?id=220" title="润本（RUNBEN）驱蚊手环 植物精油驱蚊贴3条装">
                <img src="./买啦网 - 买!我所爱_files/220_thumb_G_1437585995276.jpg" alt="润本（RUNBEN）驱蚊手环 植物精油驱蚊贴3条装"></a>
            </dd>
            <dd class="goods-price">商城价：
              <em>13.5</em></dd>
          </dl>
        </li>
        <li>
          <dl>
            <dt class="goods-name">
              <a target="_blank" href="http://www.mailaing.com/goods.php?id=119" title="艾生活 真皮床双人床 独特围边 精细做工 卧室家具">艾生活 真皮床双人床 独特围边 精细做工 卧室家...</a></dt>
            <dd class="goods-thumb">
              <a target="_blank" href="http://www.mailaing.com/goods.php?id=119" title="艾生活 真皮床双人床 独特围边 精细做工 卧室家具">
                <img src="./买啦网 - 买!我所爱_files/119_thumb_G_1437525155564.jpg" alt="艾生活 真皮床双人床 独特围边 精细做工 卧室家具"></a>
            </dd>
            <dd class="goods-price">商城价：
              <em>3260.0</em></dd>
          </dl>
        </li>
        <li>
          <dl>
            <dt class="goods-name">
              <a target="_blank" href="http://www.mailaing.com/goods.php?id=113" title="苹果（Apple）iPhone 6 Plus (A1524) 16GB 金色 移动联通电信4G手机">苹果（Apple）iPhone 6 Plus (...</a></dt>
            <dd class="goods-thumb">
              <a target="_blank" href="http://www.mailaing.com/goods.php?id=113" title="苹果（Apple）iPhone 6 Plus (A1524) 16GB 金色 移动联通电信4G手机">
                <img src="./买啦网 - 买!我所爱_files/113_thumb_G_1437524324289.jpg" alt="苹果（Apple）iPhone 6 Plus (A1524) 16GB 金色 移动联通电信4G手机"></a>
            </dd>
            <dd class="goods-price">商城价：
              <em>5688.0</em></dd>
          </dl>
        </li>
        <li>
          <dl>
            <dt class="goods-name">
              <a target="_blank" href="http://www.mailaing.com/goods.php?id=188" title="SENBOWE 安卓系统遥控摄像视频间谍汽车玩具 白色">SENBOWE 安卓系统遥控摄像视频间谍汽车玩具...</a></dt>
            <dd class="goods-thumb">
              <a target="_blank" href="http://www.mailaing.com/goods.php?id=188" title="SENBOWE 安卓系统遥控摄像视频间谍汽车玩具 白色">
                <img src="./买啦网 - 买!我所爱_files/188_thumb_G_1437532927406.jpg" alt="SENBOWE 安卓系统遥控摄像视频间谍汽车玩具 白色"></a>
            </dd>
            <dd class="goods-price">商城价：
              <em>348.0</em></dd>
          </dl>
        </li>
        <li>
          <dl>
            <dt class="goods-name">
              <a target="_blank" href="http://www.mailaing.com/goods.php?id=203" title="PowerCube魔方插座接线板 创意多功能荷兰Allocacoc模方插座 办公神器 USB款/无延长线直插(蓝)">PowerCube魔方插座接线板 创意多功能荷兰...</a></dt>
            <dd class="goods-thumb">
              <a target="_blank" href="http://www.mailaing.com/goods.php?id=203" title="PowerCube魔方插座接线板 创意多功能荷兰Allocacoc模方插座 办公神器 USB款/无延长线直插(蓝)">
                <img src="./买啦网 - 买!我所爱_files/203_thumb_G_1437534951257.jpg" alt="PowerCube魔方插座接线板 创意多功能荷兰Allocacoc模方插座 办公神器 USB款/无延长线直插(蓝)"></a>
            </dd>
            <dd class="goods-price">商城价：
              <em>49.0</em></dd>
          </dl>
        </li>
      </ul>
    </div>
    <div class="tabs-panel sale-goods-list tabs-hide">
      <ul>
        <li>
          <dl>
            <dt class="goods-name">
              <a target="_blank" href="http://www.mailaing.com/goods.php?id=140" title="雅鹿全棉四件套纯棉套件床上用品 回忆蓝 1.8米床">雅鹿全棉四件套纯棉套件床上用品 回忆蓝 1.8米...</a></dt>
            <dd class="goods-thumb">
              <a target="_blank" href="http://www.mailaing.com/goods.php?id=140">
                <img src="./买啦网 - 买!我所爱_files/140_thumb_G_1437528915082.jpg" alt="雅鹿全棉四件套纯棉套件床上用品 回忆蓝 1.8米床"></a>
            </dd>
            <dd class="goods-price">商城价：
              <em>333.0</em></dd>
          </dl>
        </li>
        <li>
          <dl>
            <dt class="goods-name">
              <a target="_blank" href="http://www.mailaing.com/goods.php?id=180" title="果啤330ml*24听水蜜桃口味 果酒">果啤330ml*24听水蜜桃口味 果酒</a></dt>
            <dd class="goods-thumb">
              <a target="_blank" href="http://www.mailaing.com/goods.php?id=180">
                <img src="./买啦网 - 买!我所爱_files/180_thumb_G_1437532312198.jpg" alt="果啤330ml*24听水蜜桃口味 果酒"></a>
            </dd>
            <dd class="goods-price">商城价：
              <em>75.0</em></dd>
          </dl>
        </li>
        <li>
          <dl>
            <dt class="goods-name">
              <a target="_blank" href="http://www.mailaing.com/goods.php?id=43" title="恩诺童新生儿奶瓶宝宝宽口径ppsu婴儿奶瓶">恩诺童新生儿奶瓶宝宝宽口径ppsu婴儿奶瓶</a></dt>
            <dd class="goods-thumb">
              <a target="_blank" href="http://www.mailaing.com/goods.php?id=43">
                <img src="./买啦网 - 买!我所爱_files/43_thumb_G_1437515785217.jpg" alt="恩诺童新生儿奶瓶宝宝宽口径ppsu婴儿奶瓶"></a>
            </dd>
            <dd class="goods-price">商城价：
              <em>59.0</em></dd>
          </dl>
        </li>
        <li>
          <dl>
            <dt class="goods-name">
              <a target="_blank" href="http://www.mailaing.com/goods.php?id=159" title="统一 小茗同学 480ml/瓶 新品上市">统一 小茗同学 480ml/瓶 新品上市</a></dt>
            <dd class="goods-thumb">
              <a target="_blank" href="http://www.mailaing.com/goods.php?id=159">
                <img src="./买啦网 - 买!我所爱_files/159_thumb_G_1437530614630.jpg" alt="统一 小茗同学 480ml/瓶 新品上市"></a>
            </dd>
            <dd class="goods-price">商城价：
              <em>5.0</em></dd>
          </dl>
        </li>
        <li>
          <dl>
            <dt class="goods-name">
              <a target="_blank" href="http://www.mailaing.com/goods.php?id=38" title="高端2015夏装新款修身淑坊女女装蕾丝短袖复古森女连衣裙装">高端2015夏装新款修身淑坊女女装蕾丝短袖复古森...</a></dt>
            <dd class="goods-thumb">
              <a target="_blank" href="http://www.mailaing.com/goods.php?id=38">
                <img src="./买啦网 - 买!我所爱_files/38_thumb_G_1437514275132.jpg" alt="高端2015夏装新款修身淑坊女女装蕾丝短袖复古森女连衣裙装"></a>
            </dd>
            <dd class="goods-price">商城价：
              <em>178.0</em></dd>
          </dl>
        </li>
      </ul>
    </div> -->
    <div class="tabs-panel sale-goods-list">
      <ul>

        @foreach($newshop as $row)
        <li>
          <dl>
            <dt class="goods-name">
              <a target="_blank" href="/web/detail/{{$row->id}}" title="{{$row->name}}">{{$row->name}}</a></dt>
            <dd class="goods-thumb">
              <a target="_blank" href="/web/detail/{{$row->id}}" title="{{$row->name}}">
                <img  src="{{$row->pic}}" alt="{{$row->name}}" style="display: inline;"></a>
            </dd>
            <dd class="goods-price">商城价：
              <em>{{$row->price}}</em></dd>
          </dl>
        </li>
        @endforeach

        <!--  <li>
          <dl>
            <dt class="goods-name">
              <a target="_blank" href="" title="优雅100 经典设计款全棉斜纹印花四件套">优雅100 经典设计款全棉斜纹印花四件套</a></dt>
            <dd class="goods-thumb">
              <a target="_blank" href="" title="优雅100 经典设计款全棉斜纹印花四件套">
                <img data-original="images/201507/thumb_img/139_thumb_G_1437528892306.jpg" src="/webc/common/img/229_thumb_G_1437587547996.jpg" alt="优雅100 经典设计款全棉斜纹印花四件套" style="display: inline;"></a>
            </dd>
            <dd class="goods-price">商城价：
              <em>189.0</em></dd>
          </dl>
        </li> -->
       
      </ul>
    </div>
  </div>
  
</div>
<div class="blank5"></div>


 <!-- end section tow -->


 <!-- section 3 -->
 
<div class="floorList">
  <div class="floor"></div>
  <script type="text/javascript">function Move(btn1, btn2, box, btnparent, shu) {
      var llishu = $(box).first().children().length;
      var liwidth = 121;
      var boxwidth = llishu * liwidth - 1;
      var shuliang = llishu - shu;
      $(box).css('width', '' + boxwidth + 'px');
      var num = 0;
      $(btn1).click(function() {
        num++;
        if (num & gt; shuliang) {
          num = shuliang;
        }
        var move = -liwidth * num;
        $(this).closest(btnparent).find(box).stop().animate({
          'left': '' + move + 'px'
        },
        300);
      });
      $(btn2).click(function() {
        num--;
        if (num & lt; 0) {
          num = 0;
        }
        var move = liwidth * num;
        $(this).closest(btnparent).find(box).stop().animate({
          'left': '' + -move + 'px'
        },
        300);
      })
    }</script>
  <div class="w floor">
    <div class="floor02 clearfix">
      <div class="home-standard-layout tm-chaoshi-floorlayout style-one" id="f0">
        <a class="j_ItemInfo_tong" href="">
          <img width="1210" height="100" style="display: inline;" alt="" src="/webc/common/img/1437500451024703742.jpg" ></a>
        <div class="m-floor">
          <div class="header left_floor">
            <h2>
              <span>1F</span>
              <a target="_blank" href="">食品生鲜</a></h2>
            <div class="recommend">
              <div class="words">
               
                       @foreach($data[0] as $key=>$row)
                            <a href="/web/list?id={{$row->id}}">
                               <b>{{$row->name}}</b>
                            </a>
                      @endforeach
              </div>
             
              <a class="banner" target="_blank" href="">
                <img width="240" height="297" style="display: inline;" src="/webc/common/img/1437498557902889630.jpg" ></a>
            </div>
          </div>
          <div class="content mid_floor">
            <div class="goods">
              <div class="middle-layout">
                <ul class="tabs-nav">
                  <!-- <li class="">
                    <h3>精挑细选</h3></li>
                  <li class="">
                    <h3>进口水果</h3></li>
                  <li class="">
                    <h3>糖果巧克力</h3></li>
                  <li class="tabs-selected">
                    <h3>牛奶乳品</h3></li> -->
                </ul>
                <div class="tabs-panel">
                  @foreach($fdata[0][0] as $row)
                  <div id="li_13" class="j_ItemInfo">
                    <div class="wrap">
                      <a title="{{$row->name}}" href="/web/detail/{{$row->id}}" target="_blank">
                        <img width="160" height="160" style="display: block;" class="pic_img_13" alt="{{$row->name}}" src="{{$row->pic}}" data-original="images/201507/thumb_img/13_thumb_G_1437503573325.jpg"></a>
                      <p class="title">
                        <a title="{{$row->name}}" href="/web/detail/{{$row->id}}" target="_blank">{{$row->name}}</a></p>
                      <p class="o-price">{{$row->oldprice}}</p>
                      <p class="price">
                        <span class="j_CurPrice">{{$row->price}}</span></p>
                      <a title="加入购物车" onclick="addToCart(13)" class="j_AddCart"></a>
                      <i class="product-mask"></i>
                    </div>
                  </div>
                  @endforeach



               <!--    <div id="li_16" class="j_ItemInfo">
                    <div class="wrap">
                      <a title="畅享礼盒 奇异果火龙果佳节送礼进口新鲜水果" href="" target="_blank">
                        <img width="160" height="160" style="display: block;" class="pic_img_16" alt="畅享礼盒 奇异果火龙果佳节送礼进口新鲜水果" src="/webc/common/img/16_thumb_G_1437503698428.jpg"></a>
                      <p class="title">
                        <a title="畅享礼盒 奇异果火龙果佳节送礼进口新鲜水果" href="" target="_blank">畅享礼盒 奇异果火龙果佳节送礼进口新鲜水果</a></p>
                      <p class="o-price">200.0</p>
                      <p class="price">
                        <span class="j_CurPrice">168.0</span></p>
                      <a title="加入购物车" onclick="addToCart(16)" class="j_AddCart"></a>
                      <i class="product-mask"></i>
                    </div>
                  </div> -->
                              
                </div>
             
              </div>
            </div>
          </div>
          <div class="promo">
            <a class="j_ItemInfo" href="">
              <img width="150" height="278" style="display: inline;" alt="" src="webc/common/img/1437498774407314769.jpg" ></a>
            <a class="j_ItemInfo" href="">
              <img width="150" height="279" style="display: inline;" alt="" src="webc/common/img/1437498791542281098.jpg"></a>
          </div>
          <div class="promo_brand">
            <div class="recommend-brand">
              <div class="gw_con">
                <div class="anli">
                  <div class="anli_con">
                    <ul style="position: absolute; width: 1572px; height: 40px; top: 0px; left: 0px;" class="yyyy_1 anli_con_num">
                    @foreach($adv as $row)
                      <li class="fore1">
                        <a title="{{$row->advsname}}" target="_blank" href="{{$row->advslink}}">
                          <img width="100" height="40" alt="{{$row->advsname}}" src="{{$row->advspic}}"></a>
                      </li>
                    @endforeach

                     <!--  <li>
                        <a title="伊利" target="_blank" href="http://www.mailaing.com/category.php?id=1&amp;brand=41">
                          <img width="100" height="40" alt="伊利" src="./买啦网 - 买!我所爱_files/1437431337248235690.jpg"></a>
                      </li> -->
                    
                     
                     
                     
                    </ul>
                    <div style="display: none;" class="anniu">
                      <a href="javascript:void(0)" class="gw_left right_1">
                        <img src="./买啦网 - 买!我所爱_files/icon-slide-left.png"></a>
                      <a href="javascript:void(0)" class="gw_right left_1">
                        <img src="./买啦网 - 买!我所爱_files/icon-slide-right.png"></a>
                    </div>
                  </div>
                </div>
              </div>
              <script type="text/javascript">Move(".left_1", ".right_1", ".yyyy_1", ".anli", "10");</script></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="blank5"></div>
  <div class="w floor">
    <div class="floor02 clearfix">
      <div class="home-standard-layout tm-chaoshi-floorlayout  style-two" id="f0">
        <div class="m-floor" style="height:600px">
          <div class="header left_floor">
            <h2>
              <span>2F</span>
              <a target="_blank" href="http://www.mailaing.com/category.php?id=2">服装服饰</a></h2>
            <div class="recommend">
              <div class="words">

                @foreach($data[1] as $key=>$row)
                    <a href="/web/list?id={{$row->id}}">
                       <b>{{$row->name}}</b>
                    </a>
                @endforeach
                 
              </div>
              <a class="banner" target="_blank" href="">
                <img width="240" height="297" style="display: inline;" src="/webc/common/img/1437498339486690622.jpg" ></a>
            </div>
          </div>
          <div class="content mid_floor">
            <div class="goods">
              <div class="middle-layout">
                <ul class="tabs-nav">
                 <!--  <li class="tabs-selected">
                    <h3>精挑细选</h3></li>
                  <li class="">
                    <h3>女装馆</h3></li>
                  <li class="">
                    <h3>内衣馆</h3></li>
                  <li class="">
                    <h3>男装馆</h3></li> -->
                </ul>
                <div class="tabs-panel">
                  @foreach($fdata[1][0] as $row)
                  <div id="li_40" class="j_ItemInfo">
                    <div class="wrap">
                      <a title="{{$row->name}}" href="/web/detail/{{$row->id}}" target="_blank">
                        <img width="160" height="160" style="display: block;" class="pic_img_40" alt="{{$row->name}}" src="{{$row->pic}}" ></a>
                      <p class="title">
                        <a title="{{$row->name}}" href="/web/detail/{{$row->id}}" target="_blank">{{$row->name}}</a></p>
                      <p class="o-price">{{$row->oldprice}}</p>
                      <p class="price">
                        <span class="j_CurPrice">{{$row->price}}</span></p>
                      <a title="加入购物车" onclick="addToCart(40)" class="j_AddCart"></a>
                      <i class="product-mask"></i>
                    </div>
                  </div>
                  @endforeach
               <!--    <div id="li_46" class="j_ItemInfo">
                    <div class="wrap">
                      <a title="2015夏季小西装女外套夏装薄款韩版修身短款小西服" href="http://www.mailaing.com/goods.php?id=46" target="_blank">
                        <img width="160" height="160" style="display: block;" class="pic_img_46" alt="2015夏季小西装女外套夏装薄款韩版修身短款小西服" src="./买啦网 - 买!我所爱_files/46_thumb_G_1437516342367.jpg" data-original="images/201507/thumb_img/46_thumb_G_1437516342367.jpg"></a>
                      <p class="title">
                        <a title="2015夏季小西装女外套夏装薄款韩版修身短款小西服" href="http://www.mailaing.com/goods.php?id=46" target="_blank">2015夏季小西装女外套夏装薄款韩版修身短款小西...</a></p>
                      <p class="o-price">255.6</p>
                      <p class="price">
                        <span class="j_CurPrice">213.0</span></p>
                      <a title="加入购物车" onclick="addToCart(46)" class="j_AddCart"></a>
                      <i class="product-mask"></i>
                    </div>
                  </div> -->
                 

                 
                </div>
        
              </div>
            </div>
          </div>
          <div class="promo">
            <a class="j_ItemInfo" href="">
              <img width="150" height="278" style="display: inline;" alt="" src="/webc/common/img/1437498928420613316.jpg"></a>
            <a class="j_ItemInfo" href="">
              <img width="150" height="279" style="display: inline;" alt="" src="/webc/common/img/1437498984255336373.jpg" ></a>
          </div>
       
        </div>
      </div>
    </div>
  </div>
  <div class="blank5"></div>
</div>


<div>
  <ul style="padding-left:180px">
    @foreach($ldata as $row)
    <a style="margin-left:35px" href="{{$row->linkaddress}}">{{$row->linkname}}</a>
    @endforeach
    <!-- <a style="margin-left:35px" href="">小米科技</a> -->
    
  </ul>
</div>
 <!-- endsection 3 -->


	<div class="wrapper">
		<div class="mt10">
			
		</div>
	</div>

	<div class="n-footer"></div>
	<script type="text/javascript" src="/webc/common/js/indexPrivate.min.js"></script>
	<!-- section 4 -->
	
<script type="text/javascript">
Ajax.call('api/okgoods.php', '', '', 'GET', 'JSON');
$("img").lazyload({
    effect       : "fadeIn",
	 skip_invisible : true,
	 failure_limit : 20
});
</script>



<!-- section2的特效 -->

<!-- <script type="text/javascript" src="/webc/common/js/home_index.js"></script> -->

<script type="text/javascript">

  $(function(){
    $("#mysetcom").css('display','block');
  })
  
</script>


  <div class="blank"></div>

  

@endsection