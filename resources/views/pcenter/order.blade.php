@extends('pcenter.public.index')
@section('content')
<!-- <link rel="stylesheet" href="/webc/bootstrap/css/bootstrap.min.css" type="text/css"> -->
<script type="text/javascript" src="/webc/common/js/jquery-1.8.3.min.js"></script>  
<div class="AreaR"> 
<div style="width: 100%;height: 50px;border: 1px #ccc solid;line-height: 50px;background-color: #fdfdfd">
                  <span style="color: #858585;margin-left: 50px;">宝贝</span>
                  <span style="color: #858585;margin-left: 110px;">名称</span>
                  <span style="color: #858585;margin-left: 160px;">单价(元)</span>
                  <span style="color: #858585;margin-left: 29px;">数量</span>
                  <span style="color: #858585;margin-left: 35px;">商品操作</span>
                  <span style="color: #858585;margin-left: 50px;">实付款(元)</span>
                  <span style="color: #858585;margin-left: 45px;">交易状态</span>
                  <span style="color: #858585;margin-left: 45px;">交易操作</span>
                 </div>
        @foreach($order as $list)
        @foreach($list as $row)
                 <div class="mydiv" style="margin-top: 30px;width: 100%;height: 150px;border: 1px #addff8 solid;">
                 <div style="width: 100%;height: 50px;background-color: #eaf9ff;vertical-align: middle;font-size: 12px;">
                    <td align="center" width="5%">
                    
                    <!-- 复选框 -->
                    <input autocomplete="off" style="line-height: 50px;margin-left: 20px;" name="goods" class="goods" value="{{$row->orderid}}" checked="checked" type="checkbox">

                    </td>
                   <span style="line-height: 50px;">{{$row->oaddtime}}</span>
                   <span style="line-height: 50px;margin-left: 20px;">订单号：{{$row->ordernum}}</span>
                   <span style="line-height: 50px;margin-left: 100px;">买啦网</span>
                   <span  style="margin-left:400px;">
                     <a @if($row->orstatus==4)href="/web/pcenter/pingjia?goodsid={{$row->goodsid}}"@endif>去评价</a>
                   </span>
                 </div> 
                 <div style="float: left;width: 65%;height: 93px;">
                  <div style="width: 100%;">
                  <img style="height: 100px;float:left;" src="{{$row->spic}}">
                  <dl style="width: 220px;float: left;margin-left: 20px;margin-top: 20px;">{{$row->sname}}</dl>
                    <del style="display: inline-block;margin-left: -38px;margin-top: 20px;color: #858585;">￥{{$row->oprice}}</del>
                    <dl style="float: left;margin-left: 50px;margin-top: 40px;">￥{{$row->sprice}}</dl>
                    <span style="margin-left: 40px;">{{$row->num}}</span>
                    <dl style="float: right;margin-right: 50px;margin-top: 20px;">退款/退货
                    </dl>
                    </div>
                    
                    
                    
                 </div> 
                 
                 <div style="float: left;border-left: 1px #addff8 solid;width: 11%;height:100px;text-align: center;">
                  
                  <span style="font-weight: bold;margin-top: 30px;display: block;">￥{{$row->ortotal}}</span>
                  <dl>(含运费:00)</dl>
                  
                 </div>
                 <div style="float: left;border-left: 1px #addff8 solid;width: 11%;height:100px;text-align: center ;">
                  <dl style="margin-top: 30px;">{{$statuslist[$row->orstatus]}}</dl>  
                 </div>
                 <div style="float: left;border-left: 1px #addff8 solid;width: 11%;height:100px;text-align: center ;">
                  <button style="color:#666; cursor:pointer;background-color:#EAF9FF;border: 0px;padding: 4px;margin-top: 25px;" value="{{$row->orstatus}}" class="queren" style="display:none" @if($row->orstatus==4) disabled @endif >确认收货</button>
                 </div>
                
        </div>
        @endforeach
        @endforeach
        <br>
        <td width="120">  
            <!-- 全选的复选框 -->
            <input autocomplete="off" id="chkAll" name="chkAll" checked="checked"  style="height:28px;vertical-align:middle;" type="checkbox">
            <a href="javascript:void(0)" class="jmclear">
            <font color="#aaaaaa" id="chkAll">全选　</font>
          </a>
          <a href="javascript:void(0)" class="jmclear">
            <font color="#aaaaaa" id="chkelse">反选　</font>
          </a>
            <a href="javascript:void(0)" class="jmclear">
            <font color="#aaaaaa" id="chknone">全不选　</font>
          </a>
            <a href="javascript:void(0)" class="jmclear">
            <font color="#aaaaaa" id="chkdel">删除</font>
          </a>
        </td>
        <div style="width:100%; height:20px;"></div> 
        <div align="center">

</div>
</div>
<script type="text/javascript">
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
      var orderid = [];
      //获取所有的商品
      var goods=$(".goods");
      //获取所有选中的
      // var chkgoods=$(".goods:checked");
      goods.each(function(){
        if($(this).attr('checked')){
          id=$(this).val();
          orderid.push(id);
        }
      })
      var s = confirm('你确定删除吗?');
     
      if(s){
        // alert(chkid);
        $.get('/web/pcenter/orderdel',{orderid:orderid},function(data){
                  if(data==1){
                    alert('删除成功');           
                    location.href = "/web/pcenter/index";
                  }else{
                    alert('请确认收货后再删除哦!');
                    location.href = "/web/pcenter/index";
                  }
                  //删除html页面
            for(var i=0;i<orderid.length;i++){
              $("input[value="+orderid[i]+"]:checkbox").parents("#did").remove();
            }

        },"json");
      }
    })


    $(".queren").click(function(){
        q=$(this).attr("value");  
        // alert(q);
        //查找父类class类名为mydiv的节点 然后找子集下的input 获取value值
        ss=$(this).closest("div.mydiv").find('input').attr("value");
        // s=$("input[name='goodss']").val();
        // alert(ss);
        if(q=="3"){
          $.get('/web/pcenter/confirm',{orderid:ss},function(data){
                alert(data);
                $(this).html("亲 评价一下好吗?");
                location.href="/web/pcenter/index";
          });

        }else{
          alert("请收到货物后,再点击确认收货")
        }

    })
</script>                 
@endsection