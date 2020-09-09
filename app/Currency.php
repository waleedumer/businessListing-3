<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    //
    protected $fillable=['name','code','symbol','paypal_supported','stripe_supported'];
}
