<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Result;
use App\Model\Rule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PHPUnit\Runner\TestSuiteLoader;

class RuleController extends Controller
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeArticle(Request $request)
    {
        //
        $rule = new Rule;
        $rule->content = $request->post('content');
        $rule->type = 1;
        $rule->save();
        return response()->json(Result::ok('添加成功'));
    }

    public function storeMoney(Request $request)
    {
        //
        $rule = new Rule;
        $rule->content = $request->post('content');
        $rule->type = 2;
        $rule->save();
        return response()->json(Result::ok('添加成功'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($type)
    {
        //
        $rule = Rule::where('type',$type)->first();
        return response()->json(Result::ok($rule));
    }

    public function showAll()
    {
        $rule = Rule::all();
        return response()->json(Result::ok($rule));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $type)
    {
        //
        $rule = Rule::where('type',$type)->first();
        if(empty($rule)){
            $rule = new Rule();
            $rule->type = $type;
        }
        $rule->content = $request->post('content');
        $rule->save();
        return response()->json(Result::ok('修改成功'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
