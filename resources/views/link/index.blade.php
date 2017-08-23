@extends('public.index')
@section('index')
   <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i> 友情链接</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
      <form action="/admin/link/index" method="get">
     <div class="dataTables_filter" id="DataTables_Table_1_filter">
      <label>链接名称:<input name='sname' value="{{$request['sname'] or ''}}" type="text" aria-controls="DataTables_Table_1" /></label>
      <button class="btn btn-success">搜索</button>
     </div>
     </form>
    <table class=" mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 100px;font-size:13px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
         <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 120px; font-size:13px;" aria-label="Platform(s): activate to sort column ascending">链接名称</th>
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 150px;font-size:13px;" aria-label="Engine version: activate to sort column ascending">链接地址</th>
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 120px;font-size:13px;" aria-label="Browser: activate to sort column ascending">联系人</th>
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 120px;font-size:13px;" aria-label="Browser: activate to sort column ascending">email</th>
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 100px;font-size:13px;" aria-label="Browser: activate to sort column ascending">状态</th>
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 127px;font-size:13px;" aria-label="CSS grade: activate to sort column ascending">操作</th>
       </tr> 
      </thead> 
      <tbody  role="alert" aria-live="polite" aria-relevant="all">
      	@foreach($url as $row)
       <tr class="odd" style="font-size:13px;" align="center"> 
        <td class="sorting_1">{{$row->id}}</td> 
        <td class=" ">{{$row->linkname}}</td> 
        <td class=" ">{{$row->linkaddress}}</td> 
        <td class=" ">{{$row->username}}</td> 
        <td class=" ">{{$row->email}}</td> 
        <td class=" ">{{$list[$row->status]}}</td> 
        <td class=" " ><a href="javascript:fun({{$row->id}})" class="btn btn-success"><i class="icon-trash"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="/admin/link/edit/{{$row->id}}" class="btn btn-info"><i class="icon-pencil"></i></a></td> 
       </tr>
       	@endforeach
      </tbody>
     </table>
     <div class="dataTables_info" id="DataTables_Table_1_info">
      Showing 1 to 10 of 57 entries
     </div>
     <div class="dataTables_paginate paging_full_numbers" id="pages">
     {!!$url->appends($request)->render()!!}
     </div>
    </div> 
   </div> 
  </div>
  <script type="text/javascript">
      function fun(id){
          if(confirm('你确定删除吗?')){
                window.location="/admin/link/del/"+id;
          }
      }
  </script>				
@endsection