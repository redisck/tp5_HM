<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //加载添加页面
    public function getAdd(){
        return view('user.add');
    }

    //执行添加
    public function postInsert(Request $request){

        //自动验证
        $this->validate($request, [
        'username' => 'required|unique:users',//用户规则
        'name' => 'required',//真实姓名规则
        'password' => 'required',//密码规则
        'repassword' => 'required|same:password',//确认密码规则
        'email' => 'required|email|unique:users',//邮箱规则
        'sex' => 'required',//性别规则
       
        ],[
        //错误信息
        'username.required'=>'用户名不能为空',
        'name.required'=>'真实姓名不能为空',
        'password.required'=>'密码不能为空',
        'repassword.required'=>'确认密码不能为空',
        'repassword.same'=>'两次密码不一致',
        'email.required'=>'邮箱不能为空',
        'email.email'=>'邮箱格式不对',
        'email.unique'=>'邮箱已被注册',
        'sex.required'=>'性别没有选择',
        'username.unique'=>'该用户已被注册',
        ]
        );

        //获取所有的参数
        $data=$request->only(['username','name','password','email','sex','address','status']);
        $data['token']=str_random(50);
        $data['password']=Hash::make($data['password']); 
        // $data['status']=1;
      
        //执行数据库插入操作
        if(DB::table('users')->insert($data)){
            //跳转到列表页
            return redirect('/admin/user/index')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }

    //列表页
    public function getIndex(Request $request){
        // var_dump($request->input('keywords'));
        //查询所有的数据
        $list=DB::table('users')->where('username','like','%'.$request->input('keywords').'%')->paginate(3);
        // dd($list);
        $sex_list=['1'=>'男','2'=>'女',''=>''];
        $status_list=['1'=>'未激活','2'=>'激活','3'=>'禁用'];
        //加载模板
        return view('user.index',['list'=>$list,'sex_list'=>$sex_list,'status_list'=>$status_list,'request'=>$request->all()]);
    }

    //执行删除
    public function getDel($id){
        if(DB::table('users')->where('id','=',$id)->delete()){
            return redirect('/admin/user/index')->with('success','删除成功');
        }else{
            return redirect('/admin/user/index')->with('error','删除失败');
        }
    }

    //加载修改模板  获取需要修改的数据
    public function getEdit($id){
        //获取需要修改的单条数据
        $stu=DB::table('users')->where('id','=',$id)->first();
        return view('user.edit',['stu'=>$stu]);
    }

    //执行修改
    public function postUpdate(Request $request){

         //自动验证
        $this->validate($request, [
        'name' => 'required',//真实姓名规则
        'email' => 'required|email',//邮箱规则
        'sex' => 'required',//性别规则

        ],[
        //错误信息
        'name.required'=>'真实姓名不能为空',
        'email.required'=>'邮箱不能为空',
        'email.email'=>'邮箱格式不对',
        'sex.required'=>'性别没有选择',
        ]
        );
        
        $data=$request->only(['name','sex','email','address','status']);
        if(DB::table('users')->where('id','=',$request->input('id'))->update($data)){
            return redirect('/admin/user/index')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }
}
