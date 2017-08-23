@extends('public.index')
@section('edit')
 <div class="mws-panel grid_8">
          <div class="mws-panel-header">
               <span>订单修改</span>
          </div>
          <div class="mws-panel-body no-padding">
               <form action="/admin/orders/update" method="post" class="mws-form"> 
                    <div class="mws-form-inline">
                         <div class="mws-form-row">
                              <label class="mws-form-label">订单ID:</label>
                              <div class="mws-form-item">
                                   <input value="{{$list->id}}" type="text" class="small" name="id" disabled> 
                              </div>
                         </div>
                    <div class="mws-form-row">
                    <label class="mws-form-label">状态</label>
                    <div class="mws-form-item">
                      <select class="small" name="status">
                       <option value=1 @if($list->status==1) selected @endif>未付款</option>
                       <option value=2 @if($list->status==2) selected @endif >已付款,为发货</option>
                       <option value=3 @if($list->status==3) selected @endif>已发货</option>
                       <option value=4 @if($list->status==4) selected @endif >确认收货</option>    
                      </select>
                    </div>
                   </div>
                    </div>
                    <div class="mws-button-row">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$list->id}}">
                         <input type="submit" class="btn btn-danger" value="修改">
                         <input type="reset" class="btn " value="重置">
                    </div>
               </form>
          </div>         
      </div>
@endsection