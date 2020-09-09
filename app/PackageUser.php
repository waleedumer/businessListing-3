<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PackageUser extends Pivot
{
    //
    protected $fillable=['id','user_id','package_id','expired_date','purchase_date','payment_method','amount_paid'];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function package(){
        return $this->belongsTo('App\Package');
    }
    public function getPurchaseDateAttribute($value){
        return Carbon::createFromDate($value)->toFormattedDateString();
    }
    public function getExpiredDateAttribute($value){
        return Carbon::createFromDate($value)->toFormattedDateString();
    }
}
