<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Tags
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Tags newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Tags newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Tags query()
 * @mixin \Eloquent
 */
class Tags extends Model
{
    //

    protected $table = 'tags';


    public function article()
    {
        return $this->belongsToMany('App\Model\Article');
    }
}
