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
  <title>重置密码</title> 
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
    <span style="float: right;color: #333333;">我已注册，马上<span style="color: #F88600;"><a href='/web/login'>登录</a></span></span> 
   </div> 
  </div> 
  <div class="am-g content" style="margin-top: 12px;"> 
   <div data-am-widget="tabs" class="am-tabs am-tabs-d2"> 
    <ul class="am-tabs-nav am-cf" style="margin-top: 74px;"> 
     <li class="" style="color:#fa8f00;line-height:40px;font-size:20px;text-decoration:none">密码重置</li> 
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
      
    <form action="/web/doresetpass" method="post">
     <div data-tab-panel-0="" class="am-tab-panel am-active"> 
    
	 

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

      <div class="am-g" style="margin-top:40px;"> 
       <div class="am-u-sm-7 am-u-sm-offset-3 "> 
       {{csrf_field()}}
       	<input type="hidden" name="id" value="{{$id}}">
        <button type="submit" class="am-btn am-btn-warning" style="width: 490px;padding: 14px;border: 0px rgba(187, 187, 187, 0.5) solid;"><font style="font-size: 20px;font-weight: bold;">确认修改</font></button> 
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
</html>
