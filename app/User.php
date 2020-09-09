<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','address','phone','website','about','','wishlists','verification_code','is_verified','email_verified_at','twitter','facebook','linkedin','photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function isAdmin(){
        if($this->role_id==1) {
            return true;
        }else{
            return false;
        }
    }
    public function isUser(){
        if($this->role_id==2){
            return true;
        }else{
            return false;
        }
    }
    public function package(){
        return $this->hasOne('App\Package');
    }
    public function bookings(){
        return $this->hasMany('App\Booking');
    }
    public function package_purchased_history(){
        return $this->hasMany('App\PackagePurchasedHistory');
    }
    public function wishlist(){
        return $this->belongsToMany('App\Listing')->withPivot('is_wishlisted')->withTimestamps();
    }
    public function listings(){
        return $this->hasMany('App\Listing');
    }
    public function role(){
        return $this->belongsTo('App\Role');
    }
    public function packages(){
        return $this->belongsToMany('App\Package')->withPivot('expired_date','amount_paid','purchase_date','payment_method');
    }
    public function reviews(){
        return $this->belongsTo('App\Review');
    }
}
