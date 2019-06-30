<?php

namespace App\Http\Middleware;

use App\Helpers\Result;
use App\Model\UserInfo;
use Closure;

class WechatLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*
         * User {#214 ▼
          #attributes: array:8 [▼
            "id" => "oMTXyjh_DQGGyC1gyJ18PJ7OC_oQ"
            "name" => "鳳軒"
            "nickname" => "鳳軒"
            "avatar" => "http://thirdwx.qlogo.cn/mmopen/vi_32/l5mB6nPibR89hOromYqI3Bh97cdDIREQFMSmah5VPmpMCKTno3F9FzCURrMQbS7VBNNHOUfXgou9XcFAy5pJCHQ/132"
            "email" => null
            "original" => array:9 [▼
              "openid" => "oMTXyjh_DQGGyC1gyJ18PJ7OC_oQ"
              "nickname" => "鳳軒"
              "sex" => 1
              "language" => "zh_CN"
              "city" => ""
              "province" => "北京"
              "country" => "中国"
              "headimgurl" => "http://thirdwx.qlogo.cn/mmopen/vi_32/l5mB6nPibR89hOromYqI3Bh97cdDIREQFMSmah5VPmpMCKTno3F9FzCURrMQbS7VBNNHOUfXgou9XcFAy5pJCHQ/132"
              "privilege" => []
            ]
            "token" => "21_ARWF4F-Uqy9vqq2jY18uG-rjc2l97V3Ufx9s2YRnBMbsvSpM6HrIwjnHD9_GOOZ1SGxKYG71WCh-R2N9Wz1By8jjh8Op75zT8u2U9e_7YIY"
            "provider" => "WeChat"
          ]
        }
         */

//        if(!empty(session('wechat.oauth_user.default')) && empty(session('openId'))){
//            $openInfo = session('wechat.oauth_user.default');
//            $openId = $openInfo['original']['openid'];
//            $userInfo = UserInfo::where('openId',$openId)->first();
//            if(!empty($userInfo)){
//                $request->session()->put('userId',$userInfo['userId']);
//                $request->session()->put('openId',$userInfo['openId']);
//                $request->session()->put('nickname',$userInfo['nickname']);
//                $request->session()->put('headimgurl',$userInfo['imgUrl']);
//                $request->session()->put('mobile',$userInfo['mobile']);
//            }else{
//                $originalInfo = $openInfo['original'];
//                $users = new UserInfo;
//                $users->openId = $originalInfo['openid'];
//                $users->nickname = $originalInfo['nickname'];
//                    if($originalInfo['sex'] == 1){
//                        $users->sex = '男';
//                    }else{
//                        $users->sex = '女';
//                    }
//                $users->province = $originalInfo['province'];
//                $users->city = $originalInfo['city'];
//                $users->imgUrl = $originalInfo['headimgurl'];
//                $users->save();
//                $userInfo = UserInfo::where('openId',$openId)->first();
//                $request->session()->put('userId',$userInfo['userId']);
//                $request->session()->put('openId',$userInfo['openId']);
//                $request->session()->put('nickname',$userInfo['nickname']);
//                $request->session()->put('headimgurl',$userInfo['imgUrl']);
//                $request->session()->put('mobile',$userInfo['mobile']);
//            }
//        }

        if(empty(session('userId'))){
            $returnUrl = $_SERVER['HTTP_REFERER'];
//            return redirect()->action('Wechat\IndexController@index', ['returnUrl'=>$returnUrl]);
            return redirect()->route('wechat',['returnUrl'=>$returnUrl]);
        }

        return $next($request);
    }
}
