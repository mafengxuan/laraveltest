<?php

namespace App\Http\Controllers\index;

use App\Helpers\Result;
use App\Helpers\Tags;
use App\Model\Article;
use App\Model\Detail;
use App\Model\UserInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailController extends Controller
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
        $detail = new Detail();
        $detail->userId = session('userId');

        $detail->status = 3;
        $images = [];
        if(!empty($request->image)){
            foreach ($request->image as $image){
                $images[] = $image;
            }
        }
        $detail->title = $request->title;
        $detail->order = $request->order;
        $detail->pid = 0;
        $detail->image = json_encode($images);
        $detail->content = trim($request->post('content'));
        $detail->remark = '';
        $detail->save();
        $this->storeArticle();
        return response()->json(Result::ok('添加成功'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $detail = Detail::find($id);
        if(!empty($detail['image'])){
            $detail['image'] = json_decode($detail['image'],true);
        }
        return response()->json(Result::ok($detail));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Detail $detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $detail = null;
        if(!empty($request->pid)){
            $detail = Detail::where('pid',$request->pid)->where('status',3)->where('userId',session('userId'))->first();
        }

        if(empty($detail)){
            $detail = new Detail();
        }
        $detail->userId = session('userId');
        $detail->status = 3;
        if(!empty($request->image)){
            foreach ($request->image as $image){
                $images[] = $image;
            }
        }
        if(!empty($request->title)){
            $detail->title = $request->title;
        }
        if(!empty($request->order)){
            $detail->order = $request->order;
        }
        if(empty($request->pid)) {
            $detail->pid = $id;
        }
        $detail->image = json_encode($images);
        if(!empty($request->post('content'))){
            $detail->content = trim($request->post('content'));
        }
        $detail->remark = '';
        $detail->save();
        $this->storeArticle();
        return response()->json(Result::ok('修改成功'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail $detail)
    {
        //
    }

    public function tag(){
        $data = Tags::monthTag();
        return response()->json(Result::ok($data));
    }

    private function storeArticle(){
        $article = Article::where('userId',session('userId'))->where('status',3)->first();
        if(empty($article)){
            $article = new Article();

            $myArticle = Article::where('userId',session('userId'))->where('status',1)->first();
            if(empty($myArticle)){
                return;
            }
            $article->qrCode = '';
            $article->userId = session('userId');
            $article->image = $myArticle['image'];

            $userInfo = UserInfo::find(session('userId'))->toArray();
            $article->tag = $userInfo['tag'];
            $article->tag_remark = $userInfo['tag_remark'];
            $article->content = $userInfo['content'];

            $article->status = 3;
            $article->isDraft = 0;
            $article->isOnline = 0;
            $article->remark = '';

            $article->save();

        }
        return;
    }
}
