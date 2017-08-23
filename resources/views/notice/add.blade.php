@extends('public.index');
@section('add')
<script type="text/javascript" charset="utf-8" src="/b/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/b/ueditor/ueditor.all.min.js"> </script>
 <script type="text/javascript" charset="utf-8" src="/b/ueditor/lang/zh-cn/zh-cn.js"></script>
<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>公告添加</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form action="/admin/notice/insert" class="mws-form" method="post" enctype="multipart/form-data">
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
                                        <input type="text" class="large" value='{{session('name')}}' name="user" disabled>
                                        <input type="hidden" value='{{session('name')}}' name="user">
                                    </div>
                            </div>
                    		<div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">标题</label>
                                    <div class="mws-form-item">
                                        <input type="text" class="large" name="title">
                                    </div>
                                </div>
                            </div>
                            <div class="mws-form-row">
                                <label class="mws-form-label">公告</label>
                                <div class="mws-form-item">
                                    <textarea class="large" cols="" rows="" name="contens"></textarea>
                                </div>
                            </div>
                    		
                    		<div class="mws-button-row">
                    			{{csrf_field()}}
                    			<input type="submit" class="btn btn-danger" value="Submit">
                    			<input type="reset" class="btn " value="Reset">
                    		</div>
                    	</form>
                    </div>    	
                </div>
                <script type="text/javascript">
               //实例化编辑器
   				//建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
   				 var ue = UE.getEditor('editor');

              </script>
@endsection