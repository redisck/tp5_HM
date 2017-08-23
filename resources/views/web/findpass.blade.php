<!DOCTYPE html>
<html>
 <head> 
  <meta charset="UTF-8" /> 
  <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" /> 
  <link rel="stylesheet" href="/webc/mlw/css/amazeui.min.css" /> 
  <script type="text/javascript" src="/webc/common/js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="/webc/mlw/js/jquery-1.9.1.min.js"></script> 
  <script type="text/javascript" src="/webc/mlw/js/amazeui.min.js"></script> 
  <link rel="stylesheet" href="/webc/mlw/css/regedit.css" /> 
  <link rel="stylesheet" href="/webc/mlw/css/sui.css" /> 
  <script type="text/javascript" src="/webc/mlw/js/sui.js"></script> 
  <title>密码找回</title> 
  <style>
			/*.bottomLine {
				border-bottom: 1px solid #ccc;
				border-top: 1px solid #ccc;
				margin-bottom: 10px;
				/*padding: 10px;*/
				/*padding-top: 10px;
				padding-bottom: 10px;
				word-spacing: 0.05rem;
				text-align: center;
				margin-top: 82px;*/
				/*width:677px ;*/
				/*line-height: ;*/
			/*}*/
				.bottomLine{
				border-bottom: 1px solid #ccc;
				border-top: 1px solid #ccc;
				padding-top:8px;
				/*padding-bottom:10px;*/
				
			}
			.bot {
				margin-bottom: 50px;
				/*text-align: center;*/
				color: #7b6f5b;
			}
			
			.radio-pretty.checked > span:before {
				color: #f88600;
			}
			
			input {
				height: 45px;
			}
				.radio-pretty span:before {
		    margin-right: 2px;
		    vertical-align: -4px;
		    font-size: 20px;
		    color: #bdbdbd;
		    margin-left: -2px;
		}
		</style> 
 </head> 
 <body> 
  <div class="am-g" style="margin-top: 25px;"> 
   <div class="logo"> 
    <img src="/webc/mlw/img/logo.png" /> 
   </div> 
  </div> 
  <div class="am-g"> 
   <div style="width: 999px;margin: 0 auto;font-size: 14px;"> 
    <span style="float: right;color: #333333;">我已注册，马上<span style="color: #F88600;"><a href="/web/login">登录</a></span></span> 
   </div> 
  </div> 
  <div class="am-g content" style="margin-top: 12px;"> 
   <div data-am-widget="tabs" class="am-tabs am-tabs-d2"> 
    <ul class="am-tabs-nav am-cf" style="margin-top: 74px;"> 
     <li class="" onclick="fun(1)" style="color:#fa8f00; cursor:pointer;line-height:40px;font-size:20px;text-decoration:none">邮箱找回</li>
    <li class="" onclick="fun(2)"  style="color:#fa8f00; cursor:pointer; line-height:40px;font-size:20px;text-decoration:none">密保找回</li>
    </ul> 

    
    <div class="am-tabs-bd" style="margin-top: 59px;margin-left: -20px;"> 
      
     @if (count($errors) > 0)
         @foreach ($errors->all() as $error)
           <div class=" am-u-sm-offset-3" style="clear:both">
              <img style="margin-bottom: 10px;" src="/webc/mlw/img/jinggao2.png">
              <span style="margin-left:10px;font-size: 14px;color: #3d3d3d">{{ $error }}</span>
           </div>
         @endforeach
      @endif

      @if(session('error'))
           <div class=" am-u-sm-offset-3" style="clear:both">
              <img style="margin-bottom: 10px;" src="/webc/mlw/img/jinggao2.png">
              <span style="margin-left:10px;font-size: 14px;color: #3d3d3d">{{session('error')}}</span>
           </div>                
      @endif
      
    <form action="/web/dofindpass" method="post">
    <!-- 密码找回 -->
       <div data-tab-panel-0="" style="display:block" id="tab_1" class="am-tab-panel am-active"> 
      
  	  <div class="am-g"> 
         <div class="am-u-sm-6 am-u-sm-offset-3 "> 
          <span class="left4"></span> 
          <input type="text" name="email" placeholder="请输入邮箱" class="am-form-field" style="margin: auto;display: block;float: left;padding-left: 59px;width: 100%; border-radius:5px" /> 
         </div> 
        </div> 
        
        <div class="am-g" style="margin-top:40px;"> 
         <div class="am-u-sm-7 am-u-sm-offset-3 "> 
         {{csrf_field()}}
          <button type="submit" class="am-btn am-btn-warning" style="width: 490px;padding: 14px;border: 0px rgba(187, 187, 187, 0.5) solid;border-radius: 5px;"><font style="font-size: 20px;font-weight: bold;">点击找回</font></button> 
         </div> 
        </div> 
       </div>
     </form>
  

    <!-- 密保找回 -->
    <form action="/web/doanserpass" method="post">
    <!-- 密码找回 -->
    <div data-tab-panel-0="" style="display:none" id="tab_2" class="am-tab-panel tab_2 am-active">
    <div class="am-g"> 
       <div class="am-u-sm-6 am-u-sm-offset-3 "> 
        <span class="left5"></span> 
        <input type="text" name="anseremail" placeholder="请输入邮箱" class="am-form-field" style="margin:auto;display: block;float: left;padding-left: 59px;width: 100%; border-radius:5px"/> 
       </div>

      </div>
      
      <div class="am-g"> 
       <div class="am-u-sm-6 am-u-sm-offset-3 "> 
        <span class="left"></span> 
        <select name="quest" placeholder="请选择答案" id="cid" style="width:100%; height:40px; border-radius:5px; margin:20px auto">
          <option value="">--请选择问题--</option>
        </select>
     </div> 
      </div> 
      <div class="am-g"> 
       <div class="am-u-sm-6 am-u-sm-offset-3 "> 
        <span class="left3"></span> 
        <input type="text" name="anserkey" placeholder="请输入答案" class="am-form-field" style="margin: auto;display: block;float: left;padding-left: 59px;width: 100%; border-radius:5px"/> 
       </div>
      </div>
        <div class="am-g" style="margin-top:40px;"> 
       <div class="am-u-sm-7 am-u-sm-offset-3 "> 
       {{csrf_field()}}
        <button type="submit" class="am-btn am-btn-warning" style="width: 490px;padding: 14px;border: 0px rgba(187, 187, 187, 0.5) solid;border-radius: 5px;"><font style="font-size: 20px;font-weight: bold;">点击找回</font></button> 
       </div> 
      </div> 
     </div>
     </form> 


    </div> 
   </div> 
  </div> 
  <div class="am-g " style="margin-top: 81px;text-align: center;font-size: 12px;"> 
   <div class="bottomLine" style="margin:0 auto;width:700px;height: 35px;"> 
    <span style="float: left;word-spacing:0.52rem;    text-align: center;    width: 100%;">关于我们 | 联系我们 | 商家入驻 | 友情链接 | 站点地图 | 手机商城 | 销售联盟 | 商城社区 | 企业文化 | 帮助中心 </span> 
   </div> 
  </div> 
  <div class="am-g"> 
   <div class="bot "> 
    <div style="margin:0 auto;width:700px;height: 30px;"> 
     <p style="font-size: 12px;float: left;">&copy; &nbsp;2016-2026 买啦网 版权所有 ，并保留所有权利 <span style="margin-left: 30px;">买啦 Tel ：4008125181 </span><span style="margin-left: 30px;">E-mai：maila@163.com</span> </p> 
    </div> 
   </div> 
  </div>  
 </body>
 <script type="text/javascript">
//选项卡  密保和邮箱验证切换
 function fun(id){
    for(var i=1;i<=2;i++){
    tab=document.getElementById('tab_'+i); 
    tab.style.display=(i==id)?"block":"none";

    }
 }

 $("input[name='anseremail']").focus(function(){
      $(this).next('span').remove();
      $("#cid").find('option').remove();
      $("<span>请正确输入邮箱</span>").css('color','red').insertAfter($(this));        

  }).blur(function(){
      s=$(this);
      s.next('span').remove();
      $("#cid").nextAll('option').remove();
      ss=s.val();
      if(ss==""){
      $("<span>邮箱不能为空</span>").css('color','red').insertAfter($(this));        
      }else{
        
        $.get('/web/anserpass',{uemail:ss},function(data){
           
           if(data!=1){
                if(data!=2){
                   for(var i=1;i<=Object.keys(data).length;i++){
                     
                       var s='<option value="'+i+'">'+data[i]+'</option>';
                        
                     $("#cid").append(s);
                    }
                   }else{
                    alert('亲 您未设置密保哦!')
                   } 
               }else{
                    alert("亲 账号不存在!")
               }

        },'json')
      }
 })



 </script>
</html>
