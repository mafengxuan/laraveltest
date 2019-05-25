<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Result;
use App\Model\Discovery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscoveryController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSlideShow(Request $request)
    {
        //
        $discovery = new Discovery;
        $discovery->type = 1;
        $discovery->title = $request->title;
        $discovery->image = $request->image;
        $discovery->url = $request->url;
        $discovery->order = $request->order;
        $discovery->save();

        return response()->json(Result::ok('添加轮播图成功'));

    }

    public function storeSlideArticle(Request $request)
    {
        //
        $discovery = new Discovery;
        $discovery->type = 2;
        $discovery->title = $request->title;
        $discovery->image = $request->image;
        $discovery->url = $request->url;
        $discovery->order = $request->order;
        $discovery->save();

        return response()->json(Result::ok('添加轮播图成功'));

    }

    public function storeSlideIcon(Request $request)
    {
        //
        $discovery = new Discovery;
        $discovery->type = 3;
        $discovery->title = $request->title;
        $discovery->image = $request->image;
        $discovery->url = $request->url;
        $discovery->order = $request->order;
        $discovery->save();

        return response()->json(Result::ok('添加轮播图成功'));

    }

    public function show($id){
        $discovery = Discovery::find($id);
        return response()->json(Result::ok($discovery));
    }


    public function showList($type){
        $array = [1,2,3];
        if(!in_array($type,$array)){
            return response()->json(Result::error('1','参数错误'));
        }
        $discovery = Discovery::where('type',$type)->get();
        return response()->json(Result::ok($discovery));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $discovery = Discovery::find($id);
        $discovery->image = $request->image;
        $discovery->title = $request->title;
        $discovery->url = $request->url;
        $discovery->order = $request->order;
        $discovery->save();
        return response()->json(Result::ok('修改成功'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $discovery = Discovery::destroy($id);
        return response()->json(Result::ok('删除成功'));
    }
}
