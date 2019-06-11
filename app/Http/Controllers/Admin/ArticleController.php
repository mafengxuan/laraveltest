<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Article;

class ArticleController extends Controller
{


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $article = Article::with('user')->find($id);
        return response()->json(Result::ok($article));
    }

    public function showList(Request $request, $status)
    {
        //
        $article = Article::with('user')->where('status',$status);
        dump($request->nickName);die;

        if(!empty($request->nickName)){

            $article = $article->whereHas('nickName',function($query,$request){
                $query->where('nickName', '=', $request->nickName);
            });
        }
        if(!empty($request->sDate) && !empty($request->eDate)){
            $article = $article->where('created_at','>=',$request->sDate)->where('created_at','<=',$request->eDate);
        }
        $article = $article->orderBy('created_at','desc')->get();
        return response()->json(Result::ok($article));
    }

    public function showDraftList(Request $request)
    {
        //
        $article = Article::where('userId',$request->userId)->where('status',0)->get();
        return response()->json(Result::ok($article));
    }

    public function showAll(){
        $article = Article::where('status',1)->orderBy('isTop','desc')->orderBy('order','desc')->orderBy('created_at','desc')->get();
        return response()->json(Result::ok($article));
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
        $article = Article::destroy($id);
        return response()->json(Result::ok('删除成功'));
    }

    //审核通过
    public function audit($id){

        $article = Article::find($id);
        $article->status = 1;
        $article->auditTime = date('Y-m-d H:i:s',time());
        $article->save();
        return response()->json(Result::ok('审核通过'));
    }

    public function addTop($id){
        $count = Article::where('isTop',1)->count();
        if($count>=10){
            return response()->json(Result::error('1','置顶失败,已经达到最大置顶数量'));
        }
        $article = Article::find($id);
        $article->isTop = 1;
        $article->save();
        return response()->json(Result::ok('置顶成功'));
    }

    public function orderTop(Request $request,$id){
        $article = Article::find($id);
        $article->order = $request->order;
        $article->save();
        return response()->json(Result::ok('排序成功'));
    }

    //驳回
    public function reject(Request $request,$id){
        $article = Article::find($id);
        $article->status = 2;
        $article->remark = $request->remark;
        $article->save();
        return response()->json(Result::ok('驳回成功'));
    }
}
