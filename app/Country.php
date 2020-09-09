<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $fillable=['name','code','dial_code','currency_name','currency_symbol','currency_code'];
    public function cities(){
        return $this->hasMany('App\City');
    }
}
