<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $fillable=['title','blog_text','category_id','user_id','status','blog_thumbnail','blog_cover'];
    public function category(){
        return $this->belongsTo('App\Category','category_id');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function comments(){
        return $this->hasMany('App\BlogComment','blog_id');
    }
}
