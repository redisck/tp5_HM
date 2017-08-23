<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminlistController extends Controller
{
   public function getAdd(){
   		//加载添加模块页面
   		return view('adminlist.add');
   }


   public function postInsert(Request $request){

   		//自动验证
        $this->validate($request, [
        'name' => 'required|unique:adminlist',//用户规则
        'pass' => 'required',//密码规则
        'repass' => 'required|same:pass',//确认密码规则

        ],[
        //错误信息
        'name.required'=>'用户名不能为空',
        'pass.required'=>'密码不能为空',
        'repass.required'=>'确认密码不能为空',
        'repass.same'=>'两次密码不一致',
        'name.unique'=>'该用户已被注册',
        ]
        );

        //获取所有的参数
        $data=$request->only(['name','pass','status']);
        $data['pass']=Hash::make($data['pass']); 
        // dd($data);
        //执行数据库操作
        if(DB::table('adminlist')->insert($data)){
        	 //跳转到列表页
            return redirect('/admin/adminlist/index')->with('success','添加成功');
        }else{
        	return back()->with('error','添加失败');
        }  
   }

   //列表页
   public function getIndex(Request $request){
   		//查询所有的数据
   		$list=DB::table('adminlist')->where('name','like','%'.$request->input('keywords').'%')->paginate(3);
   		$status_list=['1'=>'普通管理员','2'=>'超级管理员','3'=>'禁用'];
      $id=session('id');
      $adminuser=DB::table("adminlist")->where('id','=',$id)->first();
      $status=$adminuser->status;
   		// dd($list);
   		return view('adminlist.index',['list'=>$list,'status'=>$status,'status_list'=>$status_list,'request'=>$request->all()]);
   }

   //执行删除
   public function getDel($id){
   		if(DB::table('adminlist')->where('id','=',$id)->delete()){
	            return redirect('/admin/adminlist/index')->with('success','删除成功');
	        }else{
	            return redirect('/admin/adminlist/index')->with('error','删除失败');
	        }
   		}

   	//加载修改模块
    public function getEdit($id){
        //获取需要修改的单条数据
        $stu=DB::table('adminlist')->where('id','=',$id)->first();
        // dd($stu);
        return view('adminlist.edit',['stu'=>$stu]);
    }

    //执行修改
    public function postUpdate(Request $request){
        $data=$request->only(['status']);
        if(DB::table('adminlist')->where('id','=',$request->input('id'))->update($data)){
            return redirect('/admin/adminlist/index')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }


}
