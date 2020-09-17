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
    //compare time to check if the listing is now open or closed
    public function compare_time(){
        if(strtolower(Carbon::today()->getTranslatedDayName())=="friday"){
            $today= $this->friday;
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
        if(strtolower(Carbon::today()->getTranslatedDayName())=="saturday"){
            $today= $this->saturday;
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
        if(strtolower(Carbon::today()->getTranslatedDayName())=="sunday"){
            $today= $this->sunday;
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
        if(strtolower(Carbon::today()->getTranslatedDayName())=="monday"){
            $today= $this->monday;
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
        if(strtolower(Carbon::today()->getTranslatedDayName())=="tuesday"){
            $today= $this->tuesday;
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
        if(strtolower(Carbon::today()->getTranslatedDayName())=="wednesday"){
            $today= $this->wednesday;
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
