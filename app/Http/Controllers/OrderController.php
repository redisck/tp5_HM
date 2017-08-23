<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
   	
    //计算价格
    public function calcute($goods){
        $data=[];
    
        $row['total']=0;
        if(!empty($goods)){
            foreach($goods as $key=>$value){
                $shop=DB::table('shop')->where('id','=',$value['id'])->first();
                // var_dump($shop);
                $row['pic']=$shop->pic;
                $row['name']=$shop->name;
                $row['price']=$shop->price;
                $row['id']=$value['id'];
                $row['num']=$value['num'];
                $row['subtotal']=$row['price']*$row['num'];
                $row['total']+=$row['subtotal'];
                $data[]=$row;
            }
        }
        // dd($data);
        return $data;
                    
        }

    // 计算总价格
    public function totalcal($goods){
    
    $total=0;
    if(!empty($goods)){
        foreach($goods as $key=>$value){
            $shop=DB::table('shop')->where('id','=',$value['id'])->first();
            // var_dump($shop);
        
            $subtotal=$shop->price*$value['num'];
            $total+=$subtotal;
        }
    }
    // dd($data);
    return $total;
                
    }

        //加载订单页面
    public function check(){

    	//无线分类
        $list=WebIndexController::getcatesbypid(0);
        //商品信息
    	session(['cartgoods'=>session('cart')]);
        $goods=$this->calcute(session('cartgoods'));
        // dd($goods);
        //收货地址
        $address=$this->getaddress(session('uid'));
        // dd($address);
    	return view('web.order',['list'=>$list,'address'=>$address,'goods'=>$goods]);
       
    }

    //城市级联
    public function csjl(Request $request){
    	//获取数据
    	$data=DB::table('district')
    		->where('upid','=',$request->input('upid'))
    		->get();
    	
    	echo json_encode($data);
    }

    //添加地址
    public function address(Request $request){
        // dd($request->all());
        $data=$request->only(['linkman','code','phone']);

        //将地址查询出来
        $list=DB::table('district')
            ->whereIn('id', $request->addresslist)
            ->get();
        foreach($list as $value){
            $address[]=$value->name;
        }
        $address[]=$request->address;
        //地址
        $data['address']=implode('-',$address);
        $data['uid']=session('uid');
        //插入数据
        if(DB::table('address')->insert($data)){
            //订单界面
            return redirect('/web/cart/check');
        }else{
            //添加不成功
            return redirect('/web/cart/check');
        }
    }

    //获取地址
    public function getaddress($uid){
        $address=[];
        $address=DB::table('address')
                     ->where('uid','=',$uid)
                     ->get();

        // dd($address);
        foreach($address as $key=>$value){
            $addr=$value->address;
            //拆分地址
            $arr=explode('-',$addr);
            //去掉最后一个地址
            $address[$key]->addressfoot=array_pop($arr);
            //从数据库查出对应区号的数据
            $list=DB::table('district')
            ->whereIn('name', $arr)
            ->get();
            
            //去除重复的
            $num=count($list);
            // dd($num);
            if($num>=2){
                if($list[$num-1]->name==$list[$num-2]->name){
                    array_pop($list);
                }
            }
            
            $address[$key]->arr=$list;
            foreach($list as $key1=>$value1){
                //获取级别的所有数据
                $list1=DB::table('district')
                     ->where('upid','=',$list[$key1]->upid)
                     ->get();
                $address[$key]->arr[$key1]->level_addr=$list1;     
            }
        }
        // dd($address);
        return $address;
    }

    //修改地址
    public function updateaddress(Request $request){
        // dd($request->all());
         $data=$request->only(['linkman','code','phone']);
         //将地址查询出来
        $list=DB::table('district')
            ->whereIn('id', $request->addresslist)
            ->get();
        foreach($list as $value){
            $address[]=$value->name;
        }
        $address[]=$request->address;
        //地址
        $data['address']=implode('-',$address);
        // dd($data);
        //修改地址
        if(DB::table('address')->where('id','=',$request->input('address_id'))->update($data)){
            return redirect('/web/cart/check');
        }else{
            return back();
        }

    }

    public function deladdr(Request $request){

        if(DB::table('address')->where('id','=',$request->input('id'))->delete()){
            echo 1;
        }else{
            echo 0;
        }
        
    }
  

    //生成订单
    public function createorder(Request $request){
        // dd($request->all());
        $data=[];
        //地址id
        $data['addressid']=$request->input('addressid');
        //订单号
        $data['ordernum']=date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
        //用户id
        $data['uid']=session('uid');
        //未付款
        $data['status']=2;
        $data['addtime']=date('Y-m-d H:i:s');
        $data['total']=$this->totalcal(session('cartgoods'));

        //插入数据库操作
        $orderid=DB::table('orders')->insertGetId($data);
        if($orderid){
            //遍历session

            foreach($request->session()->get('cartgoods') as $key=>$value){
                $shop=DB::table('shop')->where('id','=',$value['id'])->first();
                $tem['orderid']=$orderid; 
                $tem['uid']=session('uid');
                $tem['goodsid']=$value['id'];
                $tem['num']=$value['num'];
                $tem['price']=$shop->price;
                $d[]=$tem;
           }

           //插入数据库操作
            if($d){
                $f=DB::table('order_info')->insert($d);
                if($f){
                    //下单成功
                    $request->session()->forget('cartgoods');
                    $request->session()->forget('cart');
                   
                    //跳转到订单生成页面
                    return redirect('/web/showorder?order='.$data['ordernum']);
                }else{
                    return redirect('/web/cart/check');
                }
            }


        }
        // dd($data);

    }

    //加载订单生成页面
    public function showorder(Request $request){
        // dd($request->all());
        //无线分类
        $list=WebIndexController::getcatesbypid(0);
        return view('web.ordernum',['order'=>$request->input('order'),'list'=>$list]);
    }
}
