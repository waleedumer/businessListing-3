<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    protected $fillable=['type','description'];
    public function currency(){
        return $this->belongsTo('App\Currency','code');
    }
}
