<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController 
{
    //加载后台页面
    public function index(){
        //服务器信息
        //服务器软件:
        $data['apache'] = $_SERVER ['SERVER_SOFTWARE'];

        //php版本:
        $data['php']=PHP_VERSION;

        //SERVER网站域名:
        $data['server']=$_SERVER['SERVER_ADDR'];


        //商品统计
        //新品上架
        $data['newnum']=DB::table("shop")->where('status','=',1)->count();

        //旧品下架
        $data['oldnum']=DB::table("shop")->where('status','=',3)->count();

        //热卖商品
        $data['hote']=DB::table('shop')->max('buynum');

        //滞销商品
        $data['low']=DB::table('shop')->min('buynum');


        //登录信息
        //累计管理员个数
        $data['adminnum']=DB::table('adminlist')->count();


        //累计用户量
        $data['usernum']=DB::table('users')->count();
     

        //时间
        $time=date('Y-m-d',time());
        // dd($time);
        //今日未成交订单数
        $data['forder']=DB::table('orders')->where('addtime','like',"%".$time."%")->whereIn('status',[1])->count();
        //今日成交单数
        $data['torder']=DB::table('orders')->where('addtime','like',"%".$time."%")->whereIn('status',[2,3,4])->count();
       
       //今日成交金额
        $data['tmoney']=DB::table('orders')->where('addtime','like',"%".$time."%")->whereIn('status',[2,3,4])->sum('total');
        //今日未成交金额
        $data['fmoney']=DB::table('orders')->where('addtime','like',"%".$time."%")->whereIn('status',[1])->sum('total');


        //昨日订单
       	$ytime=date('Y-m-d',strtotime('-1 day'));
       	      
        //今日未成交订单数
        $data['yforder']=DB::table('orders')->where('addtime','like',"%".$ytime."%")->whereIn('status',[1])->count();
        //今日成交单数
        $data['ytorder']=DB::table('orders')->where('addtime','like',"%".$ytime."%")->whereIn('status',[2,3,4])->count();
       
       //今日成交金额
        $data['ytmoney']=DB::table('orders')->where('addtime','like',"%".$ytime."%")->whereIn('status',[2,3,4])->sum('total');
        //今日未成交金额
        $data['yfmoney']=DB::table('orders')->where('addtime','like',"%".$ytime."%")->whereIn('status',[1])->sum('total');
	    // dd($data);


	    //总订单
	    //未成交订单
        $data['zforder']=$data['forder']+$data['yforder'];

        //成交订单
        $data['ztorder']=$data['torder']+$data['ytorder'];

        //未成交总金额
        $data['zfmoney']=$data['fmoney']+$data['yfmoney'];

        //成交总金额
        $data['ztmoney']=$data['tmoney']+$data['ytmoney'];


        return view('admin.index',['data'=>$data]);
    }
}
