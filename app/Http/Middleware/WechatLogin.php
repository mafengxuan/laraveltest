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
        dd('test');
        dump(session('wechat.oauth_user.default'));
        dump(!empty(session('wechat.oauth_user.default')));
        if(!empty(session('wechat.oauth_user.default'))){
            $openInfo = session('wechat.oauth_user.default');
            dd($openInfo);
            $openId = $openInfo['original']['openid'];
            $userInfo = UserInfo::where('openId',$openId)->first();
            if(!empty($userInfo)){
                session('userId',$userInfo['userId']);
                session('openId',$userInfo['openId']);
                session('nickName',$userInfo['nickName']);
                session('headimgurl',$userInfo['imgUrl']);
                session('mobile',$userInfo['mobile']);
            }else{
                $originalInfo = $openInfo['original'];
                $users = new UserInfo;
                $users->openId = $originalInfo['openid'];
                $users->nickName = $originalInfo['nickname'];
                $users->sex = $originalInfo['sex'];
                $users->province = $originalInfo['province'];
                $users->city = $originalInfo['city'];
                $users->imgUrl = $originalInfo['headimgurl'];
                $users->save();
                $userInfo = UserInfo::where('openId',$openId)->first();
                session('userId',$userInfo['userId']);
                session('openId',$userInfo['openId']);
                session('nickName',$userInfo['nickName']);
                session('headimgurl',$userInfo['imgUrl']);
                session('mobile',$userInfo['mobile']);
            }
        }

        return $next($request);
    }
}
