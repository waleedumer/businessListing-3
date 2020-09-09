<?php

namespace App\Http\Controllers;

use App\Package;
use App\Setting;
use Illuminate\Http\Request;

class UserPricingsController extends Controller
{
    //
    public function packages(){
        $page_data=['page_name'=>'packages','page_title'=>'Packages'];
        $packages=Package::all();
        $setting=Setting::all()->keyBy('type');
        return view('admin.index',compact(['page_data','packages','setting']));
    }
    public function purchase_history(){
        $page_data=['page_name'=>'purchase_history','page_title'=>'Purchase_history'];
        $purchase_histories=auth()->user()->packages->all();
        $settings=Setting::all()->keyBy('type');
        return view('admin.index',compact(['page_data','purchase_histories','settings']));
    }
    public function print_invoice($id){
        $page_data=['page_name'=>'package_invoice','page_title'=>'Package Invoice'];
        $purchase_history=Package::find($id);
        $settings=Setting::all()->keyBy('type');
        return view('admin.index',compact(['page_data','purchase_history','settings']));
    }
}
