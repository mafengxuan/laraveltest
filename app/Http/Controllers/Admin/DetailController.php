<?php

namespace App\Http\Controllers\admin;

use App\Helpers\Result;
use App\Helpers\Tags;
use App\Helpers\WechatMessage;
use App\Model\Article;
use App\Model\Detail;
use App\Model\UserInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailController extends Controller
{


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $detail = Detail::where('pid',$id)->where('status',3)->where('userId',session('userId'))->first();
        if(empty($detail)){
            $detail = new Detail();
        }
        $detail->userId = session('userId');
        $detail->status = $request->status;
        if(!empty($request->image)){
            foreach ($request->image as $image){
                $images[] = $image;
            }
        }
        if(!empty($request->title)){
            $detail->title = $request->title;
        }
        if(!empty($request->order)){
            $detail->order = $request->order;
        }
        $detail->pid = $id;
        $detail->image = json_encode($images);
        if(!empty($request->post('content'))){
            $detail->content = trim($request->post('content'));
        }
        $detail->save();
        return response()->json(Result::ok('添加成功'));
    }

    //驳回
    public function reject(Request $request,$id){
        $detail = Detail::find($id);
//        $userId = $detail['userId'];
        $detail->status = 2;
        $detail->remark = $request->remark;
        $detail->save();
//        $userInfo = UserInfo::find($userId);
//        WechatMessage::rejectAudit($userInfo['openId'],$userInfo['nickname'],$request->remark);
        return response()->json(Result::ok('驳回成功'));
    }

    //审核通过
    public function audit($id){

        $detail = Detail::find($id);
        $userId = $detail['userId'];
        $content = $detail['content'];
        $image = $detail['image'];
        $title = $detail['title'];
        $order = $detail['order'];
        $pid = $detail['pid'];

        if(!empty($pid)){
            $oldDetail = Detail::where('userId',$userId)->where('status',1)->where('id',$pid)->first();
            if(!empty($oldDetail)){
                $oldDetail->content = $content;
                $oldDetail->image = $image;
                $oldDetail->auditTime = date('Y-m-d H:i:s',time());
                $oldDetail->title = $title;
                $oldDetail->order = $order;
                $oldDetail->save();
                $detail->delete();
            }
        }else{
            $detail->status = 1;
            $detail->auditTime = date('Y-m-d H:i:s',time());
            $detail->save();
        }
//        $userInfo = UserInfo::find($userId);
//        WechatMessage::successAudit($userInfo['openId'], $id);
        return response()->json(Result::ok('审核通过'));
    }
}
