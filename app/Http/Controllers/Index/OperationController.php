<?php

namespace App\Http\Controllers\Index;

use App\Helpers\Result;
use App\Model\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Praise;
class OperationController extends Controller
{
    //点赞
    public function praise(Request $request)
    {
        //
        if(empty($request->articleId)){
            return response()->json(Result::error('1','false'));
        }

        $praise = new Praise();
        $praise->userId = $request->userId;
        $praise->articleId = $request->articleId;
        $praise->save();

        $article = Article::where('id',$request->articleId)->first();
        $article->increment('praiseNum');
        return response()->json(Result::ok('点赞成功'));
    }

    //转发
    public function forward(Request $request){

        if(empty($request->articleId)){
            return response()->json(Result::error('1','false'));
        }

        $article1 = Article::where('id',$request->articleId)->first();
        $article1->increment('forwardNum');
        $article2 = new Article();
        $article2->qrCode = $article1->qrCode;
        $article2->userId = $request->userId;
        $article2->image = $article1->image;
        $article2->content = '转发: '.$article1->content;
        $article2->save();
        return response()->json(Result::ok('转发成功'));
    }

    //收藏
    public function collect(Request $request)
    {
        //
        if(empty($request->articleId)){
            return response()->json(Result::error('1','false'));
        }

        $praise = new Praise();
        $praise->userId = $request->userId;
        $praise->articleId = $request->articleId;
        $praise->save();

        return response()->json(Result::ok('收藏成功'));
    }

}
