<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link rel="stylesheet" href="/webc/mlw/css/amazeui.min.css" />
		<script type="text/javascript" src="/webc/mlw/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="/webc/mlw/js/amazeui.min.js"></script>
		<link rel="stylesheet" href="/webc/mlw/css/login.css" />
		<link rel="stylesheet" href="/webc/mlw/css/mui.min.css" />
		<script type="text/javascript" src="/webc/mlw/js/mui.min.js" ></script>
		<script type="text/javascript" src="/webc/mlw/js/login.js" ></script>
		<title>用户登录</title>
		<style>
			.bottomLine{
				border-bottom: 1px solid #ccc;
				border-top: 1px solid #ccc;
				padding-top:8px;
				/*padding-bottom:10px;*/
				
			}
			.bot{
				/*margin-top: 5px;*/
				margin-bottom: 49px;
				/*text-align: center;*/
				color: #7b6f5b;
			}
		</style>
	</head>
     
	<body>
	
		<div class="am-g"  style="margin-top:30px;">
			<div style="width: 1200px;margin: 0 auto;">
			<div class="logo" >
				<img src="/webc/mlw/img/logo.png" />
			</div>
			</div>
		</div>
		<div class="am-g content"  style="margin-top: 43px;">
			<div style="width:1200px;margin:0 auto;position: relative;z-index: 999;">
				<form action="/web/dologin" method="post">

				<div class="loginDiv " style="display: block;"  id="login" >
					<div class="am-u-sm-12" style="padding-left: 30px;padding-right: 30px;padding-top:50px">
					<h4 style="font-weight: normal;">欢迎登录</h4>
					<div style="height:39px"></div>
					 @if (count($errors) > 0)
				         @foreach ($errors->all() as $error)
				         	<div style="clear:both">
			             	<img style="margin-bottom: 2px;" src="/webc/mlw/img/jinggao2.png">
			             	<span style="margin-left:10px;font-size: 14px;color: #3d3d3d">{{ $error }}</span>
			             	</div>
				         @endforeach
				     @endif

				     @if(session('error'))
				           <div style="clear:both">
				              <img style="margin-bottom: 2px;" src="/webc/mlw/img/jinggao2.png">
				              <span style="margin-left:10px;font-size: 14px;color: #3d3d3d">{{session('error')}}</span>
				           </div>                
				     @endif
				 </div>	

				 <div class="am-u-sm-12" style="padding-left: 30px;padding-right: 30px;padding-top:0px">
					
				 	<span class="left1"></span>	
				 	<input type="text" class="am-form-field"  placeholder="邮箱/用户名" style="padding-left: 50px;margin-top: 5px;font-size: 12px;" name="username"/>
				 </div>	
				<!-- 	<div class="am-u-sm-12" style="padding-left: 30px;padding-right: 30px;padding-top:50px">
				<h4 style="font-weight: normal;">欢迎登录</h4>
								 	<span class="left1"></span>	
								 	<input type="text" class="am-form-field"  placeholder="邮箱/用户名" style="padding-left: 50px;margin-top: 48px;font-size: 12px;" name="username"/>
								 </div>	 -->
				 
				 <div class="am-u-sm-12" style="margin-top: 21px;padding-left: 30px;padding-right: 30px;">
				  <span class="left2"></span>	  <input type="password" class="am-form-field"  placeholder="请输入密码"style="padding-left: 50px;font-size: 12px;" name="password"/>
				 </div>	
				 <div class="am-u-sm-12" style="margin-top: 12px;padding-left: 30px;padding-right: 30px;font-size: 12px;color: #757575;">
				    <input type="checkbox" style="margin-top:1px;vertical-align:middle;"/><span style="margin-bottom:-1px;margin-left: 10px;font-size: 12px;vertical-align: middle;">自动登录</span>
				 </div>	
				{{csrf_field()}}
				<div class="am-u-sm-12" style="margin-top: 45px;padding-left: 30px;padding-right: 30px;">
				<button type="submit" class="am-btn am-btn-warning" style="width: 100%;border-radius: 5px;font-size: 16px;" >登录</button>	
				</div>
				<div class="am-u-sm-12" style="padding-left: 30px;padding-right: 30px;">
					<p style="width: 100%;margin-top: 15px;font-size: 12px;color: #333333;"><a href="/web/findpass">找回密码</a> <span style="float: right;"><a href="/web/register">免费注册</a></span></p>
				</div>
				
				</div>
				</form>
				
			</div>
		</div>
		<div class="am-g " style="margin-top: 81px;text-align: center;font-size: 12px;">
			<div class="bottomLine" style="margin:0 auto;width:700px;height: 35px;">
			<span style="float: left;word-spacing:0.52rem;    text-align: center;    width: 100%;">关于我们 | 联系我们 | 商家入驻 | 友情链接 | 站点地图 | 手机商城 | 销售联盟 | 商城社区 | 企业文化 | 帮助中心 
			</span>
			</div>
	    </div>	
	    <div class="am-g" >
			<div class="bot ">
				<div  style="margin:0 auto;width:700px;height: 30px;">
				<p style="font-size: 12px;float: left; line-height: 10px;">© &nbsp;2005-2016 买啦网 版权所有 ，并保留所有权利  <span  style="margin-left: 30px;">买啦 Tel ：4008125181 </span><span  style="margin-left: 20px;">E-mai：maila@163.com</span>  </p>
				</div>
			</div>
		</div>
		
	</body>

</html>