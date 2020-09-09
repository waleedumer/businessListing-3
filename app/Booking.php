<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    protected $fillable=['user_id','requester_id','listing_id','booking_data','additional_information','listing_type','status','request_date'];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function request(){
        return $this->belongsTo('App\User','requester_id');
    }
    public function listing(){
        return $this->belongsTo('App\Listing');
    }
}
