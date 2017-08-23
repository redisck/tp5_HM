@extends('public.index')
@section('index')
<div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span><i class="icon-table"></i> 公告列表</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
     <div class="dataTables_filter" id="DataTables_Table_1_filter">
      <form action="/admin/notice/index" method="get">
      <label>公告标题: <input type="text" name='titlename'  value="{{$request['titlename'] or ''}}" aria-controls="DataTables_Table_1" />
        <button class='btn btn-success'>搜索</button>
      </label>
      </form>
     </div>
   


     <table class=" mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row">
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 103px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 172px;" aria-label="Platform(s): activate to sort column ascending">管理员</th>
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 245px;" aria-label="Platform(s): activate to sort column ascending">标题</th>
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 245px;" aria-label="Engine version: activate to sort column ascending">内容</th>
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 145px;" aria-label="Engine version: activate to sort column ascending">添加时间</th>
        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 127px;" aria-label="CSS grade: activate to sort column ascending">操作</th>
       </tr> 
      </thead> 
      <tbody  role="alert" aria-live="polite" aria-relevant="all">
        @foreach($notice as $row)
       <tr class="odd" align="center"> 
        <td class="  sorting_1">{{$row->id}}</td>
        <td class=" ">{{$row->user}}</td> 
        <td class=" ">{{$row->title}}</td> 
        <td class=" ">{{$row->contens}}</td>
        <td class=" ">{{$row->addtime}}</td> 
        <td class=" ">
        <a href="javascript:fun({{$row->id}})" class="btn btn-success"><i class="icon-trash"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="/admin/notice/edit/{{$row->id}}" class="btn btn-info"><i class="icon-pencil"></i></a></td> 
       </tr>
        @endforeach
      </tbody>
     </table>
     <div class="dataTables_info" id="DataTables_Table_1_info">
      Showing 1 to 10 of 57 entries
     </div>
     <div class="dataTables_paginate paging_full_numbers" id="pages">
     {!!$notice->appends($request)->render()!!}
     </div>
    </div> 
   </div> 
  </div>
  <script type="text/javascript">
      function fun(id){
          if(confirm('你确定删除吗?')){
                window.location="/admin/notice/del/"+id;
          }
      }

  </script>
@endsection