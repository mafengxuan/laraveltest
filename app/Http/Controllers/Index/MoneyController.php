<?php

namespace App\Http\Controllers\Index;

use App\Helpers\Result;
use App\Model\Rule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Money;

class MoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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
        $money->price =  $request->price;
        $money->status = 0;
        $money->save();
        return response()->json(Result::ok('添加成功'));
    }


    public function showRule()
    {

        $rule = Rule::where('type',2)->first();
        return response()->json(Result::ok($rule));

    }

    public function showList()
    {
        //
        $money = Money::where('userId',session('userId'))->get();
        return response()->json(Result::ok($money));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
