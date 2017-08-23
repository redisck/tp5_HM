@extends('public.index')
@section('add')
   <div class="mws-panel grid_8">
          <div class="mws-panel-header">
               <span><a href='{{url("/admin/link/index")}}' class='icon-bended-arrow-left'></a>&nbsp;链接添加</span>
          </div>
          <div class="mws-panel-body no-padding">
               <form action="/admin/link/insert" method="post" class="mws-form">
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
                              <label class="mws-form-label">链接名称:</label>
                              <div class="mws-form-item">
                                   <input value="{{old('linkname')}}" type="text" class="small" name="linkname">
                              </div>
                         </div>
                        <div class="mws-form-row">
                              <label class="mws-form-label">链接地址:</label>
                              <div class="mws-form-item">
                                   <input value="{{old('linkaddress')}}" type="text" class="small" name="linkaddress">
                              </div>
                         </div>
                         <div class="mws-form-row">
                              <label class="mws-form-label">联系人</label>
                              <div class="mws-form-item">
                                   <input value="{{old('username')}}"  type="text" class="small" name="username" class="username">
                              </div>
                         </div>
                         <div class="mws-form-row">
                              <label  class="mws-form-label">email</label>
                              <div class="mws-form-item">
                                   <input value="{{old('email')}}" type="text" class="small" name="email" class="email">
                              </div>
                         </div>
                         
                         <div class="mws-form-row">
                                        <label class="mws-form-label">状态</label>
                                        <div class="mws-form-item">
                                            <select class="large" name="status">
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