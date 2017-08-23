@extends('pcenter.public.index')
@section('content')		
								<table style="margin-top: 20px; width:1000px; float:right;" class="sui-table table-bordered-simple">
								  <thead>
								    <tr>
								      <th>收货人</th>
								      <th>收货地址</th>
								      <th>邮编</th>
								      <th>电话/手机</th>
								      <th>操作</th>
								      <th></th>
								    </tr>
								  </thead>
								  <tbody>
								  @foreach($address as $row)
								    <tr>
								      <td>{{$row->linkman}}</td>
								      <td>{{$row->address}}</td>
								      <td>{{$row->code}}</td>
								      <td>{{$row->phone}}</td>
								      <td style="color: #007AFF;"><a href="/web/pcenter/deladdress/{{$row->id}}">删除</a></td>
								    </tr>
								  @endforeach 
								  </tbody>
								</table>
							</div>
@endsection
