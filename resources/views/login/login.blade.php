<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
        <meta charset="utf-8">
        <script type="text/javascript" src="/b/login/js/jquery-1.8.3.min.js"></script>
        <link href="/b/login/css/style.css" rel='stylesheet' type='text/css' />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="application/x-javascript"> 
           
        </script>
</head>
<body>
     <!-----start-main---->
     <div class="main">
        <div class="login-form">
            <h1><div class="error text" align="center" style="width:40px height:20px"></div></h1>
                    <div class="head">
                        <img src="/b/login/images/user.JPG" alt=""/>
                    </div>
                <form class="mws-form" action="/admin/login" method="post">
                    
                        </p>
                        
                       <input type="text" class="text" name="username" value="{{$info[0]}}"placeholder="管理员账号">
                        
                        <input type="password" name="password" value="{{$info[1]}}" placeholder="管理员密码">
                    <div class="submit">
                         {{csrf_field()}}
                            <input type="submit" onclick="myFunction()" value="登录" >
                    </div>
                    <p><input id="remember" type="checkbox" name="rem" value="1">
                    <a href="#">记住我?</a></p>
                </form>
            </div>                 
        </div>
<div style="display:none"></div>


    @if (count($errors) > 0)
      @foreach ($errors->all() as $error)
          <script type="text/javascript">
                                    alert("{{$error}}");
          </script>
      @endforeach          
    @endif
       @if(session('error'))
         <script type="text/javascript">alert("{{session('error')}}")</script>
      @endif
</body>                    
</html>