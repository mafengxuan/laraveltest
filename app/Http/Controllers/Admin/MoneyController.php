<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Money;

class MoneyController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $money = new Money();
        $money->userId = $request->userId;
        $money->articleId = $request->articleId;
        $money->price = $request->price;
        $money->status = 0;
        $money->save();
        return response()->json(Result::ok('添加红包成功'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function showList($id)
    {
        //
        $money = Money::where('articleId', $id)->orderBy('created_at','desc');
        $money = $money->get();
        return response()->json(Result::ok($money));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $money = Money::find($id);
        $money->userId = $request->userId;
        $money->articleId = $request->articleId;
        $money->price = $request->price;
        $money->status = 0;
        $money->save();
        return response()->json(Result::ok('修改红包成功'));
    }


    public function send($id){
        $money = Money::find($id);
        $money->status = 1;
        $money->save();
        return response()->json(Result::ok('发送红包成功'));
    }
}
