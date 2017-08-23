@extends('public.index')
@section('edit')
   <div class="mws-panel grid_8">
          <div class="mws-panel-header">
               <span><a href='{{url("/admin/link/index")}}' class='icon-bended-arrow-left'></a>&nbsp;链接修改</span>
          </div>
          <div class="mws-panel-body no-padding">
               <form action="/admin/link/update" method="post" class="mws-form">
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
                                   <input value="{{$row->linkname}}" type="text" class="small" name="linkname">
                              </div>
                         </div>
                        <div class="mws-form-row">
                              <label class="mws-form-label">链接地址:</label>
                              <div class="mws-form-item">
                                   <input value="{{$row->linkaddress}}" type="text" class="small" name="linkaddress">
                              </div>
                         </div>
                         <div class="mws-form-row">
                              <label class="mws-form-label">联系人</label>
                              <div class="mws-form-item">
                                   <input value="{{$row->username}}" type="text" class="small" name="username" class="username">
                              </div>
                         </div>
                         <div class="mws-form-row">
                              <label class="mws-form-label">email</label>
                              <div class="mws-form-item">
                                   <input type="text" value="{{$row->email}}" class="small" name="email" class="email">
                              </div>
                         </div>
                         
                         <div class="mws-form-row">
                                        <label class="mws-form-label">状态</label>
                                        <div class="mws-form-item">
                                            <select class="small" name="status">
                                                <option value="1" @if($row->status==1) selected @endif>新添加</option>
                                                <option value="2" @if($row->status==2) selected @endif>显示</option>
                                                <option value="3" @if($row->status==3) selected @endif>不显示</option>
                                            </select>
                                        </div>
                                    </div>
                    </div>
                    <div class="mws-button-row">
                        {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$row->id}}"> 
                         <input type="submit" class="btn btn-danger" value="修改">
                         <input type="reset" class="btn " value="重置">
                    </div>
               </form>
          </div>         
      </div>
@endsection