<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnderComment extends Model
{
    //
    protected $fillable=['comment_id','under_comment','user_id'];
    public function user(){
        return $this->belongsTo('App\User');
    }

}
