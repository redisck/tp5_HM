@extends('public.index')
@section('add')
   <div class="mws-panel grid_8">
          <div class="mws-panel-header">
               <span><a href='{{url("/admin/advs/index")}}' class='icon-bended-arrow-left'></a>&nbsp;广告添加</span>
          </div>
          <div class="mws-panel-body no-padding">
               <form action="/admin/advs/insert" method="post" class="mws-form" enctype="multipart/form-data">
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
                    <div class="mws-form-inline">
                         <div class="mws-form-row">
                              <label class="mws-form-label">广告名称:</label>
                              <div class="mws-form-item">
                                   <input value="{{old('advsname')}}" type="text" class="small" name="advsname">
                              </div>
                         </div>
                         <div class="mws-form-row" style="width:568px">
                              <label class="mws-form-label">图片名称:</label>
                              <div class="mws-form-item">
                                   <input  type="file" class="small" name="advspic">
                              </div>
                         </div>
                         
                         <div class="mws-form-row">
                              <label class="mws-form-label">广告地址</label>
                              <div class="mws-form-item">
                                   <input value="{{old('advslink')}}"  type="text" class="small" name="advslink" class="username">
                              </div>
                         </div>
                         
                         <div class="mws-form-row">
                                        <label class="mws-form-label">状态</label>
                                        <div class="mws-form-item">
                                            <select class="small" name="status">
                                                <option value="1">新添加</option>
                                                <option value="2">显示</option>
                                                <option value="3">不显示</option>
                                            </select>
                                        </div>
                         </div>
                    </div>
                    <div class="mws-button-row">
                        {{csrf_field()}}	
                         <input type="submit" class="btn btn-danger" value="添加">
                         <input type="reset" class="btn " value="重置">
                    </div>
               </form>
          </div>         
      </div>
@endsection