<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Config;
use File;
use onfig;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdvsController extends Controller
{
   public function getIndex(Request $request){

      $list=DB::table('advs')->where('advsname','like','%'.$request->input('aname').'%')->paginate(6);

      $status=['1'=>'新添加','2'=>'显示','3'=>'不显示'];
      
      return view('advs.index',['list'=>$list,'status'=>$status,'request'=>$request->all()]);

    }
    public function getAdd(){

      return view('advs.add');
    }

  public function postInsert(Request $request){
        // dd();
    //检测是否有文件上传
        // dd($ss);
        // 获取上传文件类型
        // dd($request->advspic);
      $this->validate($request,[
        'advsname'=>'required',
        'advspic'=>'required',
        'advslink'=>'required|url',
        ],[
        'advsname.required'=>'广告名不能为空',
        'advspic.required'=>'图片不能为空',
        'advslink.required'=>'广告地址不能为空',
        'advslink.url'=>'广告地址不符合',
        ]);

        //获取上传文件的后缀名
        $s=$request->file('advspic')->getClientOriginalExtension();

        $path=trim(Config::get('app.adv_upload'),'.');
        // dd($path);
        //限制上传图片的格式
        if(!in_array($s,array('jpg','gif','png'))){
          return redirect('/admin/advs/add')->with('error','图片格式不正确');
        }
        $data=$request->only(['advsname','advspic','advslink','status']);

        $name=time()+rand(1,9999999999);
        // dd($s);
        if($request->hasFile('advspic')){
            //移动文件
            $request->file('advspic')->move(Config::get('app.adv_upload'),$name.'.'.$s);
        }

        // 拼接路径
        $data['advspic']=$path.'/'.$name.'.'.$s;
       

        if(DB::table('advs')->insert($data)){
          return redirect('/admin/advs/index')->with('success','添加成功');
        }else{
          return back()->with('errors','添加失败')->withInput();
        }
    }

    public function getDel($id){
             $row=DB::table('advs')->where('id','=',$id)->first();
            
            // $path='.'.$row->advspic;
            // var_dump(file_exists($path));
        if(DB::table('advs')->where('id','=',$id)->delete()){

             // dd($row->advspic);

             $path='.'.$row->advspic;
            if(file_exists($path)){

              File::delete('.'.$row->advspic);
            
            }

            return redirect('/admin/advs/index')->with('success','删除成功');

         
        }else{
            return back()->with('error','删除失败');
        }
      // echo $name;
    }

    public function getEdit($id){
        $row=DB::table('advs')->where('id','=',$id)->first();
        return view('advs.edit',['row'=>$row]);

    }

    public function postUpdate(Request $request){
      // 检测是否有文件上传
      if($request->hasFile('advspic')){
           $data=$request->except('_token','oldpic');
           //获取文件后缀名称
           $s=$request->file('advspic')->getClientOriginalExtension();
           //判断是否为图片
          if(!in_array($s,array('jpg','gif'))){
              return back()->with('error','图片格式不正确');
            }

          $name=time()+rand(1,9999999999);
        // dd($s);
        if($request->hasFile('advspic')){
            //移动文件
            $request->file('advspic')->move(Config::get('app.adv_upload'),$name.'.'.$s);
        }

          $path=trim(Config::get('app.adv_upload'),'.');

          $data['advspic']=$path.'/'.$name.'.'.$s;

          $oldname=$request->input('oldpic');
         
        if(file_exists('.'.$oldname)){
          
          File::delete('.'.$oldname);
        }
           
      }else{
        $data=$request->except('_token','advspic','oldpic');
      }
        
        $id=$request->input('id');

         if(DB::table('advs')->where('id','=',$request->input('id'))->update($data)){
            return redirect('/admin/advs/index')->with('success','修改成功');

         }else{
            return back()->with('error','修改失败');
         }
    }
  }  

