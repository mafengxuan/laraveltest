<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin;
use App\Helpers\Result;
use App\Http\Controllers\Controller;
use DemeterChain\A;
use Illuminate\Http\Request;

class LoginController extends Controller
{


    public function login(Request $request){
        $username = $request->username;
        $password = $request->password;

        $adminInfo = Admin::where('username',$username)->where('password',$password)->first();
        if(!empty($adminInfo)){
            session('admin', $adminInfo);
            return response()->json(Result::ok('登陆成功'));
        }else{
            return response()->json(Result::error('登陆失败'));
        }
    }

}
