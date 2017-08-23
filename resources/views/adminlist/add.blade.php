@extends('public.index')
@section('add')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
         <span>管理员添加</span>
    </div>
    <div class="mws-panel-body no-padding">
       <form action="/admin/adminlist/insert" method="post" class="mws-form">
         
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
                           <input value="" type="text" class="small" name="name">
                      </div>
                 </div>
                 <div class="mws-form-row">
                      <label class="mws-form-label">密码:</label>
                      <div class="mws-form-item">
                           <input type="password" name="pass" class="small">
                      </div>
                 </div>
                 <div class="mws-form-row">
                      <label class="mws-form-label">确认密码:</label>
                      <div class="mws-form-item">
                           <input type="password" name="repass" class="small">
                      </div>
                 </div>

          <div class="mws-form-row">
    				<label class="mws-form-label">状态</label>
    				<div class="mws-form-item">
    					<select class="small" name="status">
    						<option value=1 selected>普通管理员</option>
    						<option value=2>超级管理员</option>
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