<?php

namespace App\Http\Controllers\Index;

use App\Helpers\Result;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//        $res = DB::table("admin")->get();
//        dump($res);
        phpinfo();
        return response()->json(Result::ok());
    }

    public function wechat(){

        $app = app('wechat.official_account');
        $app->server->push(function($message){
            return "欢迎关注！";
        });

        return $app->server->serve();
    }
}
