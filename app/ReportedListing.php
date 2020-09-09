<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportedListing extends Model
{
    //
    protected $fillable=['listing_id','reported_id','report','status','date_added'];
    public function listing(){
        return $this->belongsTo('App\Listing');
    }
    public function reporter(){
        return $this->belongsTo('App\User','reporter_id');
    }
}
