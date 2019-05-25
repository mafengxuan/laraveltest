<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Result;
use App\Model\Article;
use App\Model\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Reply;

class CommentController extends Controller
{


    /**
     * Display the specified resource.
     *
     * @param  int  $articleId
     * @return \Illuminate\Http\Response
     */
    public function showList($articleId)
    {
        //
        $reply = Comment::where('articleId',$articleId)->orderBy('created_at','desc')->with('reply')->get();
        return response()->json(Result::ok($reply));
    }

    public function destroy($commentId){
        $comment = Comment::destroy($commentId);
        return response()->json(Result::ok('删除成功'));

    }

}
