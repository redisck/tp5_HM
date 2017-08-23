<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
//创建路由组
Route::group(['middleware'=>'login'],
function(){
//后台
Route::get('/admin','AdminController@index');
//用户模块
Route::controller('/admin/user','UserController');
//管理员模块
Route::controller('/admin/adminlist','AdminlistController');
//无线分类模块
Route::controller('/admin/cate','CateController');
//商品模块
Route::controller('/admin/shop','ShopController');
//后台友情链接模块
Route::Controller('/admin/link','LinkController');
//后台广告管理
Route::Controller('/admin/advs','AdvsController');
//后台注销
Route::get('/admin/login/unset','LoginController@loginout');
//后台商品公告
Route::Controller('/admin/notice','NoticeController');
//图片轮播管理
Route::Controller('/admin/lunbo','LunboController');
//后台地址模块
Route::Controller('/admin/address','AddressController');
//后台订单详情
Route::Controller('/admin/orders','OrdersController');
//评论管理
Route::Controller('/admin/comment','CommentController');

});


//后台登录
Route::get('/admin/login','LoginController@login');
//执行后台登录
Route::post('/admin/login','LoginController@dologin');


//验证码
Route::get('/web/vcode','CommonController@code');
//前台注册
Route::get('/web/register','WebLoginController@register');
//执行前台注册
Route::post('/web/doregister','WebLoginController@doregister');
//前台注册用户名ajax验证
Route::get('/web/ajax','WebLoginController@doajax');
//前台注册邮箱ajax验证
Route::get('/web/emailajax','WebLoginController@emailajax');



//发送邮件
// Route::get('/web/send','WebLoginController@send');
//邮箱的激活操作
Route::get('/web/activate','WebLoginController@activate');

//前台登录
Route::get('/web/login','WebLoginController@login');
//前台退出登录
Route::get('/web/loginout','WebLoginController@loginout');
//执行前台登录
Route::post('/web/dologin','WebLoginController@dologin');
//密码找回页面
Route::get('/web/findpass','WebLoginController@findpass');
//密保找回页面
Route::get('/web/anserpass','WebLoginController@anserpass');
//执行重置密码
Route::post('/web/doanserpass','WebLoginController@doanserpass');
//执行密码找回
Route::post('/web/dofindpass','WebLoginController@dofindpass');
//重置密码
Route::get('/web/resetpass','WebLoginController@resetpass');
//执行重置密码
Route::post('/web/doresetpass','WebLoginController@doresetpass');


//前台首页
Route::get('/index','WebIndexController@index');
//执行列表页
Route::Controller('/web/list','ListController');
//前台详情页
Route::get('/web/detail/{id}','DetailController@index');

//加入购物车
Route::post('/web/carttest','WebCartController@addcart');
//加载购物车页面
Route::get('/web/cart','WebCartController@cartindex');
//删除操作
Route::get('/web/cart/del','WebCartController@del');
//加减1操作
Route::get('/web/cart/edit','WebCartController@edit');
//清空购物车
Route::get('/web/cart/clear','WebCartController@cartclear');
//删除购物车中选中的商品
Route::get('/web/cart/chkdel','WebCartController@chkdel');


//订单界面
Route::get('/web/cart/check','OrderController@check')->middleware('weblogin');

//城市级联
Route::get('/web/cart/csjl','OrderController@csjl');
//添加地址操作
Route::post('/web/address','OrderController@address');
//修改地址操作
Route::post('/web/updateaddress','OrderController@updateaddress');
//删除地址
Route::get('/web/deladdr','OrderController@deladdr');
//确认订单
Route::get('/web/createorder','OrderController@createorder');
//订单成功界面
Route::get('/web/showorder','OrderController@showorder');
//前台个人中心

//创建路由组
Route::group(['middleware'=>'weblogin'],function(){


Route::Controller('/web/pcenter','PersonalController');


});


