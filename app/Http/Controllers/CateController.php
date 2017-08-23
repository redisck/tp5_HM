<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CateController extends Controller
{

    //成员属性
    public $request;
    //方法
    public function __construct(Request $request){
        $this->request = $request;
    }
    //调整类别的顺序
      public function getCate(){
        
       $list=DB::table('cates')->select(DB::raw('*,concat(path,",",id) as paths'))->where('name','like','%'.$this->request->input('keywords').'%')->orderBy('paths')->paginate(10);
        //遍历
        foreach($list as $key=>$value){

            //把字符串转换为数组
            $arr=explode(',',$value->path);
            // count()-1
            //求数组的长度
            $len=count($arr);
            //求逗号的个数
            $dlen=$len-1;
            // var_dump($len);
            $list[$key]->name=str_repeat('--|',$dlen).$value->name;
            // var_dump($list);
        }
        return $list;
      }

       //调整类别的顺序(不分页)
      public static function getCates(){
        
       $list=DB::table('cates')->select(DB::raw('*,concat(path,",",id) as paths'))->orderBy('paths')->get();
        //遍历
        foreach($list as $key=>$value){
            
            //把字符串转换为数组
            $arr=explode(',',$value->path);
            // count()-1
            //求数组的长度
            $len=count($arr);
            //求逗号的个数
            $dlen=$len-1;
            // var_dump($len);
            $list[$key]->name=str_repeat('--|',$dlen).$value->name;
            // var_dump($list);
        }
        return $list;
      }


   //类别列表
    public function getIndex(Request $request){

        //获取类别的信息
        $cates=self::getCate();
        //解析列表模板
        return view('cate.index',['cates'=>$cates,'request'=>$request->all()]);

    }

    //加载添加类别模块
    public function getAdd(){

        //获取类别信息
        // $list=DB::table('cates')->get();
        $list=self::getCates();
        //加载模板
        return view('cate.add',['list'=>$list]);
    }

    //执行添加
    public function postInsert(Request $request){
       $data=array();
        $data=$request->except('_token');
        //获取pid
        $pid=$request->input('pid');
        //1.如果添加的类别  是顶级分类的话
        if($pid==0){
            $data['path']='0';
        }else{
            //2.如果添加的类别不是顶级分类的话
            // path
            //获取父类的信息
            $info=DB::table('cates')->where('id','=',$pid)->first();
            //拼接path
            $data['path']=$info->path.','.$info->id;

        }
        //执行插入数据库的操作
        $res=DB::table('cates')->insert($data);
        if($res){
          
            return redirect('/admin/cate/index')->with('success','添加成功');
        }else{
           
            return back()->with('error','添加失败');
        }

    }

    //执行删除
    public function getDel($id){
        //判断是否有子类
        $res=DB::table('cates')->where('pid','=',$id)->count();
        // dd($res);
        // if(DB::table('cates')->where('id','=',$id))
        if($res>0){
            return back()->with('error','请先删除子类');
        }

        //执行删除
        if(DB::table('cates')->where('id','=',$id)->delete()){
            return redirect('/admin/cate/index')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }

    }

    //修改数据
    public function getEdit($id){

        //判断是否有子类(有子类就只能修改名称)先保留
        $res=0;
        $res=DB::table('cates')->where('pid','=',$id)->count();
        //获取需要修改的数据
        $info=DB::table('cates')->where('id','=',$id)->first();
        //解析模板
        return view('cate.edit',['info'=>$info,'cates'=>self::getCates(),'res'=>$res]);
    }

    //执行修改
    public function postUpdate(Request $request){
        $data=array();
        //保存需要更新的值
        $data=$request->except(['id','_token']);
        // array_key_exists

        if(array_key_exists('pid',$data)){
            //pid存在 说明没有子类

            //获取父类pid
            $pid=$request->input('pid');
            //如果添加的类别是顶级分类的话
            if($pid==0){
                $data['path']='0';
            }else{
                //如果添加的类别不是顶级分类的话
                // path
                //获取父类的信息
                $info=DB::table('cates')->where('id','=',$pid)->first();
                //拼接path
                $data['path']=$info->path.','.$info->id;

            }
        }
        //执行数据库的修改操作
        if(DB::table('cates')->where('id','=',$request->input('id'))->update($data)){
            return redirect('/admin/cate/index')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

}
