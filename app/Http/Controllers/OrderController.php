<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
   	
    //����۸�
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

    // �����ܼ۸�
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

        //���ض���ҳ��
    public function check(){

    	//���߷���
        $list=WebIndexController::getcatesbypid(0);
        //��Ʒ��Ϣ
    	session(['cartgoods'=>session('cart')]);
        $goods=$this->calcute(session('cartgoods'));
        // dd($goods);
        //�ջ���ַ
        $address=$this->getaddress(session('uid'));
        // dd($address);
    	return view('web.order',['list'=>$list,'address'=>$address,'goods'=>$goods]);
       
    }

    //���м���
    public function csjl(Request $request){
    	//��ȡ����
    	$data=DB::table('district')
    		->where('upid','=',$request->input('upid'))
    		->get();
    	
    	echo json_encode($data);
    }

    //��ӵ�ַ
    public function address(Request $request){
        // dd($request->all());
        $data=$request->only(['linkman','code','phone']);

        //����ַ��ѯ����
        $list=DB::table('district')
            ->whereIn('id', $request->addresslist)
            ->get();
        foreach($list as $value){
            $address[]=$value->name;
        }
        $address[]=$request->address;
        //��ַ
        $data['address']=implode('-',$address);
        $data['uid']=session('uid');
        //��������
        if(DB::table('address')->insert($data)){
            //��������
            return redirect('/web/cart/check');
        }else{
            //��Ӳ��ɹ�
            return redirect('/web/cart/check');
        }
    }

    //��ȡ��ַ
    public function getaddress($uid){
        $address=[];
        $address=DB::table('address')
                     ->where('uid','=',$uid)
                     ->get();

        // dd($address);
        foreach($address as $key=>$value){
            $addr=$value->address;
            //��ֵ�ַ
            $arr=explode('-',$addr);
            //ȥ�����һ����ַ
            $address[$key]->addressfoot=array_pop($arr);
            //�����ݿ�����Ӧ���ŵ�����
            $list=DB::table('district')
            ->whereIn('name', $arr)
            ->get();
            
            //ȥ���ظ���
            $num=count($list);
            // dd($num);
            if($num>=2){
                if($list[$num-1]->name==$list[$num-2]->name){
                    array_pop($list);
                }
            }
            
            $address[$key]->arr=$list;
            foreach($list as $key1=>$value1){
                //��ȡ�������������
                $list1=DB::table('district')
                     ->where('upid','=',$list[$key1]->upid)
                     ->get();
                $address[$key]->arr[$key1]->level_addr=$list1;     
            }
        }
        // dd($address);
        return $address;
    }

    //�޸ĵ�ַ
    public function updateaddress(Request $request){
        // dd($request->all());
         $data=$request->only(['linkman','code','phone']);
         //����ַ��ѯ����
        $list=DB::table('district')
            ->whereIn('id', $request->addresslist)
            ->get();
        foreach($list as $value){
            $address[]=$value->name;
        }
        $address[]=$request->address;
        //��ַ
        $data['address']=implode('-',$address);
        // dd($data);
        //�޸ĵ�ַ
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
  

    //���ɶ���
    public function createorder(Request $request){
        // dd($request->all());
        $data=[];
        //��ַid
        $data['addressid']=$request->input('addressid');
        //������
        $data['ordernum']=date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);
        //�û�id
        $data['uid']=session('uid');
        //δ����
        $data['status']=2;
        $data['addtime']=date('Y-m-d H:i:s');
        $data['total']=$this->totalcal(session('cartgoods'));

        //�������ݿ����
        $orderid=DB::table('orders')->insertGetId($data);
        if($orderid){
            //����session

            foreach($request->session()->get('cartgoods') as $key=>$value){
                $shop=DB::table('shop')->where('id','=',$value['id'])->first();
                $tem['orderid']=$orderid; 
                $tem['uid']=session('uid');
                $tem['goodsid']=$value['id'];
                $tem['num']=$value['num'];
                $tem['price']=$shop->price;
                $d[]=$tem;
           }

           //�������ݿ����
            if($d){
                $f=DB::table('order_info')->insert($d);
                if($f){
                    //�µ��ɹ�
                    $request->session()->forget('cartgoods');
                    $request->session()->forget('cart');
                   
                    //��ת����������ҳ��
                    return redirect('/web/showorder?order='.$data['ordernum']);
                }else{
                    return redirect('/web/cart/check');
                }
            }


        }
        // dd($data);

    }

    //���ض�������ҳ��
    public function showorder(Request $request){
        // dd($request->all());
        //���߷���
        $list=WebIndexController::getcatesbypid(0);
        return view('web.ordernum',['order'=>$request->input('order'),'list'=>$list]);
    }
}
