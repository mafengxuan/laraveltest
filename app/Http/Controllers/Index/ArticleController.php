<?php

namespace App\Http\Controllers\Index;

use App\Helpers\Result;
use App\Model\Collect;
use App\Model\Praise;
use App\Model\Tags;
use App\Model\UserInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Article;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;

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
        $article->qrCode = '';
        $article->userId = session('userId');
        $article->image = json_encode($request->image);
        $article->content = $request->post('content');
        $userInfo = UserInfo::find(session('userId'))->toArray();
        $article->tag = $userInfo['tag'];
        $article->isDraft = 0;

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

        if(!empty($article)){
            if(!empty(session('userId'))){
                $collect = Collect::where('userId',session('userId'))->where('articleId',$id)->first();
                $praise = Collect::where('userId',session('userId'))->where('articleId',$id)->first();
                $article['collected'] = $collect['id'];
                $article['praised'] = $praise['id'];
            }else{
                $article['collected'] = '';
                $article['praised'] = '';
            }

            $article->increment('viewNum');
        }
        $article['image'] = json_decode($article['image'],true);
        return response()->json(Result::ok($article));
    }

    public function showMyArticle()
    {
        //
        $article = Article::where('userId',session('userId'))->first();
        return response()->json(Result::ok($article));
    }

    public function showMyDraft()
    {
        //
        $article = Article::where('userId',session('userId'))->where('isDraft',1)->first();
        return response()->json(Result::ok($article));
    }

    public function showList(Request $request){
        $type = $request->type;
        $article = Article::where('status',1)->where('isOnline',1)->where('isDraft',0);
        switch ($type){
            case 'new':
                $article = $article->orderBy('created_at','desc');
                break;
            case 'hot':
                $article = $article->orderBy('commentsNum','desc');
                break;
            case 'quality':
                $article = $article->where('isQuality',1)->orderBy('created_at','desc');
                break;
            case 'collect':
                $article = $article->join('collect',function($join){
                                $join->on('article.id', '=','collect.articleId')->where('collect.userId', '=',session('userId'));
                            })
                            ->select('article.*','collect.id as collectId')
                            ->orderBy('created_at','desc');
                break;
        }
        $page = $request->page;
        if(empty($page)){
            $article = $article->limit(10);
        }else{
            $article = $article->forPage($page,5);
        }

        $article = $article->with('tags')->with('praise')->with('user')->get();

        foreach($article as $k => $v){
            $article[$k]['image'] = json_decode($v['image'],true);
        }

        return response()->json(Result::ok($article));
    }

    public function showListAsTag($tags){
//        $tagsArr = explode(',',$tags);
//        $list = Tags::wherein('id',$tagsArr)->with('article')->get();
//        $data = array();
//        foreach($list as $k => $v){
//            foreach($v['article'] as $kk => $vv){
//                if(isset($data[$vv['id']])){
//                    continue;
//                }
//                $data[$vv['id']] = $vv;
//            }
//        }
//        $data = array_values($data);

        $article = Article::where('status',1)->where('isOnline',1)->where('isDraft',0);
        $article = $article->where('tag',$tags)->orderBy('created_at','desc');
        $article = $article->get();
        foreach($article as $k => $v){
            $article[$k]['image'] = json_decode($v['image'],true);
        }
        return response()->json(Result::ok($article));
    }

    public function showTags(){

        $data = \App\Helpers\Tags::$tags;
        return response()->json(Result::ok($data));

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
        $article->userId = session('userId');
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
