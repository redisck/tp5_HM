@extends('public.hindex')
@section('content')
<script type="text/javascript">
  $("title").html("购物车");

</script>
<!-- 购物车样式 -->
<link rel="stylesheet" type="text/css" href="/webc/common/css/style_jm.css">
 @if(empty($cart))
    <center>
    <div style="height:260px"></div>
    <div style="height:300px;color:#fa8f00;line-height:40px;font-size:20px;text-decoration:none;font-family:微软雅黑">
      购物车空空如也
      <a href="/index" class="jmcheckout" style="color:#fff;font-size:20px;text-decoration:none;">去购物吧</a>
    </div></center>
  @else
  <div class="block_jm">
	<div class="flowBox_jm" style="margin-top:10px;">
  <div class="title_jm">
    <form id="formCart1" name="formCart" method="post" action="flow.php">
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
      <tbody>
        <tr>
          <td align="center" width="8%">
            
            <!-- 全选的复选框 -->
            <input autocomplete="off" id="chkAll" name="chkAll" checked="checked"  style="height:28px;vertical-align:middle;" type="checkbox">全选

          </td>
          <td align="center" width="37%">店铺宝贝</td>
          <td align="center" width="15%">数量</td>
          <td align="center" width="15%">单价(元)</td>
          <td align="center" width="15%">小计</td>
          <td align="center" width="10%">操作</td></tr>
      </tbody>
    </table>
  </div>
  
    <!-- <table style="height:auto;width:100%;" cellpadding="0" cellspacing="0" align="center">
      <tbody>
      
        <tr height="35">
          <td style="text-indent:19px;;font-weight:bold;color:#F70">店铺：伊人化妆品专卖店
            <input name="supplierid" id="supplierid" value="6" type="hidden"></td></tr>
      </tbody>
    </table> -->
@foreach($cart as $row)
    <table style="height:auto;width:100%;border: 1px solid #ddd;" cellpadding="0" cellspacing="0" align="center">

      <tbody>
        <tr >
          <td style="width:100%;">
            <table border="0" cellpadding="5" cellspacing="1" width="100%">
              
              <tbody>
                <tr align="center" class='myclass'>
                  <td align="center" width="5%">
                    
                    <!-- 复选框 -->
                    <input autocomplete="off" name="goods" value="{{$row['id']}}" class="goods" checked="checked" type="checkbox">

                    </td>
                  <td align="center" width="40%">
                    <div class="thumb_name">
                      <dl>
                        <dt>
                          <a href="/web/detail/{{$row['id']}}" target="_blank">
                            <img src="{{$row['pic']}}" title="{{$row['name']}}" width="100px" height="100px"></a>
                        </dt>
                        <dd>
                          <a href="/web/detail/{{$row['id']}}" target="_blank" class="f6">{{$row['name']}}</a>
                          <br>
                          <font class="attrname"></font>
                        </dd>
                      </dl>
                    </div>
                  </td>
                  <td align="center" width="15%">
                    <div class="jm_cartnum">
                      
                      <a href="javascript:void(0)" class="jian"><span class="jmminu" >-</span></a>

                      <input name="goods_number[1101]"  value="{{$row['num']}}" size="4" class="jminputBg" type="text">

                      <!-- <input id="hidden_1101" value="1" type="hidden"> -->
                      <a href="javascript:void(0)" class="jia"><span class="jmadd">+</span></a>

                    </div>
                  </td>
                  <td align="center" width="15%">
                    <font class="zkflosw_danjia" id="goods_price_1101">{{$row['price']}}</font></td>
                  <td align="center" width="15%">
                    <font class="cart_jmprice" class="subtotal">{{$row['subtotal']}}</font></td>
                  <td align="center" width="10%">
                    <a href="javascript:void(0)" class="f6 mydel" >删除</a></td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
@endforeach
    <!-- <input name="step" id="actname" value="update_cart" type="hidden"> -->

  <table style="border-top:1px solid #ddd;" border="0" cellpadding="5" cellspacing="6" align="center" width="100%">
    <tbody>
      <tr>
        
        <td width="120">
          <a href="javascript:void(0)" class="jmclear">
            <font color="#aaaaaa" id="chkelse">反选</font>
          </a>
            <a href="javascript:void(0)" class="jmclear">
            <font color="#aaaaaa" id="chknone">全不选</font>
          </a>
            <a href="javascript:void(0)" class="jmclear">
            <font color="#aaaaaa" id="chkdel">删除</font>
          </a>
        </td>

        <td width="150">
          <a href="/index" class="continue_buy">继续购物</a>
        </td>

        <td align="right" width="80">
          <a href="/web/cart/clear" class="jmclear">
            <font color="#aaaaaa">清空购物车</font></a>
        </td>
        
        <td id="cart_money_info" align="right">应付总额：
        <span class="total" id="span1" >{{$row['total']}}</span>，比市场价<span id="span2"style="font-size:12px;font-weight:100;">{{$row['oldtotal']}}</span>节省了 <span id="span3" style="font-size:12px;font-weight:100;">{{$row['more']}}</span> (<span id="span4" style="font-size:12px;font-weight:100;">{{$row['percent']}}</span>%)</td>
        
        <td align="right" width="150">
          <!-- <a href="javascript:void(0);" id="statement" class="jmcheckout" style="color:#ffffff">去结算</a> -->
          <a href="/web/cart/check" id="statement" class="jmcheckout" style="color:#ffffff">去结算</a>
        </td>
  
      </tr>
    </tbody>
  </table>
  </form>
</div>
</div>
<script type="text/javascript">
//jquery入口文件
  $(function(){
    
    //减一
    $(".jian").click(function(){
        s=$(this);
      // alert();
      //获取input中的商品id值
      var id= $(this).closest('tr').children().children().val();
    
      $.get('/web/cart/edit',{id:id,a:-1},function(data){
          // alert(data);

          // alert(data['num']);
          s.next("input").attr('value',data['num']);
          s.closest('td').next('td').next('td').children().html(data['subtotal']);
          $('#span1').html(data['total']);
          $('#span2').html(data['oldtotal']);
          $('#span3').html(data['more']);
          $('#span4').html(data['percent']);

        },'json');
    })


     //加一
    $(".jia").click(function(){
        s=$(this);
        //获取input中的商品id值
        var id= $(this).closest('tr').children().children().val();
        $.get('/web/cart/edit',{id:id,a:1},function(data){
   
        s.prev("input").attr('value',data['num']);
        s.closest('td').next('td').next('td').children().html(data['subtotal']);
        $('#span1').html(data['total']);
        $('#span2').html(data['oldtotal']);
        $('#span3').html(data['more']);
        $('#span4').html(data['percent']);

      },'json');
  
    })
    

    //全选
    $("#chkAll").click(function(){
      //获取所有的商品
      var goods=$(".goods");
      //获取全选的属性
      var a= $("#chkAll").attr('checked');
      // alert(a);
      //遍历商品
      goods.each(function(){
        // alert(this.checked);
        //如果全选的选中,设置商品选中,否则不选中
        if(a=='checked'){
          // this.checked=true;
          $(this).attr('checked',true);
          // alert("aaa");
        }else{
          // this.checked=false;
          $(this).attr('checked',false);
        }
      })
      // alert('cart');
    })

    //反选
    $("#chkelse").click(function() {
      //获取所有的商品
      var goods=$(".goods");
      //获取选中的商品
      var chkgoods=$(".goods:checked");
      //所有的都选中
      goods.attr('checked','checked');
      //选中的取消
      chkgoods.attr('checked',false);
    })

    //全不选
    $("#chknone").click(function() {
      //获取所有的checkbox
      var chk=$(":checkbox");
      //设置所有的都不选
      chk.attr('checked',false);
    })

    //删除选中
    $("#chkdel").click(function(){
      // alert('aaa');
      var chkid = [];
      //获取所有的商品
      var goods=$(".goods");
      //获取所有选中的
      // var chkgoods=$(".goods:checked");
      goods.each(function(){
        if($(this).attr('checked')){
          id=$(this).val();
          chkid.push(id);
        }
      })
      var s = confirm('你确定删除吗?');
      if(s){
        // alert(chkid);
        $.get('/web/cart/chkdel',{chkid:chkid},function(data){
          // alert(data);
          //删除html样式
          for(var i=0;i<chkid.length;i++){
            $("input[value="+chkid[i]+"]:checkbox").parents("table").remove();
          }

          $('#span1').html(data['total']);
          $('#span2').html(data['oldtotal']);
          $('#span3').html(data['more']);
          $('#span4').html(data['percent']);
        },"json");
      }
    })

  
   //删除单条
    $("a.mydel").click(function(){
      // alert('aaa');
      //获取input中的商品id值
      var id = $(this).closest('tr').children().children().val();
      // alert(id);
      $.get('/web/cart/del',{id:id},function(data){
        // alert(data);
        //删除html样式
        $("input[value="+id+"]:checkbox").parents("table").remove();
        
        $('#span1').html(data['total']);
        $('#span2').html(data['oldtotal']);
        $('#span3').html(data['more']);
        $('#span4').html(data['percent']);


      },"json");
    })


  })

</script>
@endif
@endsection