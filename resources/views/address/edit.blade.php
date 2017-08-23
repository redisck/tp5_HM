@extends('public.index')
@section('edit')
 <div class="mws-panel grid_8">
          <div class="mws-panel-header">
               <span>用户修改</span>
          </div>
          <div class="mws-panel-body no-padding">
               <form action="/admin/user/update" method="post" class="mws-form"> 
                     <!-- 显示自动验证错误 -->
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
                              <label class="mws-form-label">用户名:</label>
                              <div class="mws-form-item">
                                   <input value="{{$stu->username}}" type="text" class="small" name="username" disabled>
                              </div>
                         </div>

                          <div class="mws-form-row">
                              <label class="mws-form-label">真实姓名:</label>
                              <div class="mws-form-item">
                                   <input value="{{$stu->name}}" type="text" class="small" name="name">
                              </div>
                         </div>

                    <div class="mws-form-row">
                      <label class="mws-form-label">性别:</label>
                      <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">
                          <li><input value=1 @if($stu->sex==1) checked @endif type="radio" name="sex"> <label>男</label></li>
                          <li><input value=2 @if($stu->sex==2) checked @endif type="radio" name="sex"> <label>女</label></li>
                        </ul>
                      </div>
                   </div>
                       
                    <div class="mws-form-row">
                              <label class="mws-form-label">邮箱:</label>
                              <div class="mws-form-item">
                                   <input value="{{$stu->email}}" type="text" name="email" class="small">
                              </div>
                    </div>
                     <div class="mws-form-row">
                              <label class="mws-form-label">地址:</label>
                              <div class="mws-form-item">
                                   <input value="{{$stu->address}}" type="text" name="address" class="small">
                              </div>
                    </div>

                    <div class="mws-form-row">
                    <label class="mws-form-label">状态</label>
                    <div class="mws-form-item">
                      <select class="small" name="status">
                        <option value=1 @if($stu->status==1) selected @endif>未激活</option>
                        <option value=2 @if($stu->status==2) selected @endif>激活</option>
                        <option value=3 @if($stu->status==3) selected @endif>禁用</option>
                      </select>
                    </div>
                   </div>
                    </div>
                    <div class="mws-button-row">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$stu->id}}">
                         <input type="submit" class="btn btn-danger" value="修改">
                         <input type="reset" class="btn " value="重置">
                    </div>
               </form>
          </div>         
      </div>
@endsection