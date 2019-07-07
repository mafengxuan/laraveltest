<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Model\Article
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Article query()
 * @mixin \Eloquent
 */
class Article extends Model
{
    //

    protected $table = 'article';


    public function tags()
    {
        return $this->belongsToMany('App\Model\Tags');
    }

    public function praise()
    {
        return $this->hasOne('App\Model\Praise', 'articleId', 'id')->where('userId', session('userId'));
    }

    public function user()
    {
        return $this->hasOne('App\Model\UserInfo', 'userId', 'userId');
    }

    public function detail()
    {
        return $this->hasMany('App\Model\Detail', 'userId', 'userId')->where('status', 1)->orderBy('order','desc')->orderBy('created_at','desc');
    }

    public function auditDetail()
    {
        return $this->hasMany('App\Model\Detail', 'userId', 'userId')->where('status', 3)->orderBy('order','desc')->orderBy('created_at','desc');
    }
}
