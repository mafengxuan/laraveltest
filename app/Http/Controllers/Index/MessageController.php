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
        $userId = session('userId');
        $articleIds = Article::where('userId',$userId)->get(['id'])->toArray();
        $ids = [];
        foreach ($articleIds as $k => $v){
            $ids[] = $v['id'];
        }
        $comments = Comment::whereIn('articleId',$ids)->orderBy('created_at','desc')->with('article')->with('user')->get()->toArray();
        $replys = Reply::where('reUserId',$userId)->orderBy('created_at','desc')->with('comment')->get()->toArray();
        $result = array_merge($comments,$replys);
        array_multisort(array_column($result,'created_at'),SORT_DESC,$result);
        return response()->json(Result::ok($result));
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
