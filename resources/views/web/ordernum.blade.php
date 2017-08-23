@extends('public.hindex')
@section('content')
<link rel="stylesheet" type="text/css" href="/webc/common/css/style_jm.css">
<center>
    <div style="height:260px"></div>
    <div style="height:300px;color:#fa8f00;line-height:40px;font-size:20px;text-decoration:none;font-family:微软雅黑">
      <span>亲,您的订单已生成,订单号为<b>{{$order}}</b>  请</span>
      <a href="" class="jmcheckout" style="color:#fff;font-size:20px;text-decoration:none;">去支付哦</a>
    </div></center>
@endsection