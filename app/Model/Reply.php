<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Reply
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Reply newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Reply newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Reply query()
 * @mixin \Eloquent
 */
class Reply extends Model
{
    //
    protected $table = 'reply';

    public function comment(){
        return $this->hasOne('App\Model\Comment','id','commentId');
    }

    public function user()
    {
        return $this->hasOne('App\Model\UserInfo','userId','userId');
    }

    public function reInfo()
    {
        return $this->hasOne('App\Model\Reply','id','reId');
    }
}
