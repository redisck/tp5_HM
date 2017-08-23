<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Config;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\InsertShopRequest;

class ShopController extends Controller
{
    //加载添加页面
    public function getAdd(){

    	$list=CateController::getCates();
    	//加载添加页面模板
    	return view('shop.add',['list'=>$list]);
    }

    //执行添加
    public function postInsert(InsertShopRequest $request){

    	$data=$request->except('_token');
    	//上传图片
    	//检测是否有上传图片
    	if($request->hasFile('pic')){
    		//获取后缀
    		$extension=$request->file('pic')->getClientOriginalExtension();
    		//上传图片随机名字
    		$s=time()+rand(1,9999999);
    		//文件移动
    		$request->file('pic')->move(Config::get('app.shop_upload'),$s.'.'.$extension);
    		$data['pic']=trim(Config::get('app.shop_upload').'/'.$s.'.'.$extension,'.');

    		//赋初值
    		$data['buynum']=0;
    		$data['clicknum']=0;
    		$data['addtime']=date('Y-m-d H:i:s');
            if(DB::table('shop')->insert($data)){

                return redirect('/admin/shop/index')->with('success','添加成功');
            }else{
                return back()->with('error','添加失败');
            }
    	}
    }

    //列表页
     public function getIndex(Request $request){

     	$list_status=['1'=>'新品','2'=>'在售','3'=>'下架'];
     	$list=DB::table('shop')->join('cates','shop.cate_id','=','cates.id')->select(DB::raw('*,shop.name as sname,shop.id as sid,cates.name as cname'))->where('shop.name','like','%'.$request->input('keywords').'%')->paginate(8);
     	// dd($list);
        // $list=DB::table('shop')->paginate(3);
        // //加载模板
        return view('shop.index',['list'=>$list,'list_status'=>$list_status,'request'=>$request->all()]);
    }


     //执行删除
    public function getDel($id){
        //把需要删除的数据获取
        $info=DB::table('shop')->where('id','=',$id)->first();
        $pic='.'.$info->pic;
        if(file_exists($pic)){
            unlink($pic);
        }

        if(DB::table('shop')->where('id','=',$id)->delete()){
            return redirect('/admin/shop/index')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }


    //加载修改页面
    public function getEdit($id){
        //获取需要修改的数据
        $list=DB::table('shop')->where('id','=',$id)->first();
        //加载模板

        return view('shop.edit',['list'=>$list,'cates'=>CateController::getCates()]);
    }


    //执行修改的方法
    public function postUpdate(Request $request){
        $data=$request->except('_token','id','oldpic');
        $flag=0; //图片修改标志
        //上传图片
        //检测是否有上传图片
        if($request->hasFile('pic')){
            //获取后缀
            $extension=$request->file('pic')->getClientOriginalExtension();
            //上传图片随机名字
            $s=time()+rand(1,9999999);
            //文件移动
            $request->file('pic')->move(Config::get('app.shop_upload'),$s.'.'.$extension);
            // dd($extension);
            $data['pic']=trim(Config::get('app.shop_upload').'/'.$s.'.'.$extension,'.');
            $flag=1;
        }


        if(DB::table('shop')->where('id','=',$request->input('id'))->update($data)){

            if($flag){
                //删除原来的图片
                $pic=$request->input('oldpic');
                $pic='.'.$pic;
                 if(file_exists($pic)){
                     unlink($pic);
                 }
            }
            
            return redirect('/admin/shop/index')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }

    }

}
