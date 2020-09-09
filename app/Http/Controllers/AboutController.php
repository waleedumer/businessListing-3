<?php

namespace App\Http\Controllers;

use App\FrontendSetting;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function index(){
        $page_data=['page_name'=>'about','page_title'=>'About'];
        $frontend_setting=FrontendSetting::all()->keyBy('type');
        return view('frontend.index', compact(['page_data','frontend_settings']));
    }
}
