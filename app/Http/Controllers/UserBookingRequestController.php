<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserBookingRequestController extends Controller
{
    //
    public function beauty(){
        $page_data=['page_name'=>'booking_request_beauty','page_title'=>'Booking Request'];
        return view('admin.index',compact('page_data'));
    }
    public function hotel(){
        $page_data=['page_name'=>'booking_request_hotel','page_title'=>'Booking Request'];
        return view('admin.index',compact('page_data'));
    }
    public function restaurant(){
        $page_data=['page_name'=>'booking_request_restaurant','page_title'=>'Booking Request'];
        return view('admin.index',compact('page_data'));
    }
}
