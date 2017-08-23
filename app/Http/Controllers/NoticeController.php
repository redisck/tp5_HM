<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Config;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class NoticeController extends Controller
{
  public function getAdd(){

    return view('notice.add');

  }

  public function postInsert(Request $request){

  	$this->validate($request,[
  		'title'=>'required',
  		'contens'=>'required',
  	],[
  		'title.required'=>'标题不能为空',
  		'contens.required'=>'内容不能为空',
  		]);	

  	// dd($request->all());
  	$data=$request->except('_token');
  	$data['addtime']=date('Y/m/d H:i:s',time());
  	if(DB::table('notice')->insert($data)){

  			return redirect('/admin/notice/index')->with('success','添加成功');

  		}else{
  			return back()->with('error','添加失败');
  		}
  }

  public function getIndex(Request $request){
  		// 数据库查询操作

  		$list=DB::table('notice')->where('title','like','%'.$request->input('titlename').'%')->paginate(4);

  		return view('notice.index',['notice'=>$list,'request'=>$request->all()]);

  }

  public function getDel($id){

		//获取需要删除的数据
		$info=DB::table('notice')->where('id','=',$id)->first();

		if(DB::table('notice')->where('id','=',$id)->delete()){
			return redirect('/admin/notice/index')->with('success','删除成功');
		}else{
			return back()->with('error','删除失败');
		}
	}

	public function getEdit($id){

		$notice=DB::table('notice')->where('id','=',$id)->first();

		return view('notice.edit',['notice'=>$notice]);

	}

	public function postUpdate(Request $request){
		// dd($request->all());

		$data=$request->except('_token');

		if(DB::table('notice')->where('id','=',$request->input('id'))->update($data)){

			return redirect('/admin/notice/index')->with('success','修改成功');

		}else{
			return back()->with('error','修改失败');
		}
	}

}
