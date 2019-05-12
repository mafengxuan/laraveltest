<?php

namespace App\Http\Controllers\Index;

use App\Helpers\Result;
use App\Http\Controllers\Controller;
use App\Model\Index;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return response()->json(Result::ok());
    }
}
