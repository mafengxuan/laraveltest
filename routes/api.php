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


//后台登陆
Route::group(['namespace' => 'Admin'], function() {
    Route::get('/loginAdmin','LoginController@login');
});


Route::group(['middleware' => ['wechat.oauth','wechatLogin']], function () {
    Route::get('/wechat', function () {
        $user = session('wechat.oauth_user.default'); // 拿到授权用户资料
        dump($user);
        dump(session());

        $userInfo = \App\Model\UserInfo::where('openId',session('openId'))->first();
        dump(session('openId'));
        dump($userInfo);
    });
});


Route::group(['namespace' => 'Index', 'prefix' => 'index'], function(){
    Route::get('/', 'IndexController@index');
    Route::get('/test', 'IndexController@test');

    //帖子
    Route::post('/article/store', 'ArticleController@store');
    Route::put('/article/update/{id}', 'ArticleController@update');
    Route::get('/article/show/{id}', 'ArticleController@show');
    Route::get('/article/showMyList/{userId}', 'ArticleController@showMyList');
    Route::get('/article/showList/{type}', 'ArticleController@showList');
    Route::get('/article/showDraftList/{userId}', 'ArticleController@showDraftList');

    Route::get('/article/showListAsTag/{tags}', 'ArticleController@showListAsTag');

    //回复
    Route::post('/addReply', 'ReplyController@addReply');
    Route::get('/reply/showList/{articleId}', 'ReplyController@showList');

    //评论
    Route::post('/addComments', 'CommentController@addComments');
    Route::get('/commentsList/{articleId}', 'CommentController@showList');



    //我的消息
    Route::get('/aboutMyMsg', 'MessageController@aboutMe');


    //点赞
    Route::post('/praise', 'OperationController@praise');
    //转发
    Route::post('/forward', 'OperationController@forward');

    //用户
//    Route::post('/userInfo/store', 'UserInfoController@store');
    Route::get('/userInfo/show/{openId}', 'UserInfoController@show');

    //系统消息
    Route::get('/message/showList', 'MessageController@showList');

    //红包列表
    Route::get('/moneyList/{userId}', 'MoneyController@showList');

});


Route::group(['namespace' => 'Admin', 'prefix' => 'admin','middleware' => ['adminLogin']], function(){
    // 后台的首页
//    Route::get('/', [
//        'as' => 'index', 'uses' => 'AdminController@index'
//    ]);

    //对帖子审核通过上线
    Route::post('/audit/{id}','ArticleController@audit');
    //对审核通过帖子可分批次发放定额红包
    Route::post('/sendMoney/{id}','MoneyController@send');
    //红包记录页
    Route::get('/moneyList','MoneyController@showList');
    //帖子列表管理
    Route::get('/articleList','ArticleController@showAll');
    //评论管理
    //广告区管理
    //对用户发系统通知
    //帖子置顶功能
    Route::post('/addTop/{id}','ArticleController@addTop');
    //前10帖子排序功能；
    Route::post('/orderTop/{id}','ArticleController@orderTop');

});

