@extends('pcenter.public.index')
@section('content')
<div class="AreaR">
<div style=" width: 953px;align:center; float:right;border: 1px #CCC solid;">
                <h3 style="font-size: 14px;color: #333333;width: 953px; border:1px solid #999; background-color:#F9F9F9;">
                  <span style="float: left;background-color: #F2873B;height: 15px;width: 4px;margin-top: 10px;margin-right: 10px;"></span>
                  评价统计表
                </h3>
                   @if (count($errors) > 0)
                      <div class="mws-form-message error">
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      </div>
                   @endif
                  <div style="float: left;width: 100%; border:1px solid #ccc;">
                    <div style="swidth:250px; float:right; margin-right:430px; align="center" maright-top:30px;">
                      <form action="/web/pcenter/dopingjia" method="post">
                        <div style="width:100%; heigth:20px;">
                          好评:<img src="/webc/mlw/img/好评.png" alt=""><input type="radio" value="1" name="type">
                          中评:<img src="/webc/mlw/img/中评.png" alt=""><input type="radio" value="2" name="type">
                          差评:<img src="/webc/mlw/img/差评.png" alt=""><input type="radio" value="3" name="type">
                         </div> 
                        <textarea name="content" placeholder="送好评商品随便拿...." cols="30" rows="10"></textarea>
                        <input type="hidden" value="{{$goodsid}}" name="shop">
                        <br>
                        {{csrf_field()}}
                        <input type="submit" align="center" style="float:left; margin-left:60px;" class="bnt_blue_1" class="xxk" value="提交">
                      </form>
                     </div> 
                  </div>
</div>
</div>
@endsection