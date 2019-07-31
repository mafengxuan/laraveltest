<?php

namespace App\Http\Controllers\Index;

use App\Helpers\Result;
use App\Model\Article;
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
    public function addReply(Request $request){
        $reply = new Reply();
        $reply->commentId = $request->commentId;
        $reply->reUserId = $request->reUserId;
        $reply->reNickname = $request->reNickname;
        $reply->userId = session('userId');
        $reply->nickname = session('nickname');

        $reply->content = $request->post('content');
        if(!empty($request->reUserId) && !empty($request->reNickname)){
            $reply->content = '回复 '.$request->reNickname.' '.$request->post('content');
        }

        $reply->save();

        return response()->json(Result::ok('回复成功'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $articleId
     * @return \Illuminate\Http\Response
     */
    public function showList($articleId)
    {
        //
        $reply = Reply::where('articledId',$articleId)->orderBy('created_at','asc')->get();
        return response()->json(Result::ok($reply));
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
