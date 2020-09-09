<?php

namespace App;
use Carbon\Carbon;
use Embed;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    //
    protected $fillable=[
        'code', 'name','description',
        'categories','amenities','photos',
        'video_url','video_provider','tags',
        'address','email','phone',
        'website','social','user_id',
        'latitude','longitude','country_id',
        'city_id','status','listing_type',
        'listing_thumbnail','listing_cover','seo_meta_tags',
        'meta_description','data_added','data_modified',
        'is_featured','google_analytics_id',
        'id','package_id'
        ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function country(){
        return $this->belongsTo('App\Country');
    }
    public function city(){
        return $this->belongsTo('App\City');
    }
    public function categories(){
        return $this->belongsToMany('App\Category')->withTimestamps();
    }
    public function time(){
        return $this->hasOne('App\TimeConfiguration','listing_id');
    }
    public function reviews(){
        return $this->hasMany('App\Review','listing_id');
    }
    public function claimed_listing(){
        return $this->hasOne('App\ClaimedListing');
    }
    public function amenities(){
        return $this->hasMany('App\Amenity','listing_id');
    }
    public function hotel_room_specifications(){
        return $this->hasMany('App\HotelRoomSpecification');
    }
    public function product_details(){
        return $this->hasMany('App\ProductDetail');
    }
    public function food_menus(){
        return $this->hasMany('App\FoodMenu');
    }
    public function photos(){
        return $this->hasMany('App\Photo','listing_id');
    }
    public function beauty_services(){
        return $this->hasMany('App\BeautyService');
    }
    public function package(){
        return $this->belongsTo('App\Package');
    }
    public function users(){
        return $this->belongsToMany('App\User')->withPivot('is_wishlisted');
    }
    public function getVideoHtmlAttribute()
    {
        $embed = Embed::make($this->video_url)->parseUrl();

        if (!$embed)
            return '';

        $embed->setAttribute(['width' => 800]);
        return $embed->getHtml();
    }
    public function time_now(){
        return Carbon::now();
    }
}
