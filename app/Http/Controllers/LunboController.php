<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Config;
use File;
use onfig;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LunboController extends Controller
{
    //列表
   public function getIndex(Request $request){
      $list=DB::table('lunbo')->where('lunboname','like','%'.$request->input('aname').'%')->paginate(4);

       $path=trim(Config::get('app.lunbo_upload'),'.');
       // dd($path);
      // $list->advspic=$path.$list->advspic;
      $status=['1'=>'不显示','2'=>'显示'];
      // var_dump($request->all());
      return view('lunbo.index',['list'=>$list,'path'=>$path,'status'=>$status,'request'=>$request->all()]);

    }
    //添加
    public function getAdd(){

      return view('lunbo.add');
    }

  public function postInsert(Request $request){
  
      $this->validate($request,[
        'lunboname'=>'required',
        'lunbopic'=>'required',
        ],[
        'lunboname.required'=>'图片名不能为空',
        'lunbopic.required'=>'图片不能为空',
       
        ]);

        //获取上传文件的后缀名
        $s=$request->file('lunbopic')->getClientOriginalExtension();
        $path=trim(Config::get('app.lunbo_upload'),'.');
        // dd($path);
        //限制上传图片的格式
        if(!in_array($s,array('jpg','gif'))){
          return redirect('/admin/lunbo/add')->with('error','图片格式不正确');
        }
        $data=$request->only(['lunboname','lunbopic','status']);

        $name=time()+rand(1,9999999999);
        // dd($s);
        if($request->hasFile('lunbopic')){
            //移动文件
            $request->file('lunbopic')->move(Config::get('app.lunbo_upload'),$name.'.'.$s);
        }

        // 拼接路径
        $data['lunbopic']=trim(Config::get('app.lunbo_upload').'/'.$name.'.'.$s,'.');
        if(DB::table('lunbo')->insert($data)){
          return redirect('/admin/lunbo/index')->with('success','添加成功');
        }else{
          return back()->with('errors','添加失败')->withInput();
        }
    }
    //删除
    public function getDel($id){
            $row=DB::table('lunbo')->where('id','=',$id)->first();
            // dd($row);

        if(DB::table('lunbo')->where('id','=',$id)->delete()){
            
            if(file_exists('.'.$row->lunbopic)){

              File::delete('.'.$row->lunbopic);
            
            }

            return redirect('/admin/lunbo/index')->with('success','删除成功');

         
        }else{
            return back()->with('error','删除失败');
        }
      echo $name;
    }

    public function getEdit($id){
        $row=DB::table('lunbo')->where('id','=',$id)->first();
        $path=trim(Config::get('app.lunbo_upload'),'.');
        return view('lunbo.edit',['row'=>$row,'path'=>$path]);

    }

    public function postUpdate(Request $request){
      // 检测是否有文件上传
      if($request->hasFile('lunbopic')){
           $data=$request->except('_token','oldpic');
           //获取文件后缀名称
           $s=$request->file('lunbopic')->getClientOriginalExtension();
           //判断是否为图片
          if(!in_array($s,array('jpg','gif'))){
              return back()->with('error','图片格式不正确');
            }

          $name=time()+rand(1,9999999999);
        // dd($s);
        if($request->hasFile('lunbopic')){
            //移动文件
            $request->file('lunbopic')->move(Config::get('app.lunbo_upload'),$name.'.'.$s);
        }

          $data['lunbopic']=trim(Config::get('app.lunbo_upload').'/'.$name.'.'.$s,'.');

          $oldname=$request->input('oldpic');
          // $path=Config::get('app.lunbo_upload');
        if(file_exists('.'.'/'.$oldname)){
          
          File::delete('.'.'/'.$oldname);
        }
           
      }else{
        $data=$request->except('_token','lunbopic','oldpic');
      }
        
        $id=$request->input('id');

         if(DB::table('lunbo')->where('id','=',$request->input('id'))->update($data)){
            return redirect('/admin/lunbo/index')->with('success','修改成功');

         }else{
            return back()->with('error','修改失败');
         }
    }
  }  

