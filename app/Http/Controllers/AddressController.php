<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{

    //列表页
    public function getIndex(Request $request){
        $list=DB::table('address')
        ->join('users','address.uid','=','users.id')
        ->select(DB::raw('*,address.id as addressid,address.uid as addressuid,address.address as addr'))
        ->where('linkman','like','%'.$request->input('keywords').'%')
        ->paginate(4);
        // dd($list);
        //加载订单地址模板
        return view('address.index',['list'=>$list,'request'=>$request->all()]);
        
    }

}

   


   

