@extends('public.index')
@section('index')
<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>系统信息</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form action="form_layouts.html" class="mws-form">
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row" style="padding:5px 24px">
                    				<label class="mws-form-label">服务器软件：</label>
                    				<div class="mws-form-item">
                    					<label>{{$data['apache']}}</label>
                    				</div>

                    			</div>
                    			<div class="mws-form-row" style="padding:5px 24px">
                    				<label class="mws-form-label">PHP版本：</label>
                    				<div class="mws-form-item">
                    					<label>{{$data['php']}}</label>
                    				</div>

                    			</div>
                    			<div class="mws-form-row" style="padding:5px 24px">
                    				<label class="mws-form-label">网站域名：</label>
                    				<div class="mws-form-item">
                    					<label>{{$data['server']}}</label>
                    				</div>

                    			</div>
                    			<div class="mws-form-row" style="padding:5px 24px">
                    				<label class="mws-form-label">开发团队 :</label>
                    				<div class="mws-form-item">
                    					<label>兄弟连lamp_146期</label>
                    				</div>
                    			</div>
                    			<div class="mws-form-row" style="padding:5px 24px">
                    				<label class="mws-form-label">指导老大 :</label>
                    				<div class="mws-form-item">
                    					<label>军哥哥</label>
                    				</div>
                    			</div>
                    	</form>
                    </div>    	
                </div>
			<div style="height:20px"></div>
<div class="mws-panel grid_4" style="margin-left:0px;"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i> 商品统计</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
     <table aria-describedby="DataTables_Table_1_info" id="DataTables_Table_1" class="mws-datatable-fn mws-table dataTable"> 
      <tbody aria-relevant="all" aria-live="polite" role="alert">
     	<tr class="odd">
        	<td class=" ">上架商品</td> 
       		 <td align="right" style="border-left:none;">{{$data['newnum']}}件</td> 
       
       </tr>
		<tr class="odd">
        	<td>下架商品</td> 
       		 <td style="border-left:none;"  align="right">{{$data['oldnum']}}件</td> 
       
       </tr>
       <tr class="odd">
        	<td class=" ">热卖商品</td> 
       		 <td align="right" style="border-left:none;">{{$data['hote']}}件</td> 
       
       </tr>
       <tr class="odd">
        	<td class=" ">滞销商品</td> 
       		 <td align="right" style="border-left:none;">{{$data['low']}}件</td> 
       
       </tr>
     </tbody>
     </table>
     <div id="DataTables_Table_1_info" class="dataTables_info">
      <!-- Showing 1 to 10 of 57 entries -->
     </div>
     <div id="pages" class="dataTables_paginate paging_full_numbers">
     </div>
    </div> 
   </div> 
  </div>

<div class="mws-panel grid_4" style="margin-left:19px;"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i>登录信息</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
     <table aria-describedby="DataTables_Table_1_info" id="DataTables_Table_1" class="mws-datatable-fn mws-table dataTable"> 
      <tbody aria-relevant="all" aria-live="polite" role="alert">
     	<tr class="odd">
        	<td class=" ">管理者:</td> 
       		 <td align="right" style="border-left:none;">{{session('name')}}</td> 
       
       </tr>
		<tr class="odd">
        	<td>管理者累计量</td> 
       		 <td style="border-left:none;"  align="right">{{$data['adminnum']}}人</td> 
       
       </tr>
       <tr class="odd">
        	<td class=" ">登录时间</td> 
       		 <td align="right" style="border-left:none;">{{date('Y-m-d H:i:s')}}</td> 
       
       </tr>
       <tr class="odd">
        	<td class=" ">累计用户量</td> 
       		 <td align="right" style="border-left:none;">{{$data['usernum']}}人</td> 
       
       </tr>
     </tbody>
     </table>
     <div id="DataTables_Table_1_info" class="dataTables_info">
      <!-- Showing 1 to 10 of 57 entries -->
     </div>
     <div id="pages" class="dataTables_paginate paging_full_numbers">
     </div>
    </div> 
   </div> 
  </div>

<div class="mws-panel grid_8">
					<div class="mws-panel-header">
                    	<span>交易数据</span>
                    </div>
  <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
     <table aria-describedby="DataTables_Table_1_info" id="DataTables_Table_1" class="mws-datatable-fn mws-table dataTable"> 
      <thead> 
       <tr role="row">
        <th aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending" style="width: 203px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_1" tabindex="0" role="columnheader" class="sorting_asc">订单</th>
        <th aria-label="Browser: activate to sort column ascending" style="width: 260px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_1" tabindex="0" role="columnheader" class="sorting_asc">未成交订单</th>
        <th aria-label="Platform(s): activate to sort column ascending" style="width: 245px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_1" tabindex="0" role="columnheader" class="sorting_asc">成交订单</th>
        <th aria-label="Engine version: activate to sort column ascending" style="width: 172px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_1" tabindex="0" role="columnheader" class="sorting_asc">未成交金额</th>
        <th aria-label="CSS grade: activate to sort column ascending" style="width: 127px;" colspan="1" rowspan="1" aria-controls="DataTables_Table_1" tabindex="0" role="columnheader" class="sorting_asc">成交金额</th>
       </tr> 
      </thead> 
      <tbody aria-relevant="all" aria-live="polite" role="alert">
      	       <tr class="odd"> 
        <td class="  sorting_1">今日订单</td> 
        <td class=" ">{{$data['forder']}}</td> 
        <td class=" ">{{$data['torder']}}</td> 
        <td class=" ">￥{{$data['fmoney']}}.00元</td> 
        <td class=" ">￥{{$data['tmoney']}}.00元</td>
       </tr>
       	       <tr class="odd"> 
        <td class="  sorting_1">昨日订单</td> 
        <td class=" ">{{$data['yforder']}}</td> 
        <td class=" ">{{$data['ytorder']}}</td> 
        <td class=" ">￥{{$data['yfmoney']}}.00元</td> 
        <td class=" ">￥{{$data['ytmoney']}}.00元</td>
       </tr>
      <tr class="odd"> 
        <td class="  sorting_1">全部订单</td> 
        <td class=" ">{{$data['zforder']}}</td> 
        <td class=" ">{{$data['ztorder']}}</td> 
        <td class=" ">￥{{$data['zfmoney']}}.00元</td> 
        <td class=" ">￥{{$data['ztmoney']}}.00元</td> 
      </tr>
       	      </tbody>
     </table>
     <div id="DataTables_Table_1_info" class="dataTables_info">
      <!-- Showing 1 to 10 of 57 entries -->
     </div>
     </div>
    </div>
   </div>					
@endsection