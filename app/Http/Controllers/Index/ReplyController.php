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
    public function addComments(Request $request)
    {
        //
        $reply = new Reply();
        $reply->articleId = $request->articleId;
        $reply->content = $request->post('content');
        if(!empty($request->pid)){
            $reply->pid = $request->pid;
        }
        if(!empty($request->rid)){
            $reply->rid = $request->rid;
        }
        $reply->save();
        if(empty($request->pid)){
            Article::where('id', $request->articleId)->increment('commentsNum');
        }
        return response()->json(Result::ok('评论成功'));
    }

    public function addReply(Request $request){
        $reply = new Reply();
        $reply->articleId = $request->articleId;
        $reply->content = $request->post('content');
        $reply->pid = $request->pid;
        if(!empty($request->rid)){
            $reply->rid = $request->rid;
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
