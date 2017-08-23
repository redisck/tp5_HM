<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;
use Hash;
use DB;
use Config;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PersonalController extends Controller
{

//订单处理
 	public function getIndex(Request $request){

 		    $id=session('uid');

        $status=$request->status;

        $status_list=['1'=>'未付款','2'=>'已付款 未发货','3'=>'已发货','4'=>'确认收货'];

        //取出这个人所有的订单
        $order=DB::table('orders')->where('uid','=',$id)->where('status','like',"%{$status}%")->get();
       
       if($order!=null){
        foreach($order as $key=>$value){
                // dd($value);
            $shop[]=DB::table('order_info')->where('orderid','=',$value->id)
                    ->join('shop','shop.id','=','order_info.goodsid')
                    ->select(DB::raw('*,order_info.id as oid,order_info.num as num,shop.pic as spic,shop.name as sname,shop.price as sprice,shop.oldprice as oprice'))->get();
                    // dd($shop);
             foreach ($shop as $k1 => $v1){
                    // dd($v1);
                        foreach($v1 as $k2=>$v2){
                         $shop[$k1][$k2]->ordernum=$order[$k1]->ordernum;
                         $shop[$k1][$k2]->ortotal=$order[$k1]->total;
                         $shop[$k1][$k2]->orstatus=$order[$k1]->status;
                         $shop[$k1][$k2]->oaddtime=$order[$k1]->addtime;

                       }         
                    }                  
                }
          }else{
            $shop=[];
          } 
             // dd($ordernum);
            // dd($shop);  
 		     return view('pcenter.order',['order'=>$shop,'statuslist'=>$status_list,'request'=>$request->all()]);
        // }
 	}
    //删除订单
    public function getOrderdel(Request $request){
       
       $data=$request->input('orderid');
       
       $mm=DB::table('orders')->where('status','=',4)->whereIn('id',$data)->get();

       $did=[];
       foreach($mm as $status){
          $did[]=$status->id;
        }
       
       if($did){
           $mm=DB::table('orders')->whereIn('id',$did)->delete();
           $info=DB::table('order_info')->whereIn('orderid',$did)->delete();
           if($mm && $info){
            echo "1";
           }else{
            echo "2";
             }
       }else{
            echo "3";
       }
    }

    //点击确认收货
    public function getConfirm(Request $request){

        // $id=session('uid');
        $orderid=$request->orderid;
        $data['status']=4;

        if(DB::table('orders')->where('id','=',$orderid)->update($data)){
                echo "去评论哦!";
        }

    }

//评论
    public function getPingjia(Request $request){
        // dd($request->goodsid);

        return view('pcenter.pingjia',['goodsid'=>$request->goodsid]);

    }


    // 执行添加
    public function postDopingjia(Request $request){
       // dd($request->all()); 
        $id=session('uid');
        $data['uname'] = DB::table('users')->where('id',$id)->pluck('username');
        $data['content']=$request->content;
        $data['status']=$request->type;
        $data['shopid']=$request->shop;

      //无线分类
      $list=WebIndexController::getcatesbypid(0);
        if($data['content'] && $data['uname']){
             $id=DB::table('comment')->insertGetId($data);
             $title="评价成功！";
             $contens="请查看个人订单";
             $link="/web/pcenter/index";
             return view('web.systeminfo',['title'=>$title,'contens'=>$contens,'link'=>$link,'list'=>$list]);

        }else{
               return back()->with("error",'写点东西喽!'); 
        }

    }

//收货地址
    public function getAddress(){

        //登录后 会有session 从session中取出id
        $uid=session('uid');
                
         $address=DB::table('address')->where('uid','=',$uid)->get();

         // dd($address);              
         return view('pcenter.address',['address'=>$address]);
    }

    //删除收货地址
    public function getDeladdress($id){

           if(DB::table('address')->where('id','=',$id)->delete()){

                $title="您的地址已经成功删除！";
                $contens="请去个人中心查看";
                return redirect('/web/systeminfo');
           }else{
                $title="您的地址删除失败！";
                $contens="请重新操作";
                return redirect('/web/systeminfo');
           }

    }


//信息管理
//基本信息
 	public function getUserinfo(){

 		$id=session('uid');
 		if($id){

 		$info=DB::table('users')->where('id','=',$id)->first();

 		$wm=array('1'=>'男','2'=>'女');
 		return view('pcenter.userinfo',['info'=>$info,'mw'=>$wm]);
 		}else{
 			return redirect('/web/pcenter/index');
 		}

 	}

 	//检测修改的名称是否有重复
 	public function getCheckname(Request $request){

 		// var_dump($s);
 		 $name=$request->only('uname');
 		 $s=DB::table('users')->where('name','=',$name)->first();

 		 if($s){
 		 	echo "1";
 		 }else{
 		 	echo "2";
 		 }
 	}

    //修改
 	public function postEdit(Request $request){
      $id=$request->input('uid');
 			//获取request中的值
 			$data=$request->except('_token','uid');
 			
 			$data['token']=str_random(50);

      //无线分类
      $list=WebIndexController::getcatesbypid(0);


 			// 执行修改
 			if(DB::table('users')->where('id','=',$id)->update($data)){

 				$title="您的个人资料已经成功修改！";
 				$contens="查看个人信息";
        $link="/web/pcenter/userinfo";
 				return view('web.systeminfo',['title'=>$title,'contens'=>$contens,'link'=>$link,'list'=>$list]);
 			}else{

 				$title="!!!!哎呀 修改失败";
 				$contens="请重新修改";
        $link="/web/pcenter/userinfo";
 				return view('web.systeminfo',['title'=>$title,'contens'=>$contens,'link'=>$link,'list'=>$list]);
 			}		
 			
 	}

 
 //检测修改的邮件是否有重复
 	public function getCheckmail(Request $request){

 		 $email=$request->only("umail");
 		 $s=DB::table('users')->where('email','=',$email)->first();
 		// var_dump($s);
 		 if($s){
 		 	echo "1";
 		 }else{
 		 	echo "2";
 		 }
 	}
 	public function getEditmail(Request $request){
 	
 		$email=$request->useremail;
 		$number=rand(10000,99999);
 		$this->Updatemail($email,$number);
 		echo $number;
 	}

 	  //发送找回密码邮件函数
    public function Updatemail($email,$number){
    		
        Mail::send('email.edit',['email'=>$email,'num'=>$number],function($message) use($email){
            $message->to($email)->subject('发发网修改邮箱邮件');
        });

    }

    public function getDocheck(Request $request){

 		 $id=session('uid');
 		 // var_dump($data);
 	 
 		 $s=DB::table('users')->where('id','=',$id)->update($request->only("email"));
 		 if($s){
 		 	echo "1";
 		 }else{
 		 	echo "2";
 		 }

    }

//设置密保
    public function postQuest(Request $request){
        $this->validate($request,[
            'anserkey'=>"required",
            ],[
            "anserkey.required"=>"答案不能为空",
            ]);
        $data=$request->except('_token');

            //应该获取登录session中的id值
            $id=session('uid');
            $data['uid']=$id;
            $nu=DB::table("anserkey")->where('uid','=',$id)->count();
            if($nu>=3){
              $title="密保设置过多;";
              $contens="返回个人信息";
              $list=WebIndexController::getcatesbypid(0);
             $link="/web/pcenter/userinfo";
           return view('web.systeminfo',['title'=>$title,'contens'=>$contens,'link'=>$link,'list'=>$list]);
            }


            // dd($data

        if(DB::table('anserkey')->where("id",'=',$id)->insert($data)){

          $title="密保设置成功;";
             $contens="返回个人信息";
             $link="/web/pcenter/userinfo";
               //无线分类
           $list=WebIndexController::getcatesbypid(0);
           return view('web.systeminfo',['title'=>$title,'contens'=>$contens,'link'=>$link,'list'=>$list]);

        }else{
            $title="密保设置失败;";
             $contens="请重新操作";
             $link="/web/pcenter/userinfo";
               //无线分类
            $list=WebIndexController::getcatesbypid(0);
           return view('web.systeminfo',['title'=>$title,'contens'=>$contens,'link'=>$link,'list'=>$list]);
        };
    }

    public function getCheckpass(Request $request){

            //应该获取登录session中的id值
        $id=session('uid');

         $user=DB::table('users')->where('id','=',$id)->first();
         
          if(Hash::check($request->input('oldpasswd'),$user->password)){
                echo "1";
          }else{
            echo "2";
          }
         
    }



//执行密码修改
    public function postDoeditpass(Request $request){
         //自动验证
        $this->validate($request,[
        'passwd' => 'required',//密码规则
        'npasswd' => 'required|same:passwd',//确认密码规则

        ],[
        //错误信息
        'passwd.required'=>'密码不能为空',
        'npasswd.required'=>'确认密码不能为空',
        'npasswd.same'=>'密码输入不一致'   ,
        ]
        );

//应该获取登录session中的id值
        $id=session('uid');
        //获取密码
        $npasswd=$request->input('npasswd');
        $data['password']=Hash::make($npasswd);
        $data['token']=str_random(50);

        $list=WebIndexController::getcatesbypid(0);

        if(DB::table('users')->where('id','=',$id)->update($data)){
             $title="密码找回成功,请重新登录;";
             $contens="登录";
             $link="/web/login";
            return view('web.systeminfo',['title'=>$title,'contens'=>$contens,'link'=>$link,'list'=>$list]);

        }else{
             //模板信息
            $title="密码找回失败,请重新操作;";
            $contens="查看个人信息";
            $link="/web/pcenter/userinfo";
            return view('web.systeminfo',['title'=>$title,'contens'=>$contens,'link'=>$link,'list'=>$list]);
        }
    }






}
