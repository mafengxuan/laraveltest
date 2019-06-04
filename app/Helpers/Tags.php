<?php
/**
 * Created by PhpStorm.
 * User: mafengxuan
 * Date: 2019-06-03
 * Time: 20:21
 */

namespace App\Helpers;

class Tags
{

    public static $tags = [

        0 => [
            'id' => 1,
            'label' => "性别",
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
            'data' => [
                [
                    'key' => 5,
                    'value' => '0~12岁'
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
                    'value' => '冰晶托槽"'
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
                    'value' => '龅牙"'
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
}