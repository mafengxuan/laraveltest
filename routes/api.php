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


Route::group(['namespace' => 'Ext'], function() {
    Route::post('/uploadImage','IndexController@uploadImage');
    Route::get('/jssdk','IndexController@jssdk');
});

//后台登陆
Route::group(['namespace' => 'Admin'], function() {
    Route::post('/loginAdmin','LoginController@login');
    Route::post('/logoutAdmin','LoginController@logout');
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


Route::group(['namespace' => 'Index', 'prefix' => 'index','middleware' => ['wechatLogin']], function(){
    Route::get('/', 'IndexController@index');
    Route::get('/test', 'IndexController@test');

    //帖子
    Route::post('/article/store', 'ArticleController@store');
    Route::post('/article/update/{id}', 'ArticleController@update');
    Route::get('/article/show/{id}', 'ArticleController@show');
    Route::get('/article/showMyArticle', 'ArticleController@showMyArticle');
    Route::get('/article/showList/{type}', 'ArticleController@showList');
    Route::get('/article/showMyDraft', 'ArticleController@showMyDraft');

    Route::get('/article/showListAsTag/{tag}', 'ArticleController@showListAsTag');

    Route::get('/article/showTags', 'ArticleController@showTags');

    //回复
    Route::post('/addReply', 'ReplyController@addReply');
    Route::get('/reply/showList/{articleId}', 'ReplyController@showList');

    //评论
    Route::post('/addComments', 'CommentController@addComments');
    Route::get('/commentsList/{articleId}', 'CommentController@showList');



    //我的消息
    Route::get('/aboutMyMsg', 'MessageController@aboutMe');


    //点赞
    Route::post('/praise/{articleId}', 'OperationController@praise');
    //转发
    Route::post('/forward', 'OperationController@forward');
    //收藏
    Route::post('/collect/{articleId}', 'OperationController@collect');
    //用户
//    Route::post('/userInfo/store', 'UserInfoController@store');
    Route::get('/userInfo/show', 'UserInfoController@show');
    Route::get('/userInfo/showTags', 'UserInfoController@showTags');
    Route::post('/userInfo/update', 'UserInfoController@update');
    Route::post('/userInfo/storeExtInfo', 'UserInfoController@storeExtInfo');

    //系统消息
    Route::get('/message/showList', 'MessageController@showList');

    //红包列表
    Route::get('/moneyList', 'MoneyController@showList');
    Route::get('/moneyRule', 'MoneyController@showRule');

    //规则
    Route::get('/rule/showAll','RuleController@showAll');


    //发现
    Route::get('/discovery/showList', 'DiscoveryController@showList');

});


Route::group(['namespace' => 'Admin', 'prefix' => 'admin','middleware' => ['adminLogin']], function(){
    // 后台的首页
//    Route::get('/', [
//        'as' => 'index', 'uses' => 'AdminController@index'
//    ]);

    //对帖子
    //审核通过上线
    Route::post('/audit/{id}','ArticleController@audit');
    //重新审核
    Route::post('/reAudit/{id}','ArticleController@reAudit');
    //驳回
    Route::post('/reject/{id}','ArticleController@reject');
    //置顶
    Route::post('/addTop/{id}','ArticleController@addTop');
    //排序
    Route::post('/orderTop/{id}','ArticleController@orderTop');
    //精品
    Route::post('/quality/{id}','ArticleController@isQuality');
    //上线
    Route::post('/online/{id}','ArticleController@isOnline');
    //查看帖子
    Route::get('/article/show/{id}','ArticleController@show');



    //对审核通过帖子可分批次发放定额红包
    Route::post('/sendMoney/{id}','MoneyController@send');
    //红包记录页
    Route::get('/moneyList/{id}','MoneyController@showList');
    Route::post('/money/store','MoneyController@store');
    //帖子列表管理
    Route::get('/articleList/{status}','ArticleController@showList');
    //评论管理
    //广告区管理
    //对用户发系统通知
    //帖子置顶功能
    Route::post('/addTop/{id}','ArticleController@addTop');
    //前10帖子排序功能；
    Route::post('/orderTop/{id}','ArticleController@orderTop');


    //获取规则
    Route::get('/rule/showAll','RuleController@showAll');
    Route::get('/rule/show/{type}','RuleController@show');
    Route::post('/rule/storeArticle', 'RuleController@storeArticle');
    Route::post('/rule/storeMoney', 'RuleController@storeMoney');
    Route::post('/rule/update/{type}', 'RuleController@update');

    //发现
    Route::get('/discovery/showList/{type}', 'DiscoveryController@showList');
    Route::post('/discovery/storeSlideShow', 'DiscoveryController@storeSlideShow');
    Route::post('/discovery/storeSlideArticle', 'DiscoveryController@storeSlideArticle');
    Route::post('/discovery/storeSlideIcon', 'DiscoveryController@storeSlideIcon');
    Route::get('/discovery/show/{id}', 'DiscoveryController@show');
    Route::post('/discovery/update/{id}', 'DiscoveryController@update');
    Route::post('/discovery/destroy/{id}', 'DiscoveryController@destroy');

    //评论
    Route::get('/commentsList/{articleId}', 'CommentController@showList');
    Route::post('/comment/{commentId}', 'CommentController@destroy');

    //回复
    Route::post('/addReply', 'ReplyController@addReply');
    Route::post('/reply/{replyId}', 'ReplyController@destroy');

});

