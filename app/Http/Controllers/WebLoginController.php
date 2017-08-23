<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\WebRegisterRequest;
class WebLoginController extends Controller
{

    public function register(){
    	//加载注册界面        
        return view('web.register');
    }

    //执行注册
    public function doregister(WebRegisterRequest $request){
    	
    	if($request->input('vcode')!=session('vcode')){
			return back()->with('error','验证码错误');
		}

		//执行数据库的插入操作
		$data=$request->only(['username','password','email']);
        $data['password']=Hash::make($data['password']);
        $data['token']=str_random(50);
        $data['status']=1;
        //插入数据库
        if($id=DB::table('users')->insertGetId($data)){
            $this->sendMail($data['email'],$id,$data['token']);
            //提示激活邮箱信息

            $title="邮箱激活";
            $notes="<h2 style='color: #8F8F8F;font-size: 20px;'>您好,账户".$request->input('email')."已注册成功,请登录邮箱完成激活</h2>";
            return view('web.notes',['notes'=>$notes,'title'=>$title]);
           
        }else{
            return back()->with('error','验证码错误');
        }
    }

    //ajax用户名验证
    public function doajax(Request $request){
         $user=DB::table('users')->where('username','=',$request->input('username'))->first();
         if($user){
            //用户存在
            echo "1";
         }else{
            //用户不存在
            echo "0";
         }
    }
    //ajax邮箱验证
    public function emailajax(Request $request){
        $user=DB::table('users')->where('email','=',$request->input('email'))->first();
          if($user){
            //用户存在
            echo "1";
         }else{
            //用户不存在
            echo "0";
         }
    }

   
    //发送邮件函数
    public function sendMail($email,$id,$token){
    	Mail::send('email.activate',['email'=>$email,'id'=>$id,'token'=>$token],function($message) use($email){
    		$message->to($email)->subject('注册成功提醒邮件');
    	});
    }

    //激活操作
    public function activate(Request $request){
    	//获取插入的数据
        $user=DB::table('users')->where('id','=',$request->input('id'))->first();
        if($request->input('token')==$user->token){
            $s['status']=2;
            if(DB::table('users')->where('id','=',$request->input('id'))->update($s)){
                 $title="激活成功";
                 $notes="<h2 style='color: #8F8F8F;font-size: 20px;'>您好,账户".$request->input('email')."已激活成功,请点击"."<a href='/web/login'>前往登录</a></h2>";
            	 return view('web.notes',['notes'=>$notes,'title'=>$title]);
            }else{
                 $title="激活失败";
                 $notes="<h2 style='color: #8F8F8F;font-size: 20px;'>您好,账户".$request->input('email')."激活失败,请重新激活</h2>";
                 return view('web.notes',['notes'=>$notes,'title'=>$title]);
            }
        }
    }
 
    //加载登录的界面
    public function login(){
        //加载模板
        return view('web.login');
    }

    //退出登录
    public function loginout(Request $request){
        $request->session()->forget('uid');
        $request->session()->forget('username');
        return back();
    }

    //执行登录
    public function dologin(Request $request){
            
        //自动验证
        $this->validate($request, [
        'username' => 'required',//用户规则
        'password' => 'required',//密码规则

        ],[
        //错误信息
        'username.required'=>'用户名不能为空',
        'password.required'=>'密码不能为空',
        ]
        );

        //获取数据
        $user = DB::table('users')
                        ->where('username', '=', $request->input('username'))
                        ->orWhere('email', '=', $request->input('username'))
                        ->first();
       
        if(!$user){
             //账户不存在
            return back()->with('error','账户不存在或密码不正确');
        }
       
        if(Hash::check($request->input('password'),$user->password)){
            //密码匹配
            //账户激活状态  1:未激活 2:激活
            if($user->status==2){
                //登录成功
                //设置session存储用户数据
                session(['uid'=>$user->id]);
                session(['username'=>$user->username]);

                //跳转到首页
                return redirect('/index');
            }else{
                return back()->with('error','请先去激活账号');
            }
            
        }else{
            //密码不匹配
            return back()->with('error','账户不存在或密码不正确');
        }
    }

    //加载找回密码页面
    public function findpass(){
        return view('web.findpass');
    }

    //发送邮件
    public function dofindpass(Request $request){

        //自动验证
        $this->validate($request, [
        'email' => 'required|email',//邮箱规则

        ],[
        //错误信息
        'email.required'=>'邮箱不能为空',
        'email.email'=>'邮箱格式不对',
        ]
        );

        $user=DB::table('users')->where('email','=',$request->input('email'))->first();
        if(!$user){
            //邮箱不存在
            return back()->with('error','该邮箱不存在,请核对后重新输入');
        }
        $this->findMail($user->email,$user->id,$user->token);
        //模板信息
        $notes= "<h2 style='color: #8F8F8F;font-size: 20px;'>找回密码邮件已经发送至".$request->input('email').",请登录邮箱找回密码</h2>"; 
        $title= "密码找回";
        return view('web.notes',['notes'=>$notes,'title'=>$title]);
    }

    //发送找回密码邮件函数
    public function findMail($email,$id,$token){
        Mail::send('email.find',['email'=>$email,'id'=>$id,'token'=>$token],function($message) use($email){
            $message->to($email)->subject('找回密码提醒邮件');
        });
    }

    //加载重置密码的模板
    public function resetpass(Request $request){
        //获取需要重置密码的数据
         $user=DB::table('users')->where('id','=',$request->input('id'))->first();
         //对比请求的token和数据库的token
         if($user && ($request->input('token')==$user->token)){
            //加载重置密码的模板
            return view('web.resetpass',['id'=>$user->id]);
         }
    }

    //执行密码重置
    public function doresetpass(Request $request){
         //自动验证
        $this->validate($request, [
        'password' => 'required',//密码规则
        'repassword' => 'required|same:password',//确认密码规则

        ],[
        //错误信息
        'password.required'=>'密码不能为空',
        'repassword.required'=>'确认密码不能为空',
        'repassword.same'=>'密码输入不一致',
        ]
        );
        //获取id
        $id=$request->input('id');
        //获取密码
        $password=$request->input('password');
        $data['password']=Hash::make($password);
        $data['token']=str_random(50);
        if(DB::table('users')->where('id','=',$id)->update($data)){
            return redirect('/web/login');
        }else{
             //模板信息
            $notes= "<h2 style='color: #8F8F8F;font-size: 20px;'>密码找回失败,请重新操作</h2>"; 
            $title= "密码找回";
            return view('web.notes',['notes'=>$notes,'title'=>$title]);
        }
    }

     public function anserpass(Request $request){

        $email=$request->uemail;
        $info=DB::table('users')->where('email','=',$email)->get();

        if($info){
        foreach ($info as $row) {
                    $uid=$row->id;  
            }

        $quest=DB::table('anserkey')->where('uid','=',$uid)->get();
        if($quest){
                $wt=['1'=>'你是猪吗?','2'=>'你是谁?','3'=>'啦啦啦!'];
                 $data=[];   
                foreach ($quest as $list) {

                       foreach($wt as $value){ 
                        $data[$list->quest]=$wt[$list->quest];
                        }

                }
                 echo json_encode($data);
            }else{
                echo json_encode(2);
            }  
                
        }else{
                echo json_encode(1);
            }


    }

    public function doanserpass(Request $request){

        // dd($request->quest);
        //自动验证
        $this->validate($request, [
        'anserkey' => 'required',//答案规则
        
        ],[
        //错误信息
        'anserkey.required'=>'答案不能为空',
        ]
        );
        $data=$request->except("_token");
        // dd($data);
        // $quest=DB::table('anserkey')->where('quest','=',$request->quest)->get();
        $anser=DB::table('anserkey')->whereQuestAndAnserkey($request->quest,$request->anserkey)->first();
        // $anser=DB::table("anserkey")->
        // dd($anser);
        if($anser){
            return view('web.resetpass',['id'=>$anser->uid]);
        }else{
            return back()->with('error','答案错误');
        }
        
    }





}
