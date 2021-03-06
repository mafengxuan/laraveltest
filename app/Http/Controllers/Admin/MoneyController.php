<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Result;
use App\Helpers\WechatMessage;
use App\Model\UserInfo;
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
        $userInfo = UserInfo::find($request->userId);
        WechatMessage::sendMoney($userInfo['openId'],$userInfo['nickname'],$request->price);
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

    public function showAllList(Request $request)
    {
        //

        $money = Money::with('user')->with('article');
        if(!empty($request->nickname)){
            $money = $money->where('nickname',$request->nickname);
        }
        if(!empty($request->sDate) && !empty($request->eDate)){
            $money = $money->where('created_at','>=',$request->sDate)->where('created_at','<=',$request->eDate);
        }
        if(!empty($request->status)){
            $money = $money->where('status',$request->status);
        }
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
        $price = $money['price'];
        $userId = $money['userId'];
        $money->status = 1;
        $money->save();

        $userInfo = UserInfo::find($userId);
        WechatMessage::sendMoney($userInfo['openId'],$userInfo['nickname'],$price);
        return response()->json(Result::ok('发送红包成功'));
    }
}
