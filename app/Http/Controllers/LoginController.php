<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use DB;
use Session;
use Crypt;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
   public function login(){
   	
   	$info=\Cookie::get('userinfo');
   	// 加载页面
   	if($info){
   		
   		$infouser=Crypt::decrypt($info);

   		$info=explode('|',$infouser);
   		// dd($pass);

   		return view('login.login',['info'=>$info]);

   	}else{
   		return view('login.login',['info'=>array('','')]);
   	}
   	

   	
   }

   public function loginout(){

      Session::reflash();

      $info=\Cookie::get('userinfo');
      // 加载页面
      if($info){
         
         $infouser=Crypt::decrypt($info);

         $info=explode('|',$infouser);
         // dd($pass);

         return view('login.login',['info'=>$info]);

      }else{
         return view('login.login',['info'=>array('','')]);
      }

   }

   //执行登录的方法
   public function dologin(LoginRequest $request){
   		// dd($request->input('username'));
   	$user=DB::table('adminlist')->where('name','=',$request->input('username'))->first();
      // dd($user->status);
   		//用户查询
  if($user){    
	if($user->status!='3'){

 		$password=$user->pass;

		}else{
		return back()->with('error','用户无权限,请联系管理员');		
		}
   }else{
      return back()->with('error','此用户不存在!!');
   }
   		// $password=$user->passwd;

	//密码检测
	if(Hash::check($request->input('password'),$password)){
	// if($request->input('password')==$password){	
		//设置session(把用户id放在session里)
		session(['id'=>$user->id,'name'=>$user->name,'status'=>$user->status]);
		// echo "11";
		if($request->input('rem')){
			//建立字符串
			$str= "{$user->name}|{$request->input('password')}";
			 
			 //加密后放到cookie里
			$userinfo=Crypt::encrypt($str);

			\Cookie::queue('userinfo',$userinfo,30*60);
		}

		return redirect('/admin')->with('success','登录成功');

	}else{
		return back()->with('error','密码错误');
	  }	

   }

}
