<?php

namespace App\Http\Controllers\Index;

use App\Helpers\Result;
use App\Http\Controllers\Controller;
use App\Model\Article;

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

    public function test(){

//        $a = Article::where('userId',1)->sum('praiseNum')->sum('commentsNum')->sum('forwardNum')->get();
        $a = Article::where('userId',1)->sum('viewNum');
        dump($a);
    }
}
