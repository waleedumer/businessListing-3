<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable=['parent', 'icon_class','name','slug','thumbnail'];
    public function listings(){
        return $this->belongsToMany('App\Listing','category_listing')->withTimestamps();
    }
    public function sub_categories(){
        return $this->hasMany('App\SubCategory');
    }
}
