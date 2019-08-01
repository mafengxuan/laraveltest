<?php
/**
 * Created by PhpStorm.
 * User: mafengxuan
 * Date: 2019-08-01
 * Time: 19:04
 */

namespace App\Helpers;

class Tool
{
    /**
     * $str  微信昵称
     **/
    public static function filter($str) {
        if($str){
            $name = $str;
            $name = preg_replace('/\xEE[\x80-\xBF][\x80-\xBF]|\xEF[\x81-\x83][\x80-\xBF]/', '', $name);
            $name = preg_replace('/xE0[x80-x9F][x80-xBF]‘.‘|xED[xA0-xBF][x80-xBF]/S','?', $name);
            $return = json_decode(preg_replace("#(\\\ud[0-9a-f]{3})#ie","",json_encode($name)));
            if(!$return){
                return '';
            }
        }else{
            $return = '';
        }
        return str_replace("'","’",$return);
    }
}