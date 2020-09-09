<?php

namespace App\Http\Controllers;

use App\ReportedListing;
use Illuminate\Http\Request;

class AdminReportedListings extends Controller
{
    //
    public function index(){
        $page_data=['page_title'=>'Reported Listings','page_name'=>'reported_listings'];
        $reported_listings=ReportedListing::all();
        return view('admin.index',compact(['page_data','reported_listings']));
    }
}
