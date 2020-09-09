<?php

namespace App\Http\Controllers;

use App\Category;
use App\FrontendSetting;
use App\Listing;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $page_data=['page_name'=>'home','page_title','Home'];
        $frontend_settings=FrontendSetting::all()->keyBy('type');
        $categories=Category::all();
        $listings=Listing::all();
        return view('frontend.index',compact(['page_data','frontend_settings','categories','listings']));
    }
    public function search(){

        return view('frontend.index', compact(''));
    }
}
