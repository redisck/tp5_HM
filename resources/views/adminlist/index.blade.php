@extends('public.index')
@section('index')
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i> 管理员列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
      <form action="/admin/adminlist/index" method="get">
         <div class="dataTables_filter" id="DataTables_Table_1_filter">
          <label>用户名：<input type="text" aria-controls="DataTables_Table_1" name="keywords" /></label>
          <button class="btn btn-success">搜索</button>
         </div>
     </form>
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">用户名</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">状态</th>
        @if($status==2)<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">操作</th>@endif
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
      	@foreach($list as $key=>$row)
      	@if($key%2==0)
      		<tr class="odd">
      	@else
       		<tr class="even">
       	@endif
        <td class=" ">{{$row->id}}</td> 
        <td class=" ">{{$row->name}}</td> 
        <td class=" ">{{$status_list[$row->status]}}</td>
        @if($status==2) 
        <td class=" ">
        <a href="/admin/adminlist/del/{{$row->id}}" class="btn btn-success"><i class="icon-trash"></i></a> <a href="/admin/adminlist/edit/{{$row->id}}" class="btn btn-info"><i class="icon-pencil"></i></a>
        </td> 
        @endif
       </tr>
       	@endforeach
      </tbody>
     </table>
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