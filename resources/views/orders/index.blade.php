@extends('public.index')
@section('index')
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i>订单列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
      <form action="/admin/orders/index" method="get">
         <div class="dataTables_filter" id="DataTables_Table_1_filter">
          <label>订单号:<input type="text" aria-controls="DataTables_Table_1" name="keywords" value="{{$request['keywords'] or ''}}"/></label>
          <button class="btn btn-success">搜索</button>
         </div>
     </form>
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">订单ID</th>
         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">用户</th>
          <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">收件人</th>
         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">地址</th>
         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">金额</th>
         <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">订单号</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">状态</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">购买时间</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">操作</th>
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
      	@foreach($list as $key=>$row)
        <td class=" ">{{$row->orderid}}</td> 
        <td class=" ">{{$row->username}}</td>
        <td class=" ">{{$row->linkman}}</td>
        <td class=" ">{{$row->address_add}}</td> 
        <td class=" ">{{$row->total}}</td>
        <td class=" ">{{$row->ordernum}}</td>
        <td class=" ">{{$status_list[$row->orderstatus]}}</td> 
        <td class=" ">{{$row->addtime}}</td> 
        <td class=" "><a href="/admin/orders/index1?id={{$row->orderid}}" class="btn btn-success">详情</a>
         <a href="/admin/orders/edit/{{$row->orderid}}" class="btn btn-info"><i class="icon-pencil" style="width:26px"></i></a></td> 
       </tr>
       	@endforeach
      </tbody>
     </table>
     {{csrf_field()}}
     <div class="dataTables_info" id="DataTables_Table_1_info">
      <!-- Showing 1 to 10 of 57 entries -->
     </div>
     <div class="dataTables_paginate paging_full_numbers" id="pages">
     {!!$list->appends($request)->render()!!}
     </div>
    </div> 
   </div> 
  </div>
 </body>
</html>
@endsection
