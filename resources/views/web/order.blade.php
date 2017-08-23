@extends('public.hindex')
@section('content')


<link rel="stylesheet" type="text/css" href="/webc/common/css/style_jm.css">
<!-- bootstrap -->
<link rel="stylesheet" href="/webc/bootstrap/css/bootstrap.min.css">
<!-- <link rel="stylesheet" href="/webc/bootstrap/css/bootstrap.css"> -->
<!-- <link rel="stylesheet" href="/webc/bootstrap.css"> -->
<!-- <link rel="stylesheet" href="/webc/bootstrap/css/datetimepicker.min.css"> -->
<script src="/webc/bootstrap/js/jquery.min.js"></script>
<script src="/webc/bootstrap/js/bootstrap.min.js"></script>
<script src="/webc/bootstrap/js/holder.min.js"></script>

		

  <div class="blank"></div>
  <div class="block_jm">
    <div id="A_Stepbar" class="flowstep">
    <ol class="flowstep-5">
      <li class="step-first">
        <div class="step-done">
          <div class="step-name">查看购物车</div>d./webc/common/
          <div class="step-no"></div>
        </div>
      </li>
      <li>
        <div class="step-done">
          <div class="step-name">拍下商品</div>
          <div class="step-no"></div>
        </div>
      </li>
      <li>
        <div class="step-name">付款</div>
        <div class="step-no">3</div>
      </li>
      <li>
        <div class="step-name">确认收货</div>
        <div class="step-no">4</div>
      </li>
      <li class="step-last">
        <div class="step-name">评价</div>
        <div class="step-no">5</div>
      </li>
    </ol>
  </div>
  <div id="bg" class="bg" style="display:none;"></div>
  <!-- <form action="flow.php" method="post" name="theForm" id="theForm" onsubmit="return checkOrderForm(this)">
 --> 
    <div class="checkgoods"></div>
    <div class="checkBox_jm clearfix">
      <div class="title">收货人信息</div>
      <div class="address_jm">

 <ul >

    @foreach($address as $key=>$row)
    <li class="Addressdiv" style=" background: url(/webc/common/img/bg_address-0.gif) no-repeat 0 0;">
    <div class="AddressList" style="width:100%;height:100%;" value="{{$row->id}}" >
    <table cellpadding="0" cellspacing="0" width="100%">
    <tbody><tr><td>{{$row->linkman}}<br>{{$row->address}}<br>{{$row->phone}}</td></tr>
    </tbody></table>
    </div>



    <div class="container">

    <div class="edit_addr">

      <button value="{{$row->id}}"  class="btn btn-success btn-xs myupdate" data-toggle="modal" data-target="#Mymodal{{$key}}">修改</button>
      <button value="{{$row->id}}"  type="button" class="btn btn-danger btn-xs mydel">删除</button>
     <!--  <a href="javascript:del_Address(82);" onclick="return confirm('您确认要删除吗？');">删除</a> -->

    </div>

    <!-- Modal -->
    <div class="modal fade" id="Mymodal{{$key}}">
      <div class="modal-dialog">

    <!-- 内容区 -->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close"data-dismiss="modal">&times;</button>
            <h4 class="modal-title">地址界面</h4>
          </div>
          
          <!-- body -->
          <script type="text/javascript" src="/webc/common/js/jquery-1.8.3.min.js"></script>  
          <!-- 城市级联 -->
          <form role="form" action="/web/updateaddress" method="post">
          <div id="newaddress" class="modal-body">
            
              <div class="form-group">
                <label>收件人</label>
                <input name="linkman" type="text" class="form-control" value="{{$row->linkman}}">
              </div>
             
              <label>地区</label>
              
              <div class="row">      
                    @foreach($row->arr as $key1=>$row1)

                     <select name='addresslist[]' class="myaddress">
                         @foreach($row1->level_addr as $row2) 
                         <option value="{{$row2->id}}" @if($row1->id==$row2->id) selected @endif >{{$row2->name}}</option>
                         @endforeach
                     </select>

                    @endforeach
              </div>

              <div class="form-group">
                <label>详细地址</label>
                <input name="address" type="text" class="form-control" value="{{$row->addressfoot}}">
              </div>

              <div class="form-group">
                <label>邮政编号</label>
                <input name="code" type="text" class="form-control" value="{{$row->code}}">
              </div>

              <div class="form-group">
                <label>电话号码</label>
                <input name="phone" type="text" class="form-control" value="{{$row->phone}}">
              </div>
              <!-- <select id="cid" class="form-control" >
                  <option value="">--请选择---</option>
              </select> -->
          </div>
          

          <!-- footer -->
          <div class="modal-footer">
          {{csrf_field()}}
            <!-- 修改删除的地址id -->
            <input type="hidden" name='address_id' value='{{$row->id}}' >
            <button type="submit"class="btn btn-success">提交</button>
            <button type="reset" class="btn btn-danger">重置</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- 模态框 -->
    
    <!-- 判断选择哪个地址的 -->
    <input type="hidden" name='user_id' value='' >
    <!-- <div class="edit_addr">
    <a href="javascript:AddressEdit(82);">修改</a> <a href="javascript:del_Address(82);" onclick="return confirm('您确认要删除吗？');">删除</a></div> -->
   
    </li>
    @endforeach

<!-- background: url(./webc/common/img/bg_address.gif) no-repeat 0 0; -->
<!-- <li style="background: url(/webc/common/img/bg_address.gif) no-repeat 0 0;">
<div style="width:100%;height:100%;" onclick="selAddress(this, 82);">
<table cellpadding="0" cellspacing="0" width="100%">
<tbody><tr><td>我问问<br>安徽-池州-青阳县&nbsp;是我的的 等等,047899<br>13456788765</td></tr>
</tbody></table>
</div>
<div class="edit_addr" id="address_edit_0"><a href="javascript:AddressEdit(82);">修改</a> <a href="javascript:del_Address(82);" onclick="return confirm('您确认要删除吗？');">删除</a></div>
</li> -->

</ul>
<!-- 选择地址 -->
<script type="text/javascript">
  //添加边框
  $(".AddressList").click(function(){

      $(this).parent().siblings('li').attr('style','background: url(/webc/common/img/bg_address-0.gif) no-repeat 0 0;');
      $(this).parent().attr('style','background: url(/webc/common/img/bg_address.gif) no-repeat 0 0;');

      id=$(this).attr('value');
      $('input[name="user_id"]').val(id);
      // alert(id);

  });

  //显示修改删除框
  $(".Addressdiv").mouseover(function(){
      $(this).find(".edit_addr").attr('style','display:block');
  })

  $(".Addressdiv").mouseout(function(){
      $(this).find(".edit_addr").attr('style','display:none');
  })

  //点击修改
  $(".myupdate").click(function(){
    // id=$(this).val();
    // $('input[name="user_id"]').val(id);

  })

  //点击删除
  $('.mydel').click(function(){
      ss=$(this);
      id=$(this).val();
      // alert(id);
      if(confirm('你确定删除吗?')){
          $.get('/web/deladdr',{id:id},function(data){
              if(data==1){
                ss.closest('li').remove();
              }else{
                alert('删除失败');
              }            
         })
      }
     
     
  })


</script>
<div class="blank10"></div>

 <div class="container">
    <button class="btn btn-success" data-toggle="modal" data-target="#Mymodalbb">使用新地址</button>

    <!-- Modal -->
    <div class="modal fade" id="Mymodalbb">
      <div class="modal-dialog">

    <!-- 内容区 -->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close"data-dismiss="modal">&times;</button>
            <h4 class="modal-title">登录界面</h4>
          </div>
          
          <!-- body -->
          <script type="text/javascript" src="/webc/common/js/jquery-1.8.3.min.js"></script>  
          <!-- 城市级联 -->
          <script type="text/javascript">

              //获取第一级数据
              //Ajax
              $.ajax({
                url:  '/web/cart/csjl',//url地址
                type: 'get',//请求方式
                data:{upid:0},//参数
                dataType:'json',//数据返回的类型格式
                //接收响应数据
                success:
                function(data){
                  // alert(data);
                  for(var i=0;i<data.length;i++){
                  
                    var s='<option value="'+data[i].id+'">'+data[i].name+'</option>';
                  
                    $("#cid").append(s);
                  }
                },
                //Ajax响应失败
                error:
                function(){
                  // alert('Ajax响应失败');
                }
              });

              // 子级
              $("select").live('change',function(){
                ss=$(this);
                //获取upid （父id）
                //清除当前下框对象的nextAll元素节点
                ss.nextAll('select').remove();
                //获取父id （upid）
                id=ss.val();
                if(id=='')
                  return;
                //Ajax
                $.ajax({
                  url:'/web/cart/csjl',//url地址
                  type:'get',//请求方式
                  data: {upid:id},//参数
                  dataType:'json',//数据的返回格式
                  //接受响应数据
                  success:
                  function(data){
                    // alert(data);
                    info=$("<select name='addresslist[]'></select>");//创建select
                    //判断
                    if(data.length>0){
                      //遍历
                      for(var i=0;i<data.length;i++){
                        //把数据放在下拉选项里
                        var so='<option value="'+data[i].id+'">'+data[i].name+'</option>';
                        //把含有数据的下拉选项内部插入到info
                        info.append(so);
                      }
                      //追加select
                      ss.after(info);
                    }
                    
                  },
                  error:
                  function(){
                    // alert('Ajax响应失败');
                  }
                })
              })

         
 </script>

          <form role="form" action="/web/address" method="post">
          <div id="newaddress" class="modal-body">
            
              <div class="form-group">
                <label>收件人</label>
                <input name="linkman" type="text" class="form-control">
              </div>
             
              <label>地区</label>
              
              <div class="row">      
                     <select name='addresslist[]' id="cid">
                         <option value="">--请选择---</option>
                     </select>
              </div>

              <div class="form-group">
                <label>详细地址</label>
                <input name="address" type="text" class="form-control">
              </div>

              <div class="form-group">
                <label>邮政编号</label>
                <input name="code" type="text" class="form-control">
              </div>

              <div class="form-group">
                <label>电话号码</label>
                <input name="phone" type="text" class="form-control">
              </div>
              <!-- <select id="cid" class="form-control" >
                  <option value="">--请选择---</option>
              </select> -->
          </div>
          

          <!-- footer -->
          <div class="modal-footer">
          {{csrf_field()}}
            <button type="submit"class="btn btn-success">提交</button>
            <button type="reset" class="btn btn-danger">重置</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- 模态框 -->



<!-- <div class="address_jm_add" onclick="AddressEdit(0);">使用新地址</div> -->
 </div> 
    </div>
<div class="checkBox_jm clearfix">
  <div class="title">确认订单信息</div>
  <table class="checkgoods" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
      <tr>
        <th class="tdone" align="center" width="50%">店铺宝贝</th>
        <th>数量</th>
        <th>单价</th>
        <th>小计</th></tr>
      <tr>
        <td colspan="4" style="background:#fff; border-top:2px solid #adceff; font-weight:bold; padding:5px 10px; border-bottom:1px dotted #abccff;">店铺：
          <span class="zkflow_dianpu">网站自营</span></td>
      </tr>

      @foreach($goods as $row)  
      <tr style="background:#fafcff;">
        <td style="border-top:none;" width="50%">
          <div class="thumb_name">
            <dl>
              <dt>
                <a href="/web/detail/{{$row['id']}}" target="_blank">
                  <img src="{{$row['pic']}}" style="border:1px solid #ddd;" title="{{$row['name']}}"></a>
              </dt>
              <dd>
                <a href="/web/detail/{{$row['id']}}" target="_blank" class="f6">{{$row['name']}}</a>
                <br>
                <font class="attrname"></font>
              </dd>
            </dl>
          </div>
        </td>
        <td style="border-top:none;" align="center">{{$row['num']}}</td>
        <td class="zkflosw_danjia" style="border-top:none;" align="center">{{$row['price']}}</td>
        <td class="price_font" style="border-top:none;" align="center">{{$row['subtotal']}}</td>

        </tr>

        @endforeach




      <tr>
        <td colspan="4" class="shipping_type" bgcolor="#ffffff" align="left">
          <ul class="shipping_jm">
            <li>
              <input name="pay_ship[0]" id="pay_ship_0" class="shipping" value="7" type="hidden"></li>
          </ul>
        </td>
      </tr>
      <tr>
        <div class="blank10"></div>
        <table class="clearfix" style="padding:4px 10px 0 10px;border:2px solid #f70;" cellpadding="0" cellspacing="0" align="right">
          <tbody>
            <tr>
              <td align="right">
                <div id="ECS_ORDERTOTAL">
                  <table bgcolor="#ffffff" border="0" cellpadding="1" cellspacing="1" align="center">
                    <tbody>
                     <!--  <tr>
                        <td bgcolor="#ffffff" align="right">该订单完成后，您将获得
                          <font class="f4_b">0.00</font>的红包。</td></tr>
                      <tr>
                        <td bgcolor="#ffffff" align="right">商品总价:
                          <font class="f4_b">29.90</font>+ 配送费用:
                          <font class="f4_b">15.00</font></td>
                      </tr> -->
                      <tr>
                        <td bgcolor="#ffffff" align="right">应付款金额：
                          <span style="font-size:18px;">¥
                            <span>
                              <font class="f4_b" style="font-size:18px;font-family:微软雅黑;">{{$row['total']}}</font></span>
                          </span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </td>
            </tr>
            <tr>
              <td align="right">
                <b>寄送至：</b>
              </td>
            </tr>
            <tr>
              <td align="right">
                <b>收货人：</b>
              </td>
            </tr>
          </tbody>
        </table>
</div>
   
    <div class="flowBox_jm clearfix" style="border:none;padding-bottom:20px;">
      <div style="float:left;width:40%;padding:8px 0; padding-left:5px;"> <a href="http://mailaing.com/flow.php" class="continue_buy" style="padding:0;">返回修改购物车</a> </div>
      <div style="float:right;width:55%;text-align:right;padding:8px 20px;"> 
        
        <input id="ordersubmit" src="/webc/common/img/btn_done.gif" align="absmiddle" type="image">

        <script type="text/javascript">
            $('#ordersubmit').click(function(){
                addressid=$("input[name='user_id']:first").val();
                // alert(addressid);
                location.href="/web/createorder?addressid="+addressid;
            })
        </script>
        
      <!--   <input name="need_inv" style="display:none;" class="input" id="ECS_NEEDINV" onclick="changeNeedInv()" value="1" checked="checked" type="checkbox"> -->
      </div>
    </div>
    <div class="blank10"></div>
  <!-- </form> -->

</div>




@endsection



