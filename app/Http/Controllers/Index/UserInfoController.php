<?php

namespace App\Http\Controllers\Index;

use App\Helpers\Result;
use App\Helpers\Tags;
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
        $userInfo->nickname = $request->nickname;
        $userInfo->name = $request->name;
        $userInfo->sex = $request->sex;
        $userInfo->province = $request->province;
        $userInfo->city = $request->city;
        $userInfo->imgUrl = $request->imgUrl;
        $userInfo->mobile = $request->mobile;
        $userInfo->save();
        return response()->json(Result::ok('添加成功'));
    }

    public function storeExtInfo(Request $request){
        $userInfo = UserInfo::find(session('userId'));
        $userInfo->mobile = $request->mobile;
        $userInfo->doctor = $request->doctor;
        $userInfo->name = $request->name;
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
        $userInfo = UserInfo::with('article')->find(session('userId'));
        if(!empty($userInfo)){
            return response()->json(Result::ok($userInfo));
        }else{
            return response()->json(Result::error('1','not found'));

        }
    }


    public function showMyArticle()
    {
        $result = Article::where('userId',session('userId'))->orderBy('created_at','desc')->with('user')->first();
        if(empty($result)){
            $result['user'] = UserInfo::first(session('userId'));
        }
        return response()->json(Result::ok($result));
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
    public function update(Request $request)
    {
        //
        $userInfo = UserInfo::find(session('userId'));

        if(!empty($request->sex)){
            $userInfo->mobile = $request->mobile;
        }
        $array = array();
        $tag_remark = array();
        if(!empty($request->sex)){
            $userInfo->sex = $request->sex;
            $array[] = $request->sex;
            $tag_remark[] = $request->sex;
        }
        if(!empty($request->age)){
            $userInfo->age = $request->age;
            $array[] = $request->age;
            $tag_remark[] = Tags::ageRemark($request->age);
        }
        if(!empty($request->correct_time)){
            $userInfo->correct_time = $request->correct_time;
            $array[] = $request->correct_time;
            $tag_remark[] = Tags::monthRemark($request->correct_time);
        }
        if(!empty($request->tooth_socket)){
            $userInfo->tooth_socket = $request->tooth_socket;
            $array[] = $request->tooth_socket;
            $tag_remark[] = $request->tooth_socket;
        }
        if(!empty($request->tooth_question)){
            $userInfo->tooth_question = $request->tooth_question;
            $array[] = $request->tooth_question;
            $tag_remark[] = $request->tooth_question;
        }

        $tags = implode(',',$array);
        $userInfo->tag = $tags;
        $tag_remarks = implode(',',$tag_remark);
        $userInfo->tag_remark = $tag_remarks;

        if(!empty($request->post('content'))){
            $userInfo->content = $request->post('content');
        }
        $userInfo->save();
        return response()->json(Result::ok('修改成功'));

    }

    public function showTags(){

        $data = \App\Helpers\Tags::$userInfoTags;
        return response()->json(Result::ok($data));

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


    public function checkStore()
    {
        $userId = session('userId');
        $userInfo = UserInfo::find($userId);
        if(empty($userInfo)){
            return response()->json(Result::error(1,'用户信息未查到'));
        }
        if(empty($userInfo['age']) || empty($userInfo['correct_time']) || empty($userInfo['tooth_socket']) || empty($userInfo['tooth_question'])  || empty($userInfo['content'])){
            return response()->json(Result::error(2,'请完善个人资料'));
        }
        return response()->json(Result::ok());
    }
}
