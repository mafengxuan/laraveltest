<?php
/**
 * Created by PhpStorm.
 * User: mafengxuan
 * Date: 2019-07-01
 * Time: 19:12
 */

namespace App\Helpers;

use App\Model\SendMessage;

class WechatMessage{

    public static function getMoney($openId, $nickname, $money){
        if(!self::checkSend($openId)){
            return;
        }

        $app = app('wechat.official_account');
        $template_id = 'pGZVd9cAVkHcxcf_OFEg1UY_xwZSnSCPGkZV4liz5c4';


        $template_message = [
            'touser' => $openId,
            'template_id' => $template_id,
            'url' => 'http://zjrj.bjjskq.com/dist/views/index/index.html#/BagRuler',
            'data' => [
                "first" => '矫正日记款项已领取通知',
                "keyword1" => $nickname,
                "keyword2" => $money.'元',
                "keyword3" => '北京劲松口腔医院',
                "keyword4" => '微信支付',
                "keyword5" => '已领取',
                "remark" => '点击查看详情',
            ]
        ];

        $app->template_message->send($template_message);
    }

    public static function sendMoney($openId, $nickname, $money){
        if(!self::checkSend($openId)){
            return;
        }

        $app = app('wechat.official_account');
        $template_id = 'pGZVd9cAVkHcxcf_OFEg1UY_xwZSnSCPGkZV4liz5c4';


        $template_message = [
            'touser' => $openId,
            'template_id' => $template_id,
            'url' => 'http://zjrj.bjjskq.com/dist/views/index/index.html#/BagRuler',
            'data' => [
                "first" => '矫正日记款项已领取通知',
                "keyword1" => $nickname,
                "keyword2" => $money.'元',
                "keyword3" => '北京劲松口腔医院',
                "keyword4" => '微信支付',
                "keyword5" => '矫正日记款项',
                "remark" => '点击查看详情',
            ]
        ];

        $app->template_message->send($template_message);
    }

    public static function submitAudit($openId, $nickname){
        if(!self::checkSend($openId)){
            return;
        }

        $app = app('wechat.official_account');
        $template_id = 'bJdnjAVbOKSVh16PEP-j8Pink-pEKTwCIYmaL6m18Uk';


        $template_message = [
            'touser' => $openId,
            'template_id' => $template_id,
            'url' => 'http://zjrj.bjjskq.com/dist/views/index/index.html#/',
            'data' => [
                "first" => '矫正日记提交审核通知',
                "keyword1" => $nickname,
                "keyword2" => '矫正日记',
                "keyword3" => date('Y年m月d日 HH:ii',time()),
                "remark" => '工作人员会在工作时间48小时内为您审核!',
            ]
        ];

        $app->template_message->send($template_message);
    }

    public static function successAudit($openId,$articleId){
        if(!self::checkSend($openId)){
            return;
        }

        $app = app('wechat.official_account');
        $template_id = 'bgm3Ks6nTYok8tlTPOch2sp0j_njg0xb3H4KdFpwPik';

        $template_message = [
            'touser' => $openId,
            'template_id' => $template_id,
            'url' => 'http://zjrj.bjjskq.com/dist/views/index/index.html#/Detail?id='.$articleId,
            'data' => [
                "first" => '矫正日记审核通过通知',
                "keyword1" => '矫正日记发布审核',
                "keyword2" => '审核通过!',
                "keyword3" => date('Y年m月d日',time()),
                "remark" => '点击查看您的矫正日记!',
            ]
        ];

        $app->template_message->send($template_message);
    }

    public static function rejectAudit($openId,$nickname,$remark){
        if(!self::checkSend($openId)){
            return;
        }

        $app = app('wechat.official_account');
        $template_id = '2gNnu-Hri-Wbr4YVi4nlszwQVG11QJSa-miDebRsY1w';


        $template_message = [
            'touser' => $openId,
            'template_id' => $template_id,
            'url' => 'http://zjrj.bjjskq.com/dist/views/index/index.html#/add',
            'data' => [
                "first" => '矫正日记审核未通过通知',
                "keyword1" => $nickname,
                "keyword2" => $remark,
                "remark" => '点击修改日记,重新提交!',
            ]
        ];

        $app->template_message->send($template_message);
    }

    public static function comment($openId,$nickname,$content){
        if(!self::checkSend($openId)){
            return;
        }

        $app = app('wechat.official_account');
        $template_id = '41wXm0C2O1pOBj_Sd8sMiKvR6Fkx3aP2-bmCCahrSns';


        $template_message = [
            'touser' => $openId,
            'template_id' => $template_id,
            'url' => 'http://zjrj.bjjskq.com/dist/views/index/index.html#/Messages',
            'data' => [
                "first" => '您的矫正日记收到一条评论!',
                "keyword1" => $nickname,
                "keyword2" => $content,
                "remark" => '点击查看详情',
            ]
        ];

        $app->template_message->send($template_message);
    }

    public static function checkSend($openId){
        $date = date("Y-m-d",time());
        $num = SendMessage::where('openId',$openId)->where('sendDate',$date)->count();

        if($num >= 10){
            return false;
        }else{
            $sendMessage = new SendMessage();
            $sendMessage->openId = $openId;
            $sendMessage->sendDate = $date;
            $sendMessage->save();
            return true;
        }

    }

}