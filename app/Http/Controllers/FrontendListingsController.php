<?php

namespace App\Http\Controllers;

use App\Amenity;
use App\Category;
use App\City;
use App\Listing;
use Illuminate\Http\Request;

class FrontendListingsController extends Controller
{
    //
    public function index(){
        $page_data=['page_name'=>'listings','page_title'=>'Listings'];
        $listings=Listing::paginate(8);
        $categories=Category::all();
        $amenities=Amenity::all();
        $cities=City::all();
//        dd($listings[0]->claimed_listing->status);
        return view('frontend.index', compact(['page_data','listings','categories','amenities','cities']));
    }
}
