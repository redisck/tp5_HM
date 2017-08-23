@extends('public.index')
@section('index')
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i> 评论列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
    <form action="/admin/comment/index" method="get">
         <div class="dataTables_filter" id="DataTables_Table_1_filter">
          <label>用户名:<input type="text" aria-controls="DataTables_Table_1" name="keywords" value="{{$request['keywords'] or ''}}"/></label>
          <button class="btn btn-success">搜索</button>
         </div>
     </form>
      
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 80px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>

        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 110px;" aria-label="Platform(s): activate to sort column ascending">用户名</th>

        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 110px;" aria-label="Platform(s): activate to sort column ascending">评论内容</th>
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 110px;" aria-label="Engine version: activate to sort column ascending">类型</th>
        
        <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 120px;" aria-label="CSS grade: activate to sort column ascending">操作</th>

       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all">
      	@foreach($list as $row)
       <tr class="odd"> 
        <td class="  sorting_1">{{$row->id}}</td> 
        <td class=" ">{{$row->uname}}</td> 
        <td class=" ">{!!$row->content!!}</td> 
        <td class=" ">{{$list_status[$row->status]}}</td> 
        <td class=" "><a href="/admin/comment/del/{{$row->id}}" class="btn btn-success"><i class="icon-trash"></i></a> </td> 
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