<!DOCTYPE html>
<html>
 <head> 
  <meta charset="UTF-8" /> 
  <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" /> 
  <link rel="stylesheet" href="/webc/mlw/css/amazeui.min.css" /> 
  <script type="text/javascript" src="/webc/mlw/js/jquery-1.9.1.min.js"></script> 
  <script type="text/javascript" src="/webc/mlw/js/amazeui.min.js"></script> 
  <link rel="stylesheet" href="/webc/mlw/css/regedit.css" /> 
  <link rel="stylesheet" href="/webc/mlw/css/sui.css" /> 
  <script type="text/javascript" src="/webc/mlw/js/sui.js"></script> 
  <title></title> 
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
     <li class="" style="color:#fa8f00;line-height:40px;font-size:20px;text-decoration:none">欢迎注册</li> 
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
      
    <form action="/web/doregister" method="post">
     <div data-tab-panel-0="" class="am-tab-panel am-active"> 
    
	  <div class="am-g"> 
       <div class="am-u-sm-6 am-u-sm-offset-3 "> 
        <span class="left4"></span> 
        <input type="text" name="username" placeholder="请输入用户名" class="am-form-field" style="margin: auto;display: block;float: left;padding-left: 59px;width: 100%; border-radius:5px" />
        
       </div> 
      </div> 

      <div class="am-g" style="margin-top: 36px;"> 
       <div class="am-u-sm-6 am-u-sm-offset-3 "> 
        <span class="left3"></span> 
        <input type="password" name="password" placeholder="请输入密码" class="am-form-field" style="margin: auto;display: block;float: left;padding-left: 59px;width: 100%; border-radius:5px" /> 

       </div> 
      </div> 

      <div class="am-g" style="margin-top: 36px;"> 
       <div class="am-u-sm-6 am-u-sm-offset-3 "> 
        <span class="left3"></span> 
        <input type="password" name="repassword" placeholder="请再次输入密码" class="am-form-field" style="margin: auto;display: block;float: left;padding-left: 59px;width: 100%; border-radius:5px" /> 

       </div> 
      </div> 

      <div class="am-g" style="margin-top: 36px;"> 
       <div class="am-u-sm-6 am-u-sm-offset-3 "> 
        <span class="left5"></span> 
        <input type="text" name="email" placeholder="请输入注册邮箱" class="am-form-field" style="margin: auto;display: block;float: left;padding-left: 59px;width: 100%; border-radius:5px" /> 
        
       </div> 
      </div> 

      <div class="am-g" style="margin-top: 37px;"> 
       <div class="am-u-sm-4 am-u-sm-offset-3" style="padding-right: 0rem;"> 
        <span class="left2"></span> 
        <input type="text" name="vcode" placeholder="请输入验证码" class="am-form-field" style="margin: auto;display: block;float: left;padding-left: 55px;width: 360px; border-radius:5px" /> 
       </div> 
       <div class="am-u-sm-3 am-u-end" style="padding-left: 0rem;"> 
        <!-- <button type="button" class="am-btn am-btn-default" style="width: 164px;float: left;height: 62px;">验证码 <a style="margin-left: 30px;">换一张</a></button>  -->
        <img src="{{url('/web/vcode')}}"  style="width: 164px;float: left;height: 45px;" onclick="this.src=this.src+'?a=1'">
       </div> 
      </div> 

      
      <div class="am-g" style="margin-top:40px;"> 
       <div class="am-u-sm-7 am-u-sm-offset-3 "> 
       {{csrf_field()}}
        <button type="submit" class="am-btn am-btn-warning" style="width: 490px;padding: 14px;border: 0px rgba(187, 187, 187, 0.5) solid;"><font style="font-size: 20px;font-weight: bold;">注册</font></button> 
       </div> 
      </div> 
     </div> 
     </from>
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

    //用户名验证
    flag1=false;
    flag2=false;
    flag3=false;
    flag4=false;
    $(function(){
       $("input[name='username']").focus(function() {
          flag1=false;
          //聚焦事件
          $(this).next('span').remove();
          $("<span style='font-size: 1.6rem;left: 750px;position: fixed;top: 23px;'>请输入用户名</span>").css('color','#888').insertAfter($(this));
    
         }).blur(function(){
            //失去焦点事件
            s=$(this);
            //清除
            s.next('span').remove();
            val=s.val();
            if(val==''){
                 //输入为空
                $("<span style='font-size: 1.6rem;left: 750px;position: fixed;top: 23px;'><img src='/webc/mlw/img/error.png' />用户名不能为空</span>").css('color','#fa8f00').insertAfter(s);
            }else{

              //Ajax
                $.get('/web/ajax',{username:val},function(data){
                    if(data=='1'){
                      // alert('aa');
                     $("<span style='font-size: 1.6rem;left: 750px;position: fixed;top: 23px;'><img src='/webc/mlw/img/error.png' />该用户已被注册</span>").css('color','#fa8f00').insertAfter(s);
                     
                    }else{
                      $("<span style='font-size: 1.6rem;left: 750px;position: fixed;top: 23px;'><img src='/webc/mlw/img/right.png' /></span>").insertAfter(s);

                      flag1=true;
                    }
                });
            }
         });


      //密码验证
     $("input[name='password']").focus(function() {
        flag2=false;
        //聚焦事件
        $(this).next('span').remove();
        $("<span style='font-size: 1.6rem;left: 750px;position: fixed;top: 104px;'>请输入密码</span>").css('color','#888').insertAfter($(this));
       
     }).blur(function(){
        //失去焦点事件
        s=$(this);
        //清除
        s.next('span').remove();
        val=s.val();
        if(val==''){
                 //输入为空
                $("<span style='font-size: 1.6rem;left: 750px;position: fixed;top: 104px;'><img src='/webc/mlw/img/error.png' />密码不能为空</span>").css('color','#fa8f00').insertAfter(s);
        }else{
          $("<span style='font-size: 1.6rem;left: 750px;position: fixed;top: 104px;'><img src='/webc/mlw/img/right.png' /></span>").insertAfter(s);
          flag2=true;
        }
     });


     //确认密码验证
          
    $("input[name='repassword']").focus(function() {
        flag3=false;
        //聚焦事件
        $(this).next('span').remove();
        $("<span style='font-size: 1.6rem;left: 750px;position: fixed;top: 184px;'>请再次输入密码</span>").css('color','#888').insertAfter($(this));
       
     }).blur(function(){
        //失去焦点事件
        s=$(this);
        //清除
        s.next('span').remove();
        repassword=s.val();
        //第一次输入的密码
        password=$("input[name='password']").val();

        if(repassword==''){
               //输入为空
              $("<span style='font-size: 1.6rem;left: 750px;position: fixed;top: 184px;'><img src='/webc/mlw/img/error.png' />密码不能为空</span>").css('color','#fa8f00').insertAfter(s);
        }else if(repassword!=password){
              //密码不匹配
              $("<span style='font-size: 1.6rem;left: 750px;position: fixed;top: 184px;'><img src='/webc/mlw/img/error.png' />两次密码不一致</span>").css('color','#fa8f00').insertAfter(s);

        }else{
          $("<span style='font-size: 1.6rem;left: 750px;position: fixed;top: 184px;'><img src='/webc/mlw/img/right.png' /></span>").insertAfter(s);
          flag3=true;
        }
     });


      //邮箱验证
       $("input[name='email']").focus(function() {
          flag4=false;
          //聚焦事件
         $(this).next('span').remove();
         $("<span style='font-size: 1.6rem;left: 750px;position: fixed;top: 264px;'>请输入邮箱</span>").css('color','#888').insertAfter($(this));

        }).blur(function(){
            //失去焦点事件
            s=$(this);
            //清除
            s.next('span').remove();
            email=s.val();
            if(email==''){
                   //输入为空
               $("<span style='font-size: 1.6rem;left: 750px;position: fixed;top: 264px;'><img src='/webc/mlw/img/error.png' />邮箱不能为空</span>").css('color','#fa8f00').insertAfter(s);
            }else if(email.match(/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/)==null){
                $("<span style='font-size: 1.6rem;left: 750px;position: fixed;top: 264px;'><img src='/webc/mlw/img/error.png' />邮箱格式不对</span>").css('color','#fa8f00').insertAfter(s);
            }else{
                //ajsx验证
                  $.get('/web/emailajax',{email:email},function(data){
                    
                    if(data=='1'){
                     $("<span style='font-size: 1.6rem;left: 750px;position: fixed;top: 264px;'><img src='/webc/mlw/img/error.png' />该邮箱已被注册</span>").css('color','#fa8f00').insertAfter(s);
                     
                    }else{
                      $("<span style='font-size: 1.6rem;left: 750px;position: fixed;top: 264px;'><img src='/webc/mlw/img/right.png' /></span>").insertAfter(s);
                      flag4=true;
                    }
                });
            }
       });


    
      //提交事件
      $("form").submit(function(){
        
        if(flag1&&flag2&&flag3&&flag4){
          return true;
        }else{
          return false;
        }
    
  })





    })
   
 </script>
</html>
