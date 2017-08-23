<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{

    //加载列表
    public function getIndex(Request $request){
        // dd($request->all());
       $status_list=['1'=>'未付款','2'=>'已付款，未发货','3'=>'已发货','4'=>'确认收货'];
        //查询订单的数据
        $list=DB::table('orders')
                ->join('users','users.id','=','orders.uid')
                ->join('address','orders.addressid','=','address.id')
                ->select(DB::raw('*,orders.id as orderid,address.address as address_add,orders.status as orderstatus'))
                ->where('orders.ordernum','like','%'.$request->input('keywords').'%')
                ->orderBy('orders.id')
                ->paginate(6);

        // dd($list);
        //加载订单模板
        return view('orders.index',['list'=>$list,'status_list'=>$status_list,'request'=>$request->all()]);
    }
    //加载详情列表
    public function getIndex1(Request $request){
        $list=DB::table('order_info')
        ->join('orders','orders.id','=','orderid')
        ->join('users','order_info.uid','=','users.id')
        ->join('shop','order_info.goodsid','=','shop.id')

        ->select(DB::raw('*,order_info.id as orderinfoid'))
        ->where('order_info.orderid','=',$request->input('id'))
        ->paginate(4);
        // dd($list);
       // '加载详情模板'
        return view('order_info.index',['list'=>$list,'request'=>$request->all()]);
    }

    public function getEdit($id){
        //获取需要修改的单条数
            // echo $id;
        $list=DB::table('orders')->where('id','=',$id)->first();
    //加载修改模板  获取需要修改的数据 
        return view('orders.edit',['list'=>$list]);
    }

    //执行修改
    public function postUpdate(Request $request){

        $data=$request->only(['id','status']);
        if(DB::table('orders')->where('id','=',$request->input('id'))->update($data)){
            return redirect('/admin/orders/index')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }
}

   

