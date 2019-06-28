<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Money
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Money newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Money newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Money query()
 * @mixin \Eloquent
 */
class Money extends Model
{
    //
    protected $table = 'money';

    public function user()
    {
        return $this->hasOne('App\Model\UserInfo','userId','userId');
    }

    public function article()
    {
        return $this->hasOne('App\Model\Article','id','articleId');
    }
}
