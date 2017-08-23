@extends('public.index')
@section('add')
 <div class="mws-panel grid_8">
    <div class="mws-panel-header">
         <span>用户添加</span>
    </div>
    <div class="mws-panel-body no-padding">
       <form action="/admin/user/insert" method="post" class="mws-form">
         
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
                           <input value="" type="text" class="small" name="username">
                      </div>
                 </div>
                 <div class="mws-form-row">
                      <label class="mws-form-label">真实姓名:</label>
                      <div class="mws-form-item">
                           <input value="" type="text" class="small" name="name">
                      </div>
                 </div>
                 <div class="mws-form-row">
                      <label class="mws-form-label">密码:</label>
                      <div class="mws-form-item">
                           <input type="password" name="password" class="small">
                      </div>
                 </div>
                 <div class="mws-form-row">
                      <label class="mws-form-label">确认密码:</label>
                      <div class="mws-form-item">
                           <input type="password" name="repassword" class="small">
                      </div>
                 </div>

                 <div class="mws-form-row">
                      <label class="mws-form-label">性别:</label>
                      <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">
                          <li><input type="radio" name="sex" value=1> <label>男</label></li>
                          <li><input type="radio" name="sex" value=2> <label>女</label></li>
                        </ul>
                      </div>
                 </div>

                 <div class="mws-form-row">
                      <label class="mws-form-label">地址:</label>
                      <div class="mws-form-item">
                           <input value="" type="text" name="address" class="small">
                      </div>
                 </div>

                 <div class="mws-form-row">
                      <label class="mws-form-label">邮箱:</label>
                      <div class="mws-form-item">
                           <input value="" type="text" name="email" class="small">
                      </div>
                 </div>

                 <div class="mws-form-row">
                    <label class="mws-form-label">状态</label>
                    <div class="mws-form-item">
                      <select class="small" name="status">
                        <option value=1 selected>未激活</option>
                        <option value=2>激活</option>
                        <option value=3>禁用</option>
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