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
});


//后台路由组 控制器在 "App\Http\Controllers\Admin" 命名空间下
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function(){
    // 后台的首页
    Route::get('/', [
        'as' => 'index', 'uses' => 'AdminController@index'
    ]);

});