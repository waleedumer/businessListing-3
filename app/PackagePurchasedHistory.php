<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class PackagePurchasedHistory extends Model
{
    //
    protected $fillable=['package_id','user_id','expired_date','amount_paid','purchase_date','payment_method'];
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function package(){
        return $this->belongsTo('App\Package','package_id');
    }
    public function getPurchaseDateAttribute($value){
        return Carbon::createFromDate($value)->toFormattedDateString();
    }
}
