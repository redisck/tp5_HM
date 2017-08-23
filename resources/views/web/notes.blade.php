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
                height: 62px;
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
    <span style="float: right;color: #333333;">我已注册，马上<span style="color: #F88600;">登录</span></span> 
   </div> 
  </div> 
  <div class="am-g content" style="margin-top: 12px;"> 
   <div data-am-widget="tabs" class="am-tabs am-tabs-d2"> 
    <ul class="am-tabs-nav am-cf" style="margin-top: 74px;"> 
     <li class="" style="color:#fa8f00;line-height:40px;font-size:20px;text-decoration:none">{{$title}}</li> 
    </ul> 
    <div class="am-tabs-bd" style="margin-top: 59px;margin-left: -20px;"> 
    
    <div class="am-tab-panel  am-active" data-tab-panel-2="">
            <!--<div class="am-g"> <div class="am-u-sm-12" style="text-align: center;"> <img src="img/lion.png" /> </div> </div>-->
            <div style="margin-top: 90px;" class="am-g">
              <div style="    text-align: center;" class="am-u-sm-6 am-u-sm-offset-3 ">
                {!!$notes!!}
              <!--   <h2 style="color: #8F8F8F;font-size: 20px;">恭喜您，152******64账号注册成功</h2>  -->
                </div>
            </div>
           
            <div style="margin-top: 176px;margin-bottom: 124px;" class="am-g">
              <div class="am-u-sm-6 am-u-sm-offset-3 "></div>
            </div>
          </div>
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
     <p style="font-size: 12px;float: left;">&copy; &nbsp;2005-2016 买啦网 版权所有 ，并保留所有权利 <span style="margin-left: 30px;">买啦 Tel ：4008125181 </span><span style="margin-left: 30px;">E-mai：maila@163.com</span> </p> 
    </div> 
   </div> 
  </div>  
 </body>
</html>