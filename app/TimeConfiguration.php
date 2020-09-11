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
        
    }
}
