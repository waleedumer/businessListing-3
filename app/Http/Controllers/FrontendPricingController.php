<?php

namespace App\Http\Controllers;

use App\Package;
use Illuminate\Http\Request;

class FrontendPricingController extends Controller
{
    //
    public function index(){
        $page_data=['page_name'=>'pricing','page_title'=>'Pricing'];
        $packages=Package::all();
        return view('frontend.index',compact(['page_data','packages']));
    }
}
