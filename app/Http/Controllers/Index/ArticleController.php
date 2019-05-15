<?php

namespace App\Http\Controllers\Index;

use App\Helpers\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Article;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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
        $article = Article::where('id',$id)->first();
        $article->increment('viewNum');
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

    public function showAll(Request $request){
        $type = $request->type;

        switch ($type){
            case 'new':
                $article = Article::where('status',1)->orderBy('created_at','desc')->get();
                break;
            case 'hot':
                $article = Article::where('status',1)->orderBy('commentsNum','desc');
                break;
            case 'top':
                $article = Article::where('status',1)->orderBy('created_at','desc')->orderBy('isTop','desc');
                break;
            case 'collect':
                $article = DB::table('article')
                            ->join('collect','article.articleId','=','collect.articleId')
                            ->join('collect',$request->session()->get('userId'),'=','collect.userId')
                            ->select('article.*','collect.id as collectId')
                            ->where('status',1)
                            ->orderBy('created_at','desc')
                            ->get();
                break;

        }

        return response()->json(Result::ok($article));
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
    }
}
