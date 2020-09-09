<?php

namespace App\Http\Controllers;

use App\ClaimedListing;
use App\Listing;
use Illuminate\Http\Request;

class AdminClaimedListing extends Controller
{
    //
    public function index()
    {
        $page_data = ['page_title' => 'Claimed listing', 'page_name' => 'listings_claimed'];
        $claimed_listings=ClaimedListing::where('status',0)->latest();
        return view("admin.index", compact(['page_data','claimed_listings']));

    }
}
