<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class TimeConfiguration extends Model
{
    //
    protected $fillable=[
        'listing_id','saturday',
        'sunday','monday',
        'tuesday','wednesday'
        ,'thursday','friday'
    ];
    public function listing(){
        return $this->belongsTo('App\Listing');
    }
//    public function getSaturdayAttribute($value){
//        if($value == "closed") {
//            return $value;
//        }else{
//            $time=explode($value,'-');
//            $time_start=Carbon::createFromFormat('h',$time[0]);
//            $time_end=Carbon::createFromFormat('h',$time[1]);
//            if()
//        }
//    }
//    public function getSundayAttribute($value){
//        if($value == "closed") {
//            return $value;
//        }else{
//            $time=explode($value,'-');
//            $time_start=Carbon::createFromFormat('h',$time[0]);
//            $time_end=Carbon::createFromFormat('h',$time[1]);
//            if()
//        }
//    }
//    public function getMondayAttribute($value){
//        if($value == "closed") {
//            return $value;
//        }else{
//            $time=explode($value,'-');
//            $time_start=Carbon::createFromFormat('h',$time[0]);
//            $time_end=Carbon::createFromFormat('h',$time[1]);
//            if()
//        }
//    }
//    public function getTuesdayAttribute($value){
//        if($value == "closed") {
//            return $value;
//        }else{
//            $time=explode($value,'-');
//            $time_start=Carbon::createFromFormat('h',$time[0]);
//            $time_end=Carbon::createFromFormat('h',$time[1]);
//            if()
//        }
//    }
//    public function getWednesdayAttribute($value){
//        if($value == "closed") {
//            return $value;
//        }else{
//            $time=explode($value,'-');
//            $time_start=Carbon::createFromFormat('h',$time[0]);
//            $time_end=Carbon::createFromFormat('h',$time[1]);
//            if()
//        }
//    }
//    public function getThursdayAttribute($value){
//        if($value == "closed") {
//            return $value;
//        }else{
//            $time=explode($value,'-');
//            $time_start=Carbon::createFromFormat('h',$time[0]);
//            $time_end=Carbon::createFromFormat('h',$time[1]);
//            if()
//        }
//    }
//    public function getFridayAttribute($value){
//        if($value == "closed-closed") {
//            return $value;
//        }else{
//            $time=explode($value,'-');
//            $time_start=Carbon::createFromFormat('h',$time[0]);
//            $time_end=Carbon::createFromFormat('h',$time[1]);
//        }
//    }
    //compare time to check if the listing is now open or closed
    public function compare_time(){
        if(strtolower(Carbon::today()->getTranslatedDayName())=="friday"){
            $today= $this->friday;
            $today=explode('-',$today);
            return $today[0];
//            if($today == 'closed-closed'){
//                return true;
//            }
        }
        if(strtolower(Carbon::today()->getTranslatedDayName())=="saturday"){
            $today= $this->saturday;
            return $today;
//            if($today == 'closed-closed'){
//                return true;
//            }
        }
        if(strtolower(Carbon::today()->getTranslatedDayName())=="sunday"){
            $today= $this->sunday;
            return $today;
//            if($today == 'closed-closed'){
//                return true;
//            }
        }
        if(strtolower(Carbon::today()->getTranslatedDayName())=="monday"){
            $today= $this->monday;
            return $today;
//            if($today == 'closed-closed'){
//                return true;
//            }
        }
        if(strtolower(Carbon::today()->getTranslatedDayName())=="tuesday"){
            $today= $this->tuesday;
            return $today;
//            if($today == 'closed-closed'){
//                return true;
//            }
        }
        if(strtolower(Carbon::today()->getTranslatedDayName())=="wednesday"){
            $today= $this->wednesday;
            return $today;
        }
        if(strtolower(Carbon::today()->getTranslatedDayName())=="thursday"){
            $today= $this->thursday;
            $today=explode('-',$today);
            if($today[0]=='closed' || $today[1]=='closed'){
                return 'closed';
            }else{
                $time_start=Carbon::createFromFormat('H',$today[0]);
                $time_end=Carbon::createFromFormat('H',$today[1]);
                if(now()->greaterThanOrEqualTo($time_start) && now()->lessThanOrEqualTo($time_end)){
                    return 'Now open';
                }else{
                    return 'closed';
                }
            }

        }
    }
}
