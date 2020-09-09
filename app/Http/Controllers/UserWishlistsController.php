<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserWishlistsController extends Controller
{
    //
    public function index(){
        $page_data=['page_name'=>'wishlists','page_data'=>'Wishlists'];
        return view('admin.index',compact('page_data'));
    }
}
