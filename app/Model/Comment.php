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
class Comment extends Model
{
    //
    protected $table = 'comment';

    public function article(){
        return $this->hasOne('App\Model\Article','id','articleId');
    }

    public function reply(){
        return $this->hasMany('App\Model\Reply','commentId','id');
    }
}
