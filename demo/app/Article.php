<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //加入到数据库的字段
    protected $fillable=[
        'title',
        'body',
        'published_at',
        'user_id'
    ];

    //定义published_at 字段是时间
    protected $dates=[
        'published_at'
    ];

    /*setColumnAttribute*/
    //设置published_at 的时间格式
    function setPublishedAtAttribute($date){
      $this->attributes['published_at'] = Carbon::createFromFormat("Y-m-d",$date);//something lie 2016-2-21 15:15:43
//        $this->attributes['published_at'] = Carbon::parse($date);//something like 2016-2-21 00:00:00
    }

    //在controller 使用到了published() 这个函数
    public function scopePublished($query)
    {
        $query->where('published_at','<=',Carbon::now());
    }

    public function scopeUnpublished($query){
        $query->where('published_at','>',Carbon::now());
        
    }

    /**
     * An article belong to a user
     */
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    /**
     * get the tags list
     */
    public function getTagListAttribute(){
        return $this->tags()->lists('id');
    }

}

