<?php
/**
 * Created by PhpStorm.
 * User: mafengxuan
 * Date: 2019-06-03
 * Time: 20:21
 */

namespace App\Helpers;

use function GuzzleHttp\default_user_agent;

class Tags
{

    public static $tags = [

        0 => [
            'id' => 1,
            'label' => "性别",
            'key' => 'sex',
            'data' => [
                [
                    'key' => 2,
                    'value' => '男'
                ],
                [
                    'key' => 3,
                    'value' => '女'
                ]
            ]
        ],
        1 => [
            'id' => 4,
            'label' => "年龄",
            'key' => 'age',
            'data' => [
                [
                    'key' => 5,
                    'value' => '5~12岁'
                ],
                [
                    'key' => 6,
                    'value' => '13~18岁'
                ],
                [
                    'key' => 7,
                    'value' => '19~24岁'
                ],
                [
                    'key' => 8,
                    'value' => '25~29岁'
                ],
                [
                    'key' => 9,
                    'value' => '30~35岁'
                ],
                [
                    'key' => 10,
                    'value' => '35岁以上'
                ]
            ]
        ],
        2 => [
            'id' => 11,
            'label' => "矫正时间",
            'key' => 'correct_time',
            'data' => [
                [
                    'key' => 12,
                    'value' => '矫正完毕'
                ],
                [
                    'key' => 13,
                    'value' => '1~12个月'
                ],
                [
                    'key' => 14,
                    'value' => '12~24个月'
                ],
                [
                    'key' => 15,
                    'value' => '24个月以上'
                ]
            ]
        ],
        3 => [
            'id' => 16,
            'label' => "牙套类型",
            'key' => 'tooth_socket',
            'data' => [
                [
                    'key' => 17,
                    'value' => '钢丝矫正'
                ],
                [
                    'key' => 18,
                    'value' => '时代天使'
                ],
                [
                    'key' => 19,
                    'value' => '冰晶托槽'
                ],
                [
                    'key' => 20,
                    'value' => '金属托槽'
                ],
                [
                    'key' => 21,
                    'value' => '陶瓷托槽'
                ],
                [
                    'key' => 22,
                    'value' => '隐适美'
                ]
            ]
        ],
        4 => [
            'id' => 23,
            'label' => "牙齿问题",
            'key' => 'tooth_question',
            'data' => [
                [
                    'key' => 24,
                    'value' => '地包天'
                ],
                [
                    'key' => 25,
                    'value' => '牙齿突出'
                ],
                [
                    'key' => 26,
                    'value' => '龅牙'
                ],
                [
                    'key' => 27,
                    'value' => '错位牙'
                ],
                [
                    'key' => 28,
                    'value' => '牙间隙'
                ],
                [
                    'key' => 29,
                    'value' => '牙列拥挤'
                ],
                [
                    'key' => 30,
                    'value' => '前牙开颌'
                ],
                [
                    'key' => 31,
                    'value' => '咬颌错乱'
                ]
            ]
        ]

    ];

    public static $userInfoTags = [

        0 => [
            'id' => 1,
            'label' => "性别",
            'key' => 'sex',
            'data' => [
                [
                    'key' => 2,
                    'value' => '男'
                ],
                [
                    'key' => 3,
                    'value' => '女'
                ]
            ]
        ],
        1 => [
            'id' => 4,
            'label' => "年龄",
            'key' => 'age',
            'data' => [
                [
                    'key' => 5,
                    'value' => '5岁'
                ],
                [
                    'key' => 6,
                    'value' => '6岁'
                ],
                [
                    'key' => 7,
                    'value' => '7岁'
                ],
                [
                    'key' => 8,
                    'value' => '8岁'
                ],
                [
                    'key' => 9,
                    'value' => '9岁'
                ],
                [
                    'key' => 10,
                    'value' => '10岁'
                ],
                [
                    'key' => 11,
                    'value' => '11岁'
                ],
                [
                    'key' => 12,
                    'value' => '12岁'
                ],
                [
                    'key' => 13,
                    'value' => '13岁'
                ],
                [
                    'key' => 14,
                    'value' => '14岁'
                ],
                [
                    'key' => 15,
                    'value' => '15岁'
                ],
                [
                    'key' => 16,
                    'value' => '16岁'
                ],
                [
                    'key' => 17,
                    'value' => '17岁'
                ],
                [
                    'key' => 18,
                    'value' => '18岁'
                ],
                [
                    'key' => 19,
                    'value' => '19岁'
                ],
                [
                    'key' => 20,
                    'value' => '20岁'
                ],
                [
                    'key' => 21,
                    'value' => '21岁'
                ],
                [
                    'key' => 22,
                    'value' => '22岁'
                ],
                [
                    'key' => 23,
                    'value' => '23岁'
                ],
                [
                    'key' => 24,
                    'value' => '24岁'
                ],
                [
                    'key' => 25,
                    'value' => '25岁'
                ],
                [
                    'key' => 26,
                    'value' => '26岁'
                ],
                [
                    'key' => 27,
                    'value' => '27岁'
                ],
                [
                    'key' => 28,
                    'value' => '28岁'
                ],
                [
                    'key' => 29,
                    'value' => '29岁'
                ],
                [
                    'key' => 30,
                    'value' => '30岁'
                ],
                [
                    'key' => 31,
                    'value' => '31岁'
                ],
                [
                    'key' => 32,
                    'value' => '32岁'
                ],
                [
                    'key' => 33,
                    'value' => '33岁'
                ],
                [
                    'key' => 34,
                    'value' => '34岁'
                ],
                [
                    'key' => 35,
                    'value' => '35岁'
                ],
                [
                    'key' => 36,
                    'value' => '36岁'
                ],
                [
                    'key' => 37,
                    'value' => '37岁'
                ],
                [
                    'key' => 38,
                    'value' => '38岁'
                ],
                [
                    'key' => 39,
                    'value' => '39岁'
                ],
                [
                    'key' => 40,
                    'value' => '40岁'
                ],
                [
                    'key' => 41,
                    'value' => '41岁'
                ],
                [
                    'key' => 42,
                    'value' => '42岁'
                ],
                [
                    'key' => 43,
                    'value' => '43岁'
                ],
                [
                    'key' => 44,
                    'value' => '44岁'
                ],
                [
                    'key' => 45,
                    'value' => '45岁'
                ],
                [
                    'key' => 46,
                    'value' => '46岁'
                ],
                [
                    'key' => 47,
                    'value' => '47岁'
                ],
                [
                    'key' => 48,
                    'value' => '48岁'
                ],
                [
                    'key' => 49,
                    'value' => '49岁'
                ],
                [
                    'key' => 50,
                    'value' => '50岁'
                ],
                [
                    'key' => 51,
                    'value' => '51岁'
                ],
                [
                    'key' => 52,
                    'value' => '52岁'
                ],
                [
                    'key' => 53,
                    'value' => '53岁'
                ],
                [
                    'key' => 54,
                    'value' => '54岁'
                ],
                [
                    'key' => 55,
                    'value' => '55岁'
                ],
                [
                    'key' => 56,
                    'value' => '56岁'
                ],
                [
                    'key' => 57,
                    'value' => '57岁'
                ],
                [
                    'key' => 58,
                    'value' => '58岁'
                ],
                [
                    'key' => 59,
                    'value' => '59岁'
                ],
                [
                    'key' => 60,
                    'value' => '60岁'
                ]
            ]
        ],
        2 => [
            'id' => 11,
            'label' => "矫正时间",
            'key' => 'correct_time',
            'data' => [
                [
                    'key' => 0,
                    'value' => '矫正完毕'
                ],
                [
                    'key' => 1,
                    'value' => '矫正1个月'
                ],
                [
                    'key' => 2,
                    'value' => '矫正2个月'
                ],
                [
                    'key' => 3,
                    'value' => '矫正3个月'
                ],
                [
                    'key' => 4,
                    'value' => '矫正4个月'
                ],
                [
                    'key' => 5,
                    'value' => '矫正5个月'
                ],
                [
                    'key' => 6,
                    'value' => '矫正6个月'
                ],
                [
                    'key' => 7,
                    'value' => '矫正7个月'
                ],
                [
                    'key' => 8,
                    'value' => '矫正8个月'
                ],
                [
                    'key' => 9,
                    'value' => '矫正9个月'
                ],
                [
                    'key' => 10,
                    'value' => '矫正10个月'
                ],
                [
                    'key' => 11,
                    'value' => '矫正11个月'
                ],
                [
                    'key' => 12,
                    'value' => '矫正12个月'
                ],
                [
                    'key' => 13,
                    'value' => '矫正13个月'
                ],
                [
                    'key' => 14,
                    'value' => '矫正14个月'
                ],
                [
                    'key' => 15,
                    'value' => '矫正15个月'
                ],
                [
                    'key' => 16,
                    'value' => '矫正16个月'
                ],
                [
                    'key' => 17,
                    'value' => '矫正17个月'
                ],
                [
                    'key' => 18,
                    'value' => '矫正18个月'
                ],
                [
                    'key' => 19,
                    'value' => '矫正19个月'
                ],
                [
                    'key' => 20,
                    'value' => '矫正20个月'
                ],
                [
                    'key' => 21,
                    'value' => '矫正21个月'
                ],
                [
                    'key' => 22,
                    'value' => '矫正22个月'
                ],
                [
                    'key' => 23,
                    'value' => '矫正23个月'
                ],
                [
                    'key' => 24,
                    'value' => '矫正24个月'
                ],
                [
                    'key' => 25,
                    'value' => '矫正25个月'
                ],
                [
                    'key' => 26,
                    'value' => '矫正26个月'
                ],
                [
                    'key' => 27,
                    'value' => '矫正27个月'
                ],
                [
                    'key' => 28,
                    'value' => '矫正28个月'
                ],
                [
                    'key' => 29,
                    'value' => '矫正29个月'
                ],
                [
                    'key' => 30,
                    'value' => '矫正30个月'
                ],
                [
                    'key' => 31,
                    'value' => '矫正31个月'
                ],
                [
                    'key' => 32,
                    'value' => '矫正32个月'
                ],
                [
                    'key' => 33,
                    'value' => '矫正33个月'
                ],
                [
                    'key' => 34,
                    'value' => '矫正34个月'
                ],
                [
                    'key' => 35,
                    'value' => '矫正35个月'
                ],
                [
                    'key' => 36,
                    'value' => '矫正36个月'
                ]
            ]
        ],
        3 => [
            'id' => 16,
            'label' => "牙套类型",
            'key' => 'tooth_socket',
            'data' => [
                [
                    'key' => 17,
                    'value' => '钢丝矫正'
                ],
                [
                    'key' => 18,
                    'value' => '时代天使'
                ],
                [
                    'key' => 19,
                    'value' => '冰晶托槽'
                ],
                [
                    'key' => 20,
                    'value' => '金属托槽'
                ],
                [
                    'key' => 21,
                    'value' => '陶瓷托槽'
                ],
                [
                    'key' => 22,
                    'value' => '隐适美'
                ]
            ]
        ],
        4 => [
            'id' => 23,
            'label' => "牙齿问题",
            'key' => 'tooth_question',
            'data' => [
                [
                    'key' => 24,
                    'value' => '地包天'
                ],
                [
                    'key' => 25,
                    'value' => '牙齿突出'
                ],
                [
                    'key' => 26,
                    'value' => '龅牙'
                ],
                [
                    'key' => 27,
                    'value' => '错位牙'
                ],
                [
                    'key' => 28,
                    'value' => '牙间隙'
                ],
                [
                    'key' => 29,
                    'value' => '牙列拥挤'
                ],
                [
                    'key' => 30,
                    'value' => '前牙开颌'
                ],
                [
                    'key' => 31,
                    'value' => '咬颌错乱'
                ]
            ]
        ]

    ];

    public static function ageRemark($age){

        switch ($age){
            case '5岁':
            case '6岁':
            case '7岁':
            case '8岁':
            case '9岁':
            case '10岁':
            case '11岁':
            case '12岁':
                return '5~12岁';
            case '13岁':
            case '14岁':
            case '15岁':
            case '16岁':
            case '17岁':
            case '18岁':
                return '13~18岁';
            case '19岁':
            case '20岁':
            case '21岁':
            case '22岁':
            case '23岁':
            case '24岁':
                return '19~24岁';
            case '25岁':
            case '26岁':
            case '27岁':
            case '28岁':
            case '29岁':
                return '25~29岁';
            case '30岁':
            case '31岁':
            case '32岁':
            case '33岁':
            case '34岁':
            case '35岁':
                return '30~35岁';
            case '36岁':
            case '37岁':
            case '38岁':
            case '39岁':
            case '40岁':
            case '41岁':
            case '42岁':
            case '43岁':
            case '44岁':
            case '45岁':
            case '46岁':
            case '47岁':
            case '48岁':
            case '49岁':
            case '50岁':
            case '51岁':
            case '52岁':
            case '53岁':
            case '54岁':
            case '55岁':
            case '56岁':
            case '57岁':
            case '58岁':
            case '59岁':
            case '60岁':
                return '35岁以上';
                break;
            default:
                return '';
        }
    }

    public static function monthRemark($month){
        switch ($month){
            case '矫正完毕':
                return '矫正完毕';
            case '矫正1个月':
            case '矫正2个月':
            case '矫正3个月':
            case '矫正4个月':
            case '矫正5个月':
            case '矫正6个月':
            case '矫正7个月':
            case '矫正8个月':
            case '矫正9个月':
            case '矫正10个月':
            case '矫正11个月':
            case '矫正12个月':
                return '1~12个月';
            case '矫正13个月':
            case '矫正14个月':
            case '矫正15个月':
            case '矫正16个月':
            case '矫正17个月':
            case '矫正18个月':
            case '矫正19个月':
            case '矫正20个月':
            case '矫正21个月':
            case '矫正22个月':
            case '矫正23个月':
            case '矫正24个月':
                return '12~24个月';
            case '矫正25个月':
            case '矫正26个月':
            case '矫正27个月':
            case '矫正28个月':
            case '矫正29个月':
            case '矫正30个月':
            case '矫正31个月':
            case '矫正32个月':
            case '矫正33个月':
            case '矫正34个月':
            case '矫正35个月':
            case '矫正36个月':
                return '24个月以上';
            default :
                return '';
        }
    }

    public static function monthTag(){
        $data =  [
                [
                    'key' => 99,
                    'value' => '矫正完毕'
                ],
                [
                    'key' => 1,
                    'value' => '矫正1个月'
                ],
                [
                    'key' => 2,
                    'value' => '矫正2个月'
                ],
                [
                    'key' => 3,
                    'value' => '矫正3个月'
                ],
                [
                    'key' => 4,
                    'value' => '矫正4个月'
                ],
                [
                    'key' => 5,
                    'value' => '矫正5个月'
                ],
                [
                    'key' => 6,
                    'value' => '矫正6个月'
                ],
                [
                    'key' => 7,
                    'value' => '矫正7个月'
                ],
                [
                    'key' => 8,
                    'value' => '矫正8个月'
                ],
                [
                    'key' => 9,
                    'value' => '矫正9个月'
                ],
                [
                    'key' => 10,
                    'value' => '矫正10个月'
                ],
                [
                    'key' => 11,
                    'value' => '矫正11个月'
                ],
                [
                    'key' => 12,
                    'value' => '矫正12个月'
                ],
                [
                    'key' => 13,
                    'value' => '矫正13个月'
                ],
                [
                    'key' => 14,
                    'value' => '矫正14个月'
                ],
                [
                    'key' => 15,
                    'value' => '矫正15个月'
                ],
                [
                    'key' => 16,
                    'value' => '矫正16个月'
                ],
                [
                    'key' => 17,
                    'value' => '矫正17个月'
                ],
                [
                    'key' => 18,
                    'value' => '矫正18个月'
                ],
                [
                    'key' => 19,
                    'value' => '矫正19个月'
                ],
                [
                    'key' => 20,
                    'value' => '矫正20个月'
                ],
                [
                    'key' => 21,
                    'value' => '矫正21个月'
                ],
                [
                    'key' => 22,
                    'value' => '矫正22个月'
                ],
                [
                    'key' => 23,
                    'value' => '矫正23个月'
                ],
                [
                    'key' => 24,
                    'value' => '矫正24个月'
                ],
                [
                    'key' => 25,
                    'value' => '矫正25个月'
                ],
                [
                    'key' => 26,
                    'value' => '矫正26个月'
                ],
                [
                    'key' => 27,
                    'value' => '矫正27个月'
                ],
                [
                    'key' => 28,
                    'value' => '矫正28个月'
                ],
                [
                    'key' => 29,
                    'value' => '矫正29个月'
                ],
                [
                    'key' => 30,
                    'value' => '矫正30个月'
                ],
                [
                    'key' => 31,
                    'value' => '矫正31个月'
                ],
                [
                    'key' => 32,
                    'value' => '矫正32个月'
                ],
                [
                    'key' => 33,
                    'value' => '矫正33个月'
                ],
                [
                    'key' => 34,
                    'value' => '矫正34个月'
                ],
                [
                    'key' => 35,
                    'value' => '矫正35个月'
                ],
                [
                    'key' => 36,
                    'value' => '矫正36个月'
                ]

        ];
        return $data;
    }
}