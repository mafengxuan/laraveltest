<?php

namespace App\Http\Controllers\Index;

use App\Helpers\Result;
use App\Model\Discovery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscoveryController extends Controller
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


    public function showList(){
        $discovery = Discovery::orderBy('type','asc')->orderBy('order','asc')->get()->toArray();
        $data = array();
        foreach ($discovery as $k =>$v){
            if($v['type'] == 1){
                $data['slideShow'][] = $v;
            }
            if($v['type'] == 2){
                $data['slideArticle'][] = $v;
            }
            if($v['type'] == 3){
                $data['slideIcon'][] = $v;
            }
        }
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
