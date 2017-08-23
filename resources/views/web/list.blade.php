@extends('public.hindex')
@section('content')
	<meta name="csrf-token" content="{{ csrf_token() }}">

<script type="text/javascript">
	$('title').html('列表页');
</script>
<!-- 内容区 -->
<link rel="stylesheet" href="/webc/bootstrap.css" type="text/css">	
<script type="text/javascript" src="/webc/common/js/jquery-1.8.3.min.js"></script>	
<div class="w">
  <div class="breadcrumb"><i></i>
  				<a href="{{url('/index')}}">首页</a> 
  				<code>&gt;</code>
  				<a href="#">{{$list1}}</a> 
  </div>
</div>
<div class="blank"></div>
  <div class="w main">
  	  <div class="m" id="i-right">
  <div id="hotsale" class="hot-sales-main">
    <div class="hd">新品推荐</div>
    <div class="mc list-h">
	  @foreach($new as $tj)
      <dl>
        <dt><a target="_blank" href="/web/detail/{{$tj->id}}"><img src="{{$tj->pic}}" alt="{{$tj->name}}" height="100" width="100"></a></dt>
        <dd>
          <div class="p-name"><a target="_blank" href="/web/detail/{{$tj->id}}">{{$tj->name}}</a></div>
          <div class="p-price">特价：
                <font class="shop_price" style="font-size:14px; color:#DD0000; font-weight:bold;">
                        {{$tj->price}}                        
           </font></div>
          <div class="btns"><a href="/web/detail/{{$tj->id}}">查看详情</a></div>
        </dd>
      </dl>
    @endforeach

     </div>
  </div>
</div>

      <script type="text/javascript">
	
	var begin_hidden=0;
	function init_position_left()
	{
	var kuan1=document.getElementById('xxxccczzz').clientWidth;
	var kuan2=document.getElementById('attr_group_more').clientWidth;
	var kuan =(kuan1-kuan2)/2;
	document.getElementById('attr_group_more').style.left=kuan+"px";
	}
	function getElementsByName(tagName, eName)
	{  
	var tags = document.getElementsByTagName(tagName);  
	var returns = new Array();  
      
	if (tags != null && tags.length > 0) {  
        for (var i = 0; i < tags.length; i++) {  
            if (tags[i].getAttribute("name") == eName) {  
                returns[returns.length] = tags[i];  
            }  
        }  
	}  
	return returns;  
	}
	function Show_More_Attrgroup()
	{
		var attr_list_dl = getElementsByName('dl','attr_group_dl');
		var attr_group_more_text = document.getElementById('attr_group_more_text');
		if(begin_hidden==2)
		{
			for(var i=0;i<attr_list_dl.length;i++)
			{
				attr_list_dl[i].style.display= i >= begin_hidden ? 'none' : 'block';
			}
			attr_group_more_text.innerHTML="更多选项（" + attr_group_more_txt + "）";
			init_position_left();
			begin_hidden=0;
		}
		else
		{
			for(var i=0;i<attr_list_dl.length;i++)
			{
				attr_list_dl[i].style.display='block';				
			}
			attr_group_more_text.innerHTML="收起";
			init_position_left();
			begin_hidden=2;
		}
	}
	// 是否显示“更多”__初始化
	function init_more(boxid, moreid, height)
	{
	     var obj_brand=document.getElementById(boxid);
	     var more_brand = document.getElementById(moreid);
	     if (obj_brand.clientHeight > height)
	     {
		obj_brand.style.height= height+ "px";
		obj_brand.style.overflow="hidden";
		more_brand.innerHTML='<a href="javascript:void(0);"  onclick="slideDiv(this, \''+boxid+'\', \''+height+'\');" class="more_68ecshop_1" >更多</a>';
	     }
	 }
	 function slideDiv(thisobj, divID,Height)
	 {  
	     var obj=document.getElementById(divID).style;  
	     if(obj.height=="")
	     {  
               obj.height= Height+ "px";  
               obj.overflow="hidden";
	       thisobj.innerHTML="更多";
	       thisobj.className="more_68ecshop_1";
	        // 如果是品牌，额外处理
		if(divID=='brand_abox')
		{
		   //obj.width="456px";
		   getBrand_By_Zimu(document.getElementById('brand_zimu_all'),'');
	           document.getElementById('brand_sobox').style.display = "none";
		   document.getElementById('brand_zimu').style.display = "none";
		   document.getElementById('brand_abox_father').className="";
		 }
            }
	    else
	    {  
               obj.height="";  
               obj.overflow="";  
	       thisobj.innerHTML="收起";
	       thisobj.className="more_68ecshop_2";
	        // 如果是品牌，额外处理
		if(divID=='brand_abox')
		{
		   //obj.width="456px";
	           document.getElementById('brand_sobox').style.display = "block";
		   document.getElementById('brand_zimu').style.display = "block";
		   //getBrand_By_Zimu(document.getElementById('brand_zimu_all'),'');
		   document.getElementById('brand_abox_father').className="brand_more_ecshop68";
		 }
	     }  
	  
        }
	function getBrand_By_Name(val)
	{
	    val =val.toLocaleLowerCase();
	    var brand_list = document.getElementById('brand_abox').getElementsByTagName('li');    
	    for(var i=0;i<brand_list.length;i++)
	    {
		//document.getElementById('brand_abox').style.width="auto";
		var name_attr_value= brand_list[i].getAttribute("name").toLocaleLowerCase();
		if(brand_list[i].title.indexOf(val)==0 || name_attr_value.indexOf(val)==0 || val=='')
		{
			brand_list[i].style.display='block';
		}
		else
		{
			brand_list[i].style.display='none';
		}
	    }
	}
	//点击字母切换品牌
	function getBrand_By_Zimu(obj, zimu)
	{
		document.getElementById('brand_sobox_input').value="可搜索拼音、汉字查找品牌";
		obj.focus();
		var brand_zimu=document.getElementById('brand_zimu');
		var zimu_span_list = brand_zimu.getElementsByTagName('span');
		for(var i=0;i<zimu_span_list.length;i++)
		{
			zimu_span_list[i].className='';
		}
		var thisspan=obj.parentNode;
		thisspan.className='span';
		var brand_list = document.getElementById('brand_abox').getElementsByTagName('li');			
		for(var i=0;i<brand_list.length;i++)
		{	
			//document.getElementById('brand_abox').style.width="auto";
			if(brand_list[i].getAttribute('rel') == zimu || zimu=='')
			{
				brand_list[i].style.display='block';
			}
			else
			{
				brand_list[i].style.display='none';
			}
		}
	}
	var duoxuan_a_valid=new Array();
	// 点击多选， 显示多选区
	function showDuoXuan(dx_divid, a_valid_id)
	{	     
	     var dx_dl_68ecshop = document.getElementById('attr_list_ul').getElementsByTagName('dl');
	     for(var i=0;i<dx_dl_68ecshop.length;i++)
	     {
		dx_dl_68ecshop[i].className='';
	     }
	     var dxDiv=document.getElementById(dx_divid);
	     dxDiv.className ="duoxuan";
	     duoxuan_a_valid[a_valid_id]=1;
	     
	}
	function hiddenDuoXuan(dx_divid, a_valid_id)
	{
		var dxDiv=document.getElementById(dx_divid);
		dxDiv.className ="";
		duoxuan_a_valid[a_valid_id]=0;
		if(a_valid_id=='brand')
		{
			var ul_obj_68ecshop = document.getElementById('brand_abox');
			var li_list_68ecshop = ul_obj_68ecshop.getElementsByTagName('li');
			if(li_list_68ecshop)
			{
				for(var j=0;j<li_list_68ecshop.length;j++)
				{
					li_list_68ecshop[j].className="";
				}
			}
		}
		else
		{
			var ul_obj_68ecshop = document.getElementById('attr_abox_'+a_valid_id);
		}
		var input_list = ul_obj_68ecshop.getElementsByTagName('input');
		var span_list = ul_obj_68ecshop.getElementsByTagName('span');
		for(var j=0;j<input_list.length;j++)
		{
			input_list[j].checked=false;
		}
		if(span_list.length)
		{
			for(var j=0;j<span_list.length;j++)
			{
				span_list[j].className="color_ecshop68";
			}
		}
	}
	function duoxuan_Onclick(a_valid_id, idid, thisobj)
	{			
		if (duoxuan_a_valid[a_valid_id])
		{
			if (thisobj)
			{	
				var fatherObj = thisobj.parentNode;
				if (a_valid_id =="brand")
				{
					fatherObj.className = fatherObj.className == "brand_seled" ? "" : "brand_seled";
				}
				else
				{
					fatherObj.className =   fatherObj.className == "color_ecshop68" ? "color_ecshop68_seled" : "color_ecshop68";
					
				}
			}
			document.getElementById('chk_'+a_valid_id+'_'+idid).checked= !document.getElementById('chk_'+a_valid_id+'_'+idid).checked;
			return false;
		}
	}
	
	function duoxuan_Submit(dxid, indexid, attr_count, category, brand_id, price_min, price_max,  filter_attr,filter)
	{		
		var theForm =document.forms['theForm'];
		var chklist=theForm.elements['checkbox_'+ dxid+'[]'];
		var newpara="";
		var mm=0;
		for(var k=0;k<chklist.length;k++)
		{
			if(chklist[k].checked)
			{
				//alert(chklist[k].value);
				newpara += mm>0 ? "_" : "";
				newpara += chklist[k].value;
				mm++;
			}
		}
		if (mm==0) 
		{
			return false;
		}
		if(dxid=='brand')
		{
			brand_id = newpara;
		}
		else
		{
			var attr_array = new Array();
			filter_attr = filter_attr.replace(/\./g,",");
			attr_array=filter_attr.split(',');
			for(var h=0;h<attr_count;h++)
			{
				if(indexid == h){
					attr_array[indexid] = newpara;
				}else{
					if(attr_array[h]){
					}else{
					 attr_array[h] = 0;
					}
				}
			}
			filter_attr = attr_array.toString();
		}
		filter_attr = filter_attr.replace(/,/g,".");
		var url="other.php";
		//var url="category.php";
		url += "?id="+ category;
		url += brand_id ? "&brand="+brand_id : "";
		url += price_min ? "&price_min="+price_min : "&price_min=0";
		url += price_max ? "&price_max="+price_max : "&price_max=0";
		url += filter_attr ? "&filter_attr="+filter_attr : "&filter_attr=0";
		url += filter ? "&filter="+filter : "&filter=0";
		//location.href=url;
		return_url(url,dxid);
	}


	function return_url(url,dxid){
	  $.ajax({    
		    url:url,   
		    type:'get',
		    cache:false,
		    dataType:'text',
		    success:function(data){
		        var obj = document.getElementById('button_'+dxid);
		        obj.href = data;
			obj.click();
			//location.href=data;
		     }
		});
	}
	
	</script> 

      <div style="height:0px; line-height:0px; clear:both;"></div>
 <div class=""> 
      	<div class="box">
  <div class="" id="filter">
    <form method="GET" name="listform" action="category.php">
      <div class="fore1" style="border:none;">
        <dl class="order">
          <dt>排序：</dt>
          <dd class="has"><a href="/web/list/price?id={{$id}}">价格</a><b class="icon-order-DESCending"></b></dd>
          <dd class="has"><a href="/web/list/buynum?id={{$id}}">销量</a><b class="icon-order-DESCending"></b></dd>
          <dd class="has"><a href="/web/list/clicknum?id={{$id}}">人气</a><b class="icon-order-DESCending"></b></dd>
		</dl>
        <div style="height:0px; line-height:0px; clear:both;"></div>
      </div>
      <input name="category" value="14" type="hidden">
      <input name="display" value="grid" id="display" type="hidden">
      <input name="brand" value="0" type="hidden">
      <input name="price_min" value="0" type="hidden">
      <input name="price_max" value="0" type="hidden">
      <input name="filter_attr" value="0" type="hidden">
      <input name="page" value="1" type="hidden">
      <input name="sort" value="last_update" type="hidden">
      <input name="order" value="ASC" type="hidden">
    </form>
  </div>
      <form name="compareForm" action="compare.php" method="post" onsubmit="return compareGoods(this);">
            <div class="squares clearfix">
      <ul class="list_pic">

         @foreach($info as $row)
			

          <li class="item" style="margin-left:0px;" id="li_5">
          <div class="goods-content" style="position:relative">
            <div class="goods-pic"><a href="/web/detail/{{$row->id}}" target="_blank" title="{{$row->name}}">
            <img style="display: inline;" data-original="{{$row->pic}}" src="{{$row->pic}}" title="{{$row->name}}" class="pic_img_5"></a> 
            </div>
		          <div class="goods-info"> 
              <div class="goods-name"><a href="/web/detail/{{$row->id}}" target="_blank" title="{{$row->name}}">{{$row->name}}<em></em></a>
              </div>
              <div class="goods-price"> <em class="sale-price" title="本店价：58.0">{{$row->price}}</em> <em class="market-price" title="">{{$row->oldprice}}</em></div>
              <div class="sell-stat">
                <ul>
                  <li><a href="/web/detail/{{$row->id}}" class="status">{{$row->price}}</a>
                    <p>商品销量</p>
                  </li>
                  <li><a href="/web/detail/{{$row->id}}" target="_blank">评论表</a>
                    <p>用户评论</p>
                  </li>
                  <li><em member_id="46"><a class="chat chat_offline" href="javascript:;">{{$row->clicknum}}</a>&nbsp;</em>
                    <p>点击量</p>
                  </li>
                </ul>
              </div>
              <div class="store"> 
              		<a id="collect_5" href="javascript:collect(5);%20re_collect(5)" class="collet-btn"></a> 
              		<a class="compare-btn shop-compare" data-goods="5" data-type="0">		
              		</a> 
              </div>
              <div class="add-cart"> 
              	<a href="javascript:addToCart({{$row->id}});">
              		<i class="icon-shopping-cart"></i>
              		加入购物车
              	</a>
              </div>
            </div>
          </div>
        </li>
 @endforeach 
        </ul>
    	</div>
          </form>
     
</div>
<div class="blank5"></div>
<script type="Text/Javascript" language="JavaScript">
<!--
re_collect();
function re_collect(id)
{
  goods_id = (typeof(id) == "undefined" ? 0 : id);
  Ajax.call('user.php?act=re_collect', 'id=' + goods_id, re_collectResponse, 'GET', 'JSON');
}
function re_collectResponse(result)
{
  if (result.goods_id > 0)
  {
    document.getElementById("collect_" + result.goods_id).className = (result.is_collect == 1 ? "collet-btn collet-btn-t" : "collet-btn");
  }
  else
  {
    $("a[id^='collect_']").className = "collet-btn";
    for(i = 0; i < result.is_collect.length; i++)
    {
      document.getElementById("collect_" + result.is_collect[i]).className = "collet-btn collet-btn-t";
    }
  
  }
}
function selectPage(sel)
{
  sel.form.submit();
}
//-->
</script> 

<div style="width:100%; height:50px;"></div> 
<div align="center">
                          
	{!!$info->appends($request)->render()!!}
                   
</div>

</div>
 
<script type="text/javascript">
obj_h4 = document.getElementById("cate").getElementsByTagName("h3")
obj_ul = document.getElementById("cate").getElementsByTagName("ul")
obj_img = document.getElementById("cate").getElementsByTagName("div")
function tab(id)
{ 
		if(obj_ul.item(id).style.display == "block")
		{
			obj_ul.item(id).style.display = "none"
			obj_img.item(id).className = "item"
			return false;
		}
		else(obj_ul.item(id).style.display == "none")
		{
			obj_ul.item(id).style.display = "block"
			obj_img.item(id).className = "item current"
		}
}
</script>    
    <div style="height:0px; line-height:0px; clear:both;"></div>
  </div>
  
<script type="text/javascript" src="./js/scrollpic.js"></script>

<script type="text/javascript">

function clear_history()
{
Ajax.call('user.php', 'act=clear_history',clear_history_Response, 'GET', 'TEXT',1,1);
}
function clear_history_Response(res)
{
document.getElementById('history_list').innerHTML = '您已清空最近浏览过的商品';
}

$(".has").mouseover(function(){
	$(this).addClass('curr');
	// alert('eee');

}).mouseout(function(){
	$(this).removeClass('curr');
});

$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	});

function addToCart(shopid){



	// alert(id);
	$.post('/web/carttest',{id:shopid,num:1},function(data){
		alert('添加成功');
	})
}
</script> 
	<!-- 内容区结束 -->
@endsection