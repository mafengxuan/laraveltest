<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Result;
use App\Helpers\WechatMessage;
use App\Model\UserInfo;
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
        $article = Article::with('user')->with('auditDetail')->find($id);
        $article['image'] = json_decode($article['image'],true);
        if(!empty($article['auditDetail']) && is_array($article['auditDetail'])){
            foreach ($article['auditDetail'] as $k => $v){
                var_dump($v['image']);
                $article['auditDetail'][$k]['image'] = json_decode($v['image'],true);
            }
        }
        
        return response()->json(Result::ok($article));
    }

    public function showList(Request $request, $status)
    {
        //
        $article = Article::with('user')->where('status',$status);

        if(!empty($request->nickname)){
            $nickname = $request->nickname;
            $article = $article->whereHas('user',function($query) use ($nickname){
                $query->where('nickname', '=', $nickname);
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
        $userId = $article['userId'];
        $content = $article['content'];
        $image = $article['image'];
        $tag = $article['tag'];
        $tag_remark = $article['tag_remark'];

        $oldArticle = Article::where('userId',$userId)->where('status',1)->first();
        if(!empty($oldArticle)){
            $oldArticle->content = $content;
            $oldArticle->image = $image;
            $oldArticle->tag = $tag;
            $oldArticle->tag_remark = $tag_remark;
            $oldArticle->auditTime = date('Y-m-d H:i:s',time());
            $oldArticle->save();
            $article->delete();
        }else{
            $article->status = 1;
            $article->isOnline = 1;
            $article->auditTime = date('Y-m-d H:i:s',time());
            $article->save();
        }
        $userInfo = UserInfo::find($userId);
        WechatMessage::successAudit($userInfo['openId'], $id);
        return response()->json(Result::ok('审核通过'));
    }

    //重新审核通过
    public function reAudit($id){

        $article = Article::find($id);
        $userId = $article['userId'];

        $checkArticle = Article::where('userId',$userId)->where('status',3)->first();
        if(!empty($checkArticle)){
            $article->delete();
        }else{
            $article->status = 3;
            $article->auditTime = '';
            $article->remark = '';
            $article->save();
        }
        return response()->json(Result::ok('重新审核'));
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
        $userId = $article['userId'];
        $article->status = 2;
        $article->remark = $request->remark;
        $article->save();
        $userInfo = UserInfo::find($userId);
        WechatMessage::rejectAudit($userInfo['openId'],$userInfo['nickname'],$request->remark);
        return response()->json(Result::ok('驳回成功'));
    }

    public function isQuality(Request $request, $id){
        $article = Article::find($id);
        $article->isQuality = $request->isQuality;
        $article->save();
        return response()->json(Result::ok('成功'));

    }

    public function isOnline(Request $request, $id){
        $article = Article::find($id);
        $article->isOnline = $request->isOnline;
        $article->save();
        return response()->json(Result::ok('成功'));

    }

}
