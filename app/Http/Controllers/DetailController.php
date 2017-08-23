<?php

namespace App\Http\Controllers;
//use Illuminate\Http\Request;
//use DB;
//use App\Http\Requests;
//use App\Http\Controllers\Controller;

class DetailController
{
    //加载后台页面
    public function index($id){
     
    
    $list1=DB::table('shop')->where('id','=',$id)->first();
    
   	$new=DB::table('shop')->where('status','=','1')->orderBy('addtime','desc')->paginate(6);
	
	//评论
   	$comment=DB::table('comment')
   			->where('shopid','=',$id)
   			->get();

    // 无线分类
    $list=WebIndexController::getcatesbypid(0);  
    return view('web.detail',['list1'=>$list1,'new'=>$new,'list'=>$list,'comment'=>$comment]);
  }
}