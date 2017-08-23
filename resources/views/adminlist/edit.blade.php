@extends('public.index')
@section('edit')
 <div class="mws-panel grid_8">
      <div class="mws-panel-header">
           <span>管理员修改</span>
      </div>
      <div class="mws-panel-body no-padding">
           <form action="/admin/adminlist/update" method="post" class="mws-form"> 
                <div class="mws-form-inline">
                     <div class="mws-form-row">
                          <label class="mws-form-label">用户名:</label>
                          <div class="mws-form-item">
                               <input value="{{$stu->name}}" type="text" class="small" name="username" disabled>
                          </div>
                     </div>

                    <div class="mws-form-row">
	    				<label class="mws-form-label">状态</label>
	    				<div class="mws-form-item">
	    					<select class="small" name="status">
	    						<option value=1 @if($stu->status==1) selected @endif>普通管理员</option>
	    						<option value=2 @if($stu->status==2) selected @endif>超级管理员</option>
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
