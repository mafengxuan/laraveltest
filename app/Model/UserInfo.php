<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\UserInfo
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\UserInfo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\UserInfo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\UserInfo query()
 * @mixin \Eloquent
 */

class UserInfo extends Model
{
    //
    protected $table = 'user';

    protected $primaryKey = 'userId';

    public function article()
    {
        return $this->hasOne('App\Model\Article','userId','userId')->orderBy('status','asc')->limit(1);
    }
}
