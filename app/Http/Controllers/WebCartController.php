<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class WebCartController extends Controller
{
    
    //加入购物车
    public function addcart(Request $request){
    	//获取商品id和购买数量
    	$data=$request->only(['id','num']);
    	//判断购物车中是否有相同商品
    	if(!$this->checkExists($data['id'])){
    		$request->session()->push('cart',$data);
		}else{
			$goods=session('cart');
			//遍历
	    	foreach($goods as $key=>$value){
	    		if($value['id']==$data['id']){
	    			// return true;
	    			$goods[$key]['num']+=$data['num'];
	    			// dd($goods);
    				session(['cart'=>$goods]);
    				// dd(session('cart'));
	    		}
	    	}
		}
    	
    	return redirect('/web/cart');
    }

    //购物车session
    public function cartses(){
    	$data=[];
    	$goods=session('cart');
    	// dd($s);
    	$row['total']=0;
    	$row['oldtotal']=0;
    	$row['more']=0;
    	$row['percenta']=0;
    	if(!empty($goods)){
    		foreach($goods as $key=>$value){
    			$shop=DB::table('shop')->where('id','=',$value['id'])->first();
    			// var_dump($shop);
    			$row['pic']=$shop->pic;
    			$row['name']=$shop->name;
    			$row['price']=$shop->price;
    			$row['oldprice']=$shop->oldprice;
    			$row['id']=$value['id'];
    			$row['num']=$value['num'];
    			$row['subtotal']=$row['price']*$row['num'];
    			$row['oldsubtotal']=$row['oldprice']*$row['num'];
    			$row['total']+=$row['subtotal'];
    			$row['oldtotal']+=$row['oldsubtotal'];
    			$row['more']=$row['oldtotal']-$row['total'];
    			$row['percenta']=$row['more']/$row['total']*100;
    			$row['percent']=round($row['percenta'],2);
    			$data[]=$row;
    		}
    	}
    	return $data;
    }

    //购物车
    public function cartindex(){
        //购物车信息
    	$data=$this->cartses();
        //无线分类
        $list=WebIndexController::getcatesbypid(0);
    	return view('web.cart',['cart'=>$data,'list'=>$list]);
    }

    //清除session操作
    public function clear(Request $request){
    	$request->session()->flush();
    }

    //去重操作
    public function checkExists($id){
    	//获取session数据
    	$goods=session('cart');
    	if(empty($goods)){
    		return false;
    	}
    	//遍历
    	foreach($goods as $key=>$value){
    		if($value['id']==$id){
    			return true;
    		}
    	}
    	return false;
    }

    //删除
    public function del(Request $request){
    	 //获取需要删除的数据id
        $id=$request->input('id');
        //获取session数据
        $goods=session('cart');
        //遍历session数据
        foreach($goods as $key=>$value){
            if($value['id']==$id){
                // echo "sss";
                $request->session()->forget('cart.'.$key);
            }
        }
        $row=[];
        $good=session('cart');
        // dd($s);
        $row['total']=0;
        $row['oldtotal']=0;
        $row['more']=0;
        $row['percenta']=0;
        if(!empty($good)){
            foreach($good as $key=>$value){
                $shop=DB::table('shop')->where('id','=',$value['id'])->first();
                // var_dump($shop);
                $row['price']=$shop->price;
                $row['oldprice']=$shop->oldprice;
                $row['num']=$value['num'];
                $row['subtotal']=$row['price']*$row['num'];
                $row['oldsubtotal']=$row['oldprice']*$row['num'];
                $row['total']+=$row['subtotal'];
                $row['oldtotal']+=$row['oldsubtotal'];
                $row['more']=$row['oldtotal']-$row['total'];
                $row['percenta']=$row['more']/$row['total']*100;
                $row['percent']=round($row['percenta'],2);  
            }
        }
        echo json_encode($row);
    }


    public function row($id){
    	$row=[];
    	$good=session('cart');
    	// dd($s);
    	$row['total']=0;
    	$row['oldtotal']=0;
    	$row['more']=0;
    	$row['percenta']=0;

    	if(!empty($good)){
    		foreach($good as $key=>$value){
    			$shop=DB::table('shop')->where('id','=',$value['id'])->first();
    			
    			if($id==$value['id']){
    				$row['num']=$value['num'];
    				$row['subtotal']=$shop->price*$row['num'];
    			}
    			$subtotal=$shop->price*$value['num'];
    			$row['oldsubtotal']=$shop->oldprice*$value['num'];
    			$row['total']+=$subtotal;
    			$row['oldtotal']+=$row['oldsubtotal'];
    			$row['more']=$row['oldtotal']-$row['total'];
    			$row['percenta']=$row['more']/$row['total']*100;
    			$row['percent']=round($row['percenta'],2);	
    		}
    	}
    	return $row;
    }

    //加减操作
    public function edit(Request $request){
    	//获取操作的商品id和操作,a=1或-1

    	$data=$request->only(['id','a']);

    	// dd($data);
    	//获取session数据
    	$goods=session('cart');
    
    	//遍历
		foreach($goods as $key=>$value){
			$shop=DB::table('shop')->where('id','=',$value['id'])->first();
			//执行加减1
			if($value['id']==$data['id']){
				$goods[$key]['num']+=$data['a'];
			}
			//最小=1
			if($goods[$key]['num']<1){
				$goods[$key]['num']=1;
			}
			//最大=库存
			if($goods[$key]['num']>$shop->store){
				$goods[$key]['num']=$shop->store;
			}
			//修改后的给session
    		session(['cart'=>$goods]);
		}
		//计算

		$row=$this->row($request->input('id'));
		echo json_encode($row);
	
    }

    //清空购物车
    public function cartclear(Request $request){
    	$request->session('cart')->flush();
    	//无线分类
        $list=WebIndexController::getcatesbypid(0);
    	return view('web.cart',['cart'=>'','list'=>$list]);
    }

    //Ajax删除购物车中选中的商品
    public function chkdel(Request $request){
    	$data=[];
    	//获取请求参数
    	$chkid=$request->input('chkid');
    	// var_dump($chkid);
    	//获取session数据
    	$goods=session('cart');
    	//遍历session数据
    	foreach($goods as $key=>$value){
    		foreach($chkid as $keya=>$valuea){
    			if($value['id']==$valuea){
    				// echo "sss";
    				$request->session()->forget('cart.'.$key);
    			}
    		}
    	}

    	$row=[];
    	$good=session('cart');
    	// dd($s);
    	$row['total']=0;
    	$row['oldtotal']=0;
    	$row['more']=0;
    	$row['percenta']=0;
    	if(!empty($good)){
    		foreach($good as $key=>$value){
    			$shop=DB::table('shop')->where('id','=',$value['id'])->first();
    			// var_dump($shop);
    			$row['price']=$shop->price;
    			$row['oldprice']=$shop->oldprice;
    			$row['num']=$value['num'];
    			$row['subtotal']=$row['price']*$row['num'];
    			$row['oldsubtotal']=$row['oldprice']*$row['num'];
    			$row['total']+=$row['subtotal'];
    			$row['oldtotal']+=$row['oldsubtotal'];
    			$row['more']=$row['oldtotal']-$row['total'];
    			$row['percenta']=$row['more']/$row['total']*100;
    			$row['percent']=round($row['percenta'],2);	
    		}
    	}
  			
    	echo json_encode($row);
    }


}
