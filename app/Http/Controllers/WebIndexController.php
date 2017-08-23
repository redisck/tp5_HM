<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class WebIndexController extends Controller
{
	//无线分类递归
	public static function getcatesbypid($pid){
    	//获取
    	$s=DB::table('cates')->where('pid','=',$pid)->get();
    	$data=[];
    	//遍历uyj
    	foreach($s as $key=>$value){
    		$value->sub=self::getcatesbypid($value->id);
    		$data[]=$value;
    	}
    	return $data;
    }

    //获取1F2F的数据
    public function fdata(){
        //获取一级类
        $s=DB::table('cates')->where('pid','=',0)->get();
        //所有类
        $cates=DB::table('cates')->get();
        $cateid=[];
        for($i=0; $i<2; $i++){
            foreach($cates as $row){
                $arr=explode(',',$row->path);
                if(in_array($s[$i]->id, $arr)){
                    $cateid[$i][]=$row->id;
                }
            }

            $data[$i][] = DB::table('shop')
                    ->whereIn('cate_id', $cateid[$i])
                    ->paginate(8);
        }
        return $data;
    }

    //加载前台首页
	public function index(){

        //无线分类
		$list=self::getcatesbypid(0);
        // dd($list);
        //首页1F数据
        foreach($list as $key=>$row){
            $num=0;
            foreach($row->sub as $s){
                foreach($s->sub as $v){
                    if($num<9){
                        $data[$key][]=$v;
                        $num++;
                    }
                }
            }  
        }
        //新品上市
        $newshop=DB::table('shop')
                ->orderBy('addtime', 'desc')
                ->paginate(6);

        
        //广告
        $adv=DB::table('advs')->where('status','=',2)->paginate(10);
        //公告
        $notice=DB::table('notice')->paginate(10);
        //轮播图
        $pic=DB::table('lunbo')->where('status','=',2)->paginate(5);
        //1f2f数据
        $fdata=$this->fdata();
        //友情链接
        $ldata=LinkController::linkdata();
        // dd($ldata);
        // dd($fdata);
		//加载首页
		return view('web.index',['list'=>$list,'adv'=>$adv,'notice'=>$notice,'pic'=>$pic,'data'=>$data,'newshop'=>$newshop,'fdata'=>$fdata,'ldata'=>$ldata]);
	}



    public function index1(){

    	//获取所有的类别
    	$s=DB::table('cates')->get();
    	//数据遍历
     
    	foreach($s as $key=>$value){
    		$s[$key]->shop=DB::table('shop')
    			->select(DB::raw('*,cates.name as cname,shop.name as sname,shop.id as sid'))
    			->join('cates','cates.id','=','shop.cate_id')->where('shop.cate_id','=',$value->id)
    			->get();
    	}
        //解析模板
        // return view('web.index');
    }
}
