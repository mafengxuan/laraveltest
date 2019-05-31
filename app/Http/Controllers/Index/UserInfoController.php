<?php

namespace App\Http\Controllers\Index;

use App\Helpers\Result;
use App\Model\Article;
use App\User;
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
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $userInfo = UserInfo::find(session('userId'));
        //年龄 牙套类型 矫正时间 牙齿问题 个人简介 转发 评论 点赞

        if(!empty($userInfo)){
            $timeDiff = time() - strtotime($userInfo['updated_at']);
            if($timeDiff > 3600){
                $praiseNum = Article::where('userId',$userInfo['userId'])->sum('praiseNum');
                $commentsNum = Article::where('userId',$userInfo['userId'])->sum('commentsNum');
                $forwardNum = Article::where('userId',$userInfo['userId'])->sum('forwardNum');
                $userInfoUpdate = new UserInfo();
                $userInfoUpdate->praiseNum = $praiseNum;
                $userInfoUpdate->commentsNum = $commentsNum;
                $userInfoUpdate->forwardNum = $forwardNum;
                $userInfoUpdate->save();
            }
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
        $userInfo = UserInfo::find($id);
        $userInfo->mobile = $request->mobile;
        $userInfo->sex = $request->sex;
        $userInfo->age = $request->age;
        $userInfo->correctTime = $request->correctTime;
        $userInfo->tooth_socket = $request->tooth_socket;
        $userInfo->tooth_question = $request->tooth_question;
        $userInfo->content = $request->post('content');
        $userInfo->save();
        return response()->json(Result::ok('修改成功'));

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
