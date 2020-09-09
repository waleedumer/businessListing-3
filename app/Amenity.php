<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    //
    protected $fillable=['id','icon','name','slug','listing_id'];
    public function listings(){
        return $this->belongsToMany('App\Listing')->withTimestamps();
    }
}
