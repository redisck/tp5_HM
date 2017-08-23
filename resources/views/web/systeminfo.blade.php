@extends('public.hindex')
@section('content')

<div class="message_all" style=" background: #ffffff none repeat scroll 0 0;height: auto;margin: 0 auto;padding: 15px 30px;width: 1150px;">
    
    <h3 class="message_tit" style="border-bottom: 1px solid #eaeaea; font-size: 18px;height: 40px;line-height: 40px;">系统信息</h3>
   
    <div class="message_con" style=" height: auto;min-height: 80px;padding: 60px 0;text-align: center;width: 1150px;">
    
    <p style=" color: #e31939;font-size: 14px; font-family:"宋体";height: 30px;line-height: 30px;">{{$title}}</p>
    	<br>
        <p style="font-family:"仿宋";height: 30px; line-height: 30px;"><a href="/web/pcenter/userinfo">{{$contens}}</a></p>
    
   
    </div>
  </div>
<script type="text/javascript">
function tz(){

location.href = "{{$link}}";

}
setInterval(tz,2000);
</script> 
@endsection
