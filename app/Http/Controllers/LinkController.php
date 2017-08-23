<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LinkController extends Controller
{
   public function getIndex(Request $request){
    // return view()
    $url=DB::table('linkurl')->where('linkname','like','%'.$request->input('sname').'%')->paginate(4);
    $list=['1'=>'新添加','2'=>'显示','3'=>'不显示'];
    // dd($url);
    return view('link.index',['url'=>$url,'list'=>$list,'request'=>$request->all()]);

   }

   public function getAdd(){

        return view('link.add');

   }
   public function postInsert(Request $request){

         // echo '111';
        // //自动验证
        $this->validate($request,[
            'linkname'=>'required|max:8',//不能为空
            'linkaddress'=>'required|url',
            'username'=>'required',
            'email'=>'required|email|unique:linkurl',
            ],[
            'linkname.required'=>'链接名称不能为空',
            'linkname.max'=>'链接名称不能为空',
            'linkaddress.required'=>'链接地址不能为空',
            'linkaddress.url'=>'链接地址格式不正确',
            'username.required'=>'联系人不能为空',
            'email.required'=>'邮箱格式不对',
            'email.email'=>'邮箱格式不对',
            'email.unique'=>'email不能重复',

            ]);

        // //获取所有的参数
        $data=$request->only(['linkname','linkaddress','username','email','status']);

        //执行数据库插入操作
        if(DB::table('linkurl')->insert($data)){
            return redirect('/admin/link/index')->with('success','添加成功');
        }else{
            return back()->with('errors','添加失败');
        }

   }
   public function getDel($id){
        // dd($id);
        if(DB::table('linkurl')->where('id','=',$id)->delete()){
            return redirect('/admin/link/index')->with('success','删除成功');
        }else{
            return back()->with('success','删除失败');
        }
   }

   public function getEdit($id){
        // echo "11";
        //获取需要修改的单条数据
        $row=DB::table('linkurl')->where('id','=',$id)->first();
        return view('link.edit',['row'=>$row]);
   }

   public function postUpdate(Request $request){

         $data=$request->except('_token');
         $id=$request->input('id');
         if(DB::table('linkurl')->where('id','=',$request->input('id'))->update($data)){
            return redirect('/admin/link/index')->with('success','修改成功');
         }else{
            return back()->with('error','修改失败');
         }
        // echo "111";
   }

   public static function linkdata(){
        $url=DB::table('linkurl')
                ->where('status','=','2')
                ->paginate(15);
        return $url;
   } 

}
