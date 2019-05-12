<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['namespace' => 'Index', 'prefix' => 'index'], function(){
    Route::get('/', 'IndexController@index');

    //帖子
    Route::post('/article/store', 'ArticleController@store');
    Route::put('/article/update/{id}', 'ArticleController@update');
    Route::get('/article/show/{id}', 'ArticleController@show');
    Route::get('/article/showList/{userId}', 'ArticleController@showList');
    Route::get('/article/showDraftList/{userId}', 'ArticleController@showDraftList');

    //回复

    //点赞
    Route::post('/praise', 'OperationController@praise');
    //转发
    Route::post('/forward', 'OperationController@forward');


    //用户
    Route::post('/userInfo/store', 'UserInfoController@store');
    Route::get('/userInfo/show/{openId}', 'UserInfoController@show');

    //系统消息
    Route::get('/message/showList', 'MessageController@showList');

    //红包列表
    Route::get('/moneyList/{userId}', 'MoneyController@showList');

});


Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function(){
    // 后台的首页
    Route::get('/', [
        'as' => 'index', 'uses' => 'AdminController@index'
    ]);

    //对帖子审核通过上线
    //对审核通过帖子可分批次发放定额红包
    //红包记录页
    //帖子列表管理
    //评论管理
    //广告区管理
    //对用户发系统通知
    //帖子置顶功能
    //前10帖子排序功能；
});