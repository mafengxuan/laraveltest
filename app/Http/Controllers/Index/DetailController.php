<?php

namespace App\Http\Controllers\index;

use App\Helpers\Result;
use App\Helpers\Tags;
use App\Model\Detail;
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
        return response()->json(Result::ok('添加成功'));
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
}
