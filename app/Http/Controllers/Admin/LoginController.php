<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin;
use App\Helpers\Result;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{


    public function login(Request $request){
        $username = $request->username;
        $password = $request->password;
        $adminInfo = Admin::where('username',$username)->where('password',$password)->first();
        if(!empty($adminInfo)){
            $request->session()->put('adminId', $adminInfo['id']);
            $request->session()->put('username', $adminInfo['username']);
            return response()->json(Result::ok('登陆成功'));
        }else{
            return response()->json(Result::error(2,'登陆失败'));
        }
    }

    public function logout(Request $request){
        $request->session()->flush();
        return response()->json(Result::ok('退出成功'));

    }

}
