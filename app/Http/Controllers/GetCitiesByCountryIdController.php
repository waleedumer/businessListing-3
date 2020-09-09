<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;


class GetCitiesByCountryIdController extends Controller
{
    //
    public function index($id){

        $cities=Country::find($id)->cities;
        return view('includes.frontend.content.cities_list_dropdown',compact('cities'));
    }
}
