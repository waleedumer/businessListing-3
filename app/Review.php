<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $fillable=['listing_id','reviewer_id','review_comment','review_rating'];
    public function listing(){
        return $this->belongsTo('App\Listing');
    }
    public function user(){
        return $this->belongsTo('App\User','reviewer_id');
    }
}
