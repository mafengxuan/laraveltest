<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Article;

class ArticleController extends Controller
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
        $article = new Article();
        $article->qrCode = $request->qrCode;
        $article->userId = $request->userId;
        $article->image = $request->image;
        $article->content = $request->post('content');
        $article->save();
        return response()->json(Result::ok('添加成功'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $article = Article::find($id);
        return response()->json(Result::ok($article));
    }

    public function showList(Request $request)
    {
        //
        $article = Article::where('userId',$request->userId)->orderBy('isTop','desc')->orderBy('order','desc')->orderBy('created_at','desc')->get();
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $article = Article::find($id);
        $article->qrCode = $request->qrCode;
        $article->userId = $request->userId;
        $article->image = $request->image;
        $article->content = $request->post('content');
        $article->save();
        return response()->json(Result::ok('修改成功'));
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

    public function audit($id){

        $article = Article::find($id);
        $article->status = 1;
        $article->auditTime = time();
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
        return response()->json(Result::ok('置顶成功'));
    }

    public function reject(Request $request,$id){
        $article = Article::find($id);
        $article->status = 2;
        $article->remark = $request->remark;
        $article->save();
    }
}
