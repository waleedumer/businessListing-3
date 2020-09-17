<?php

namespace App\Http\Controllers;

use App\Package;
use App\Setting;
use App\TimeConfiguration;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PurchasePackage extends Controller
{
    //
    protected $timezone;
    public function free($id){
        $timezone=Setting::all()->keyBy('type')['timezone']->description;
        $package=Package::find($id);
        $validity_in_days=Package::find($id)->validity;
        $date_of_expiry=Carbon::createFromTimeString(now($timezone))->addDays($validity_in_days);
        $user=auth()->user()->id;
        $package->user()->attach($user,[
            'purchase_date'=>now(),
            'expired_date'=>$date_of_expiry,
            'payment_method'=>'free',
            'amount_paid'=>0
        ]);
        return redirect(route('user.packages'));
    }
    public function paid(){
        $timezone=Setting::all()->keyBy('type')['timezone']->description;
        dd(TimeConfiguration::latest()->first()->compare_time());
    }
}
