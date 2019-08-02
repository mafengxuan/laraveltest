<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Reply;

class ReplyController extends Controller
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
    }

    public function addReply(Request $request){
        $reply = new Reply();
        $reply->commentId = $request->commentId;
        $reply->content = $request->post('content');
        $reply->reUserId = $request->reUserId;
        $reply->reNickname = $request->reNickname;
        $reply->reId = $request->reId;
        $reply->userId = 1;
        $reply->nickname = '官方回复';
        $reply->save();
        return response()->json(Result::ok('回复成功'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $reply = Reply::destroy($id);
        return response()->json(Result::ok('删除成功'));
    }
}
