@extends('public.index')
@section('add')
<script type="text/javascript" charset="utf-8" src="/b/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/b/ueditor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="/b/ueditor/lang/zh-cn/zh-cn.js"></script>


<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>商品添加</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form action="/admin/shop/insert" class="mws-form" method="post" enctype="multipart/form-data">
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
    				<label class="mws-form-label">商品名称</label>
    				<div class="mws-form-item">
    					<input type="text" class="large" name="name">
    				</div>
    			</div>

                 <div class="mws-form-row">
                    <label class="mws-form-label">类别</label>
                    <div class="mws-form-item">
                        <select class="large" name="cate_id">
                            <option></option>
                            @foreach($list as $row)
                            <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">现价</label>
                    <div class="mws-form-item">
                        <input type="text" class="large" name="price">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">原价</label>
                    <div class="mws-form-item">
                        <input type="text" class="large" name="oldprice">
                    </div>
                </div>

                 <div class="mws-form-row">
                    <label class="mws-form-label">库存量</label>
                    <div class="mws-form-item">
                        <input type="text" class="large" name="store">
                    </div>
                </div>
    			
                 <div class="mws-form-row">
                    <label class="mws-form-label">状态</label>
                    <div class="mws-form-item">
                        <select class="large" name="status">
                            <option value=1 selected>新品</option>
                            <option value=2>在售</option>
                            <option value=3>下架</option>
                        </select>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">图片</label>
                    <div class="mws-form-item">
                        <input type="file" class="medium" name="pic">
                    </div>
                </div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">内容</label>
    				<div class="mws-form-item">
    					 <script id="editor" type="text/plain" style="width:600px;height:500px;" name="content"></script>
    				</div>
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