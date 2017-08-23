@extends('public.index')
@section('index')
<div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i> 广告列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
     <div class="dataTables_filter" id="DataTables_Table_1_filter">
      <form action="/admin/advs/index" method="get">
      <label>广告名称: <input type="text" name='aname' value="{{$request['aname'] or ''}}" aria-controls="DataTables_Table_1" />
        <button class='btn btn-success'>搜索</button>
      </label>
      </form>
     </div>
     <table class=" mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 103px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 245px;" aria-label="Platform(s): activate to sort column ascending">广告名称</th>
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 245px;" aria-label="Platform(s): activate to sort column ascending">广告图片</th>
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 172px;" aria-label="Engine version: activate to sort column ascending">广告地址</th>
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 172px;" aria-label="Engine version: activate to sort column ascending">状态</th>
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 127px;" aria-label="CSS grade: activate to sort column ascending">操作</th>
       </tr> 
      </thead> 
      <tbody  role="alert" aria-live="polite" aria-relevant="all">
      	@foreach($list as $row)
       <tr class="odd" align="center"> 
        <td class="  sorting_1">{{$row->id}}</td>
        <td class=" ">{{$row->advsname}}</td> 
        <td class=" "><img src="{{$row->advspic}}" width="50px" height="50"></td> 
        <td class=" ">{{$row->advslink}}</td> 
        <td class=" ">{{$status[$row->status]}}</td> 
        <td class=" ">
        <a href="/admin/advs/del/{{$row->id}}" class="btn btn-success"><i class="icon-trash"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="/admin/advs/edit/{{$row->id}}" class="btn btn-info"><i class="icon-pencil"></i></a></td> 
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
  
@endsection