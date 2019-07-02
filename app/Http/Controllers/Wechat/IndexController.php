<?php
namespace App\Http\Controllers\Wechat;

use App\Http\Controllers\Controller;
use App\Model\UserInfo;
use Illuminate\Http\Request;
use App\Helpers\Result;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller {


    public function index(Request $request){
        if(!empty(session('wechat.oauth_user.default')) && empty(session('userId'))){
            $openInfo = session('wechat.oauth_user.default');
            $openId = $openInfo['original']['openid'];
            $userInfo = UserInfo::where('openId',$openId)->first();
            if(empty($userInfo)){
                $originalInfo = $openInfo['original'];
                $users = new UserInfo;
                $users->openId = $originalInfo['openid'];
                $users->nickname = $originalInfo['nickname'];
                    if($originalInfo['sex'] == 1){
                        $users->sex = '男';
                    }else{
                        $users->sex = '女';
                    }
                $users->province = $originalInfo['province'];
                $users->city = $originalInfo['city'];
                $users->imgUrl = $originalInfo['headimgurl'];
                $users->save();
                $userInfo = UserInfo::where('openId',$openId)->first();

            }
            $request->session()->put('userId',$userInfo['userId']);
            $request->session()->put('openId',$userInfo['openId']);
            $request->session()->put('nickname',$userInfo['nickname']);
            $request->session()->put('headimgurl',$userInfo['imgUrl']);
            $request->session()->put('mobile',$userInfo['mobile']);
        }
        return redirect($request->returnUrl);
    }

    public function check(Request $request){
//        if(empty(session('userId'))){
//            return response()->json(Result::error(999));
//        }else{
//            return response()->json(Result::ok());
//        }
        if(empty(session('userId'))){
            $userInfo = UserInfo::find(1);
            $request->session()->put('userId',$userInfo['userId']);
            $request->session()->put('openId',$userInfo['openId']);
            $request->session()->put('nickname',$userInfo['nickname']);
            $request->session()->put('headimgurl',$userInfo['imgUrl']);
            $request->session()->put('mobile',$userInfo['mobile']);
        }
        return response()->json(Result::ok());

    }
}