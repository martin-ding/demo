<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tag
 * @package App
 */
class Tag extends Model
{

    protected $fillable = [
        'name',
    ];
    /**
     * get the articles associate with the given tag
     */
    function articles(){
       return $this->belongsToMany('App\Article');
    }

}
