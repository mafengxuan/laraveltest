<?php

namespace App\Http\Controllers\Index;

use App\Helpers\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\UserInfo;

class UserInfoController extends Controller
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
        $userInfo = new UserInfo();
        $userInfo->openId = $request->openId;
        $userInfo->nickName = $request->nickName;
        $userInfo->name = $request->name;
        $userInfo->sex = $request->sex;
        $userInfo->province = $request->province;
        $userInfo->city = $request->city;
        $userInfo->imgUrl = $request->imgUrl;
        $userInfo->mobile = $request->mobile;
        $userInfo->save();
        return response()->json(Result::ok('添加成功'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $openId
     * @return \Illuminate\Http\Response
     */
    public function show($openId)
    {
        //
        $userInfo = UserInfo::where('openId',$openId)->first();
        if(!empty($userInfo)){
            return response()->json(Result::ok($userInfo));
        }else{
            return response()->json(Result::error('1','not found'));

        }
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
