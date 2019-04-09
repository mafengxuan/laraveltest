<?php
/**
 * Created by PhpStorm.
 * User: mafengxuan
 * Date: 2019-04-09
 * Time: 18:58
 */

namespace App\Helpers;

class Result{

    /**
     * @param $result
     * @return mixed
     */
    public static function getResult($result) {
        return $result['result'];
    }

    /**
     * @param $result
     * @return bool
     */
    public static function isError($result) {
        return $result['status'] === \false;
    }

    /**
     * @param $result
     * @return bool
     */
    public static function isOk($result) {
        return $result['status'] === \true;
    }

    /**
     * @param $data
     * @return array
     */
    public static function ok($data = '') {
        return [
            'status'     => \true,
            'result'     => $data,
            'errMessage' => '',
            'errCode'    => ''
        ];
    }

    /**
     * @param string $code
     * @param string $customErrorInfo
     * @return array
     */
    public static function error($code = '', $errMessage = '') {
        $result['status'] = \false;
        $result['result'] = '';
        $result['errCode'] = $code;
        $result['errMessage'] = $errMessage;
        return $result;
    }

    /**
     * @param $result
     * @return mixed
     */
    public static function getMessage($result) {
        return $result['errMessage'];
    }

    /**
     * @param $result
     * @return mixed
     */
    public static function getCode($result) {
        return $result['errCode'];
    }
}