<?php

namespace App\Http\Controllers\Index;

use App\Helpers\Result;
use App\Model\Article;
use App\Model\Collect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Praise;
class OperationController extends Controller
{
    //点赞
    public function praise(Request $request, $articleId)
    {
        //
        if(empty($articleId)){
            return response()->json(Result::error('1','false'));
        }

        if($request->cancel == 1){
            $praise = Praise::where('userId',session('userId'))->where('articleId',$articleId)->delete();

            $article = Article::where('id',$request->articleId)->first();
            $article->decrement('praiseNum');
            return response()->json(Result::ok('取消点赞成功'));

        }else{
            $praise = new Praise();
            $praise->userId = session('userId');
            $praise->articleId = $articleId;
            $praise->save();

            $article = Article::where('id',$articleId)->first();
            $article->increment('praiseNum');
            return response()->json(Result::ok('点赞成功'));
        }
    }

    //转发
    public function forward(Request $request){

        if(empty($request->articleId)){
            return response()->json(Result::error('1','false'));
        }

        $article = Article::where('id',$request->articleId)->first();
        $article->increment('forwardNum');
        return response()->json(Result::ok('转发成功'));
    }

    //收藏
    public function collect(Request $request, $articleId)
    {
        //
        if(empty($articleId)){
            return response()->json(Result::error('1','false'));
        }

        if($request->cancel == 1) {
            $collect = Collect::where('userId',session('userId'))->where('articleId',$articleId)->delete();
            return response()->json(Result::ok('取消收藏成功'));
        }else{
            $collect = new Collect();
            $collect->userId = session('userId');
            $collect->articleId = $articleId;
            $collect->save();
            return response()->json(Result::ok('收藏成功'));
        }


    }

}
