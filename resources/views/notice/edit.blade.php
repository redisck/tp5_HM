@extends('public.index');
@section('add')
<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>公告修改</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form action="/admin/notice/update" class="mws-form" method="post" enctype="multipart/form-data">
                    	<!-- 显示验证错误 -->
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
                    				<label class="mws-form-label">管理员</label>
                    				<div class="mws-form-item">
                                        <input type="text" value="{{$notice->user}}" class="large" disabled>
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">标题</label>
                    				<div class="mws-form-item">
                                        <input type="text" value="{{$notice->title}}" name="title" class="large">
                    				</div>
                    			</div>
								<div class="mws-form-row">
                                    <label class="mws-form-label">内容</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="large" value="{{$notice->contens}}" name="contens">
                                    </div>
                                </div>
                    		</div>
                    		<div class="mws-button-row">
                            <input type="hidden" value="{{$notice->id}}" name="id">
                            
                    			{{csrf_field()}}
                    			<input type="submit" class="btn btn-danger" value="Submit">
                    			<input type="reset" class="btn " value="Reset">
                    		</div>
                    	</form>
                    </div>    	
                </div>
               
@endsection