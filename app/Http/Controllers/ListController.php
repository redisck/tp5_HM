<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    

//新品推荐
    public static function getXptj($n){

         //新品推荐
        $new=DB::table('shop')->where('status','=','1')->wherein('cate_id',$n)->orderBy('addtime','desc')->get();
        
        return $new;

    }

    public static function cname($id){

        //获取类名
        $l=DB::table('cates')->where('id','=',$id)->first();
      
        $list=$l->name;

        return $list;

    }

    public  function getIndex(Request $request){

        // dd($request->all());
        $id=$request->input('id');
         
    //商品遍历
        // 1.查询所有的所有的子类
        $n=DB::table('cates')->where('path','like',"%,{$id}%")->orwhere('id',$id)->lists('id');
        // dd($n);
        if ($request->input('keywords')){

            $info=DB::table('shop')->where('name','like','%'.$_GET['keywords'].'%')->paginate(10);
         }else{
            $info=DB::table('shop')->wherein('cate_id',$n)->paginate(10);
         }
        // $info=DB::table('shop')->wherein('cate_id',$n)->paginate(10);

        //2.新品推荐
        $new=self::getXptj($n);

        //3.类名
        $list1=self::cname($id);

        //4.无线分类
        $list=WebIndexController::getcatesbypid(0);
        // dd($list);
        
        return view('web.list',['info'=>$info,'new'=>$new,'list1'=>$list1,'id'=>$id,'request'=>$request->all(),'list'=>$list]);

        }

// 价格排行
    public function getPrice(Request $request){
           
        $id=$request->input('id');

        $n=DB::table('cates')->where('path','like',"%,{$id}%")->orwhere('id',$id)->lists('id');

        $info=DB::table('shop')->wherein('cate_id',$n)->orderBy('price','desc')->paginate(10);
            

    //2.新品推荐
        $new=self::getXptj($n);

   //3.类名
        $list1=self::cname($id);

        //4.无线分类
        $list=WebIndexController::getcatesbypid(0);

        return view('web.list',['info'=>$info,'new'=>$new,'list1'=>$list1,'id'=>$id,'request'=>$request->all(),'list'=>$list]);
    }

// 销量排行
       public function getBuynum(Request $request){
           
        $id=$request->input('id');

        $n=DB::table('cates')->where('path','like',"%,{$id}%")->orwhere('id',$id)->lists('id');

        $info=DB::table('shop')->wherein('cate_id',$n)->orderBy('buynum','desc')->paginate(10);


    //2.新品推荐
        $new=self::getXptj($n);
      
   //3.类名
        $list1=self::cname($id);

        //4.无线分类
        $list=WebIndexController::getcatesbypid(0);

        return view('web.list',['info'=>$info,'new'=>$new,'list1'=>$list1,'id'=>$id,'request'=>$request->all(),'list'=>$list]);
    }

// 人气排行
       public function getClicknum(Request $request){
           
        $id=$request->input('id');

        $n=DB::table('cates')->where('path','like',"%,{$id}%")->orwhere('id',$id)->lists('id');

        $info=DB::table('shop')->wherein('cate_id',$n)->orderBy('clicknum','desc')->paginate(10);

    //2.新品推荐
        $new=self::getXptj($n);
      
   //3.类名
        $list1=self::cname($id);

        //4.无线分类
        $list=WebIndexController::getcatesbypid(0);

        return view('web.list',['info'=>$info,'new'=>$new,'list1'=>$list1,'id'=>$id,'request'=>$request->all(),'list'=>$list]);
    }

}