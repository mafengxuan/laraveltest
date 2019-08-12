<?php

namespace App\Http\Controllers\Index;

use App\Helpers\Result;
use App\Helpers\WechatMessage;
use App\Model\Article;
use App\Model\Comment;
use App\Model\UserInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Reply;

class CommentController extends Controller
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
        $content = $request->post('content');
        $nickname = session('nickname');
        $comment = new Comment();
        $comment->articleId = $request->articleId;
        $comment->userId = session('userId');
        $comment->content = $request->post('content');
        $comment->save();

        Article::where('id', $request->articleId)->increment('commentsNum');
        $article = Article::with('user')->find($request->articleId);
        $openId = $article['user']['openId'];
        WechatMessage::comment($openId,$nickname,$content);
        return response()->json(Result::ok('评论成功'));
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
        $reply = Comment::where('articleId',$articleId)->orderBy('created_at','desc')->with('reply')->with('user')->get();
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
