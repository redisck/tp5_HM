<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Config;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\InsertShopRequest;

class CommentController extends Controller
{

    //列表页
     public function getIndex(Request $request){

     	$list_status=['1'=>'好评','2'=>'中评','3'=>'差评'];
     	// $list=DB::table('shop')->join('cates','shop.cate_id','=','cates.id')->select(DB::raw('*,shop.name as sname,shop.id as sid,cates.name as cname'))->where('shop.name','like','%'.$request->input('keywords').'%')->paginate(8);
     	$list=DB::table('comment')->where('uname','like','%'.$request->input('keywords').'%')->paginate(5);
     	// dd($list);
        // $list=DB::table('shop')->paginate(3);
        // //加载模板
        return view('comment.index',['list'=>$list,'list_status'=>$list_status,'request'=>$request->all()]);
    }


     //执行删除
    public function getDel($id){
        //把需要删除的数据获取
        $info=DB::table('comment')->where('id','=',$id)->first();

        if(DB::table('comment')->where('id','=',$id)->delete()){
            return redirect('/admin/comment/index')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }


}