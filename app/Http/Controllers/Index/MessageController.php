<?php

namespace App\Http\Controllers\Index;

use App\Helpers\Result;
use App\Model\Article;
use App\Model\Comment;
use App\Model\Message;
use App\Model\Reply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
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
    }

    public function showList()
    {
        //
        $messageList = Message::all();
        return response()->json(Result::ok($messageList));
    }

    public function aboutMe(){
//        $userId = session('userId');
        $userId = 1;
        $article = Article::where('userId',$userId)->first();

        $data = [];

        $comments = Comment::where('articleId',$article['id'])->orderBy('created_at','desc')->with('user')->get();

        foreach ($comments as $k => $v) {
             $array = [];
             $array['userId'] =  $v['userId'];
             $array['nickname'] =  $v['user']['nickname'];
             $array['imgUrl'] =  $v['user']['imgUrl'];
             $array['content'] =  $v['content'];
//             $array['describe'] = $article['content'];
             $array['reNickname'] = '';
             $array['reContent'] = '';
             $array['created_at'] = $v['created_at'];
             $hasReply = Reply::where('commentId',$v['id'])->where('reUserId',$v['userId'])->first();
             if(!empty($hasReply)){
                 $array['reNickname'] = $hasReply['nickname'];
                 $array['reContent'] = $hasReply['content'];
             }

             $data[] = $array;
        }

        $replys = Reply::where('reUserId',$userId)->with('user')->with('reInfo')->get();

        foreach ($replys as $k => $v){
            $array = [];
            $array['userId'] =  $v['userId'];
            $array['nickname'] =  $v['user']['nickname'];
            $array['imgUrl'] =  $v['user']['imgUrl'];
            $array['content'] =  $v['content'];
            $array['created_at'] = $v['created_at'];
            $array['reNickname'] = '';
            $array['reContent'] = '';
            if(!empty($v['reInfo'])){
                $array['reNickname'] = $v['reInfo']['nickname'];
                $array['reContent'] = $v['reInfo']['content'];
            }

            $data[] = $array;
        }

        $data = array_multisort(array_column($data,'created_at'), 'DESC', $data);

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
