<?php

namespace App\Http\Controllers\Index;

use App\Helpers\Result;
use App\Helpers\WechatMessage;
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

        $article = Article::where('userId',session('userId'))->where('status',$request->status)->first();
        if(empty($article)){
            $article = new Article();

            $myArticle = Article::where('userId',session('userId'))->orderBy('status','desc')->with('user')->first();
            if(empty($myArticle['image'])){
                $images = json_decode($myArticle['image'],true);
            }
        }



        $article->qrCode = '';
        $article->userId = session('userId');
        if(!empty($article['image'])){
            $images = json_decode($article['image'],true);
        }

        if(!empty($request->image)){
            $images = [];
            foreach ($request->image as $image){
                $images[] = $image;
            }
        }
        $article->image = json_encode($images);

        $article->content = trim($request->post('content'));

        $userInfo = UserInfo::find(session('userId'))->toArray();
        $article->tag = $userInfo['tag'];
        $article->tag_remark = $userInfo['tag_remark'];
        $article->status = $request->status;
        $article->isDraft = 0;
        $article->isOnline = 0;
        $article->remark = '';

        $article->save();

        if($request->status == 3){
            WechatMessage::submitAudit(session('openId'),session('nickname'));
            $dropDraft = Article::where('userId',session('userId'))->where('status',4)->delete();
        }

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
        $article = Article::where('id',$id)->with('user')->first();

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
        $article = Article::where('userId',session('userId'))->orderBy('status','desc')->with('user')->with('detail')->first();
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
        $result = array();
        if(empty($page)){
            $page = 1;

        }

        if($page == 1){
            $article = $article->forPage($page,10);
            $result['page'] = 1;
            $result['count'] = 10;
        }else{
            $article = $article->forPage($page,5);
            $result['page'] = $page;
            $result['count'] = 5;
        }

        $article = $article->with('praise')->with('user')->get();
        foreach($article as $k => $v){
            $article[$k]['image'] = json_decode($v['image'],true);
        }
        $result['data'] = $article;

        return response()->json(Result::ok($result));
    }

    public function showListAsTag(Request $request,$tag){


        $article = Article::where('status',1)->where('isOnline',1);
        $tags = explode(',',$tag);
        foreach ($tags as $k => $v){
            $article = $article->where('tag_remark','like','%'.$v.'%');
        }
        $article = $article->orderBy('created_at','desc');

        $page = $request->page;
        $result = array();
        if(empty($page)){
            $page = 1;

        }

        if($page == 1){
            $article = $article->forPage($page,10);
            $result['page'] = 1;
            $result['count'] = 10;
        }else{
            $article = $article->forPage($page,5);
            $result['page'] = $page;
            $result['count'] = 5;
        }

        $article = $article->with('praise')->with('user')->get();
        foreach($article as $k => $v){
            $article[$k]['image'] = json_decode($v['image'],true);
        }

        $result['data'] = $article;
        return response()->json(Result::ok($result));
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
//        $article = Article::find($id);
//        if(!empty($request->image)){
//            $article->image = json_encode($request->image);
//        }
//        if(!empty($request->post('content'))){
//            $article->content = trim($request->post('content'));
//        }
//        $userInfo = UserInfo::find(session('userId'))->toArray();
//        $article->tag = $userInfo['tag_remark'];
//        $article->isDraft = 0;
//        $article->status = 0;
//        $article->isOnline = 0;
//        $article->save();
//        WechatMessage::submitAudit(session('openId'),session('nickname'));

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
