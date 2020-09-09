<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    //
    protected $fillable=[
        'comment','blog_id', 'user_id',
        'added_date','modified_date',
        'created_at','updated_at'
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function under_comments(){
        return $this->hasMany('App\UnderComment');
    }

}
