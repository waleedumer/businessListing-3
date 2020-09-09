<?php

namespace App\Http\Controllers;

use App\Amenity;
use App\Category;
use App\ClaimedListing;
use App\Country;
use App\Listing;
use App\Setting;
use App\TimeConfiguration;
use Illuminate\Http\Request;

class UserListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $page_data=['page_name'=>'listings','page_data'=>'Directories'];
        $listings=auth()->user()->listings;
        return view('admin.index',compact(['page_data','listings']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $page_data=['page_name'=>'listing_add_wiz','page_title'=>'Add new listing'];
        $countries=Country::all();
        $categories=Category::all();
        $amenities=Amenity::all();
        $settings=Setting::all()->keyBy('type');
        return view('admin.index',compact(['page_data','categories','countries','amenities','settings']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request['variants']=json_encode($request['variants']);
        $request['product_name']=json_encode($request['product_name']);
        $request['menu_name']=json_encode($request['menu_name']);
        $request['items']=json_encode($request['items']);
        $request['product_price']=json_encode($request['product_price']);
        $request['menu_price']=json_encode($request['menu_price']);
        $request['service_name']=json_encode($request['service_name']);
        $request['starting_time']=json_encode($request['starting_time']);
        $request['ending_time']=json_encode($request['ending_time']);
        $request['duration']=json_encode($request['duration']);
        $request['service_price']=json_encode($request['service_price']);
        $request['room_name']=json_encode($request['room_name']);
        $request['room_description']=json_encode($request['room_description']);
        $request['room_price']=json_encode($request['room_price']);
        $request['hotel_room_amenities']=json_encode($request['hotel_room_amenities']);
        $request['user_id']=auth()->user()->id;
        $listing=Listing::create($request->except([
            'categories', "saturday_opening", "saturday_closing" ,
            "sunday_opening" , "sunday_closing" , "monday_opening" ,
            "monday_closing" , "tuesday_opening" , "tuesday_closing" ,
            "wednesday_opening" , "wednesday_closing" , "thursday_opening" ,
            "thursday_closing" , "friday_opening" , "friday_closing" , "amenities"
        ]));
        TimeConfiguration::create([
            'saturday'=>$request['saturday_opening'].'-'.$request['saturday_closing'],
            'sunday'=>$request['sunday_opening'].'-'.$request['sunday_closing'],
            'monday'=>$request['monday_opening'].'-'.$request['monday_closing'],
            'tuesday'=>$request['tuesday_opening'].'-'.$request['tuesday_closing'],
            'wednesday'=>$request['wednesday_opening'].'-'.$request['wednesday_closing'],
            'thursday'=>$request['thursday_opening'].'-'.$request['thursday_closing'],
            'friday'=>$request['friday_opening'].'-'.$request['friday_closing']
        ]);
        $time=TimeConfiguration::all()->last();
        $time->listing()->associate($listing);
        $time->save();

        $categories=Category::find($request['categories']);
        foreach($categories as $key=>$category){
            $category->listings()->attach($listing);
        }

        ClaimedListing::create();
        $claimedListing=ClaimedListing::all()->last();
        $claimedListing->listing()->associate($listing);
        $claimedListing->save();
        $amenities=Amenity::find($request['amenities']);
        foreach ($amenities as $amenity){
            $amenity->listings()->attach($listing);
        }
        return redirect(route('user.listings.create'))->with(['message'=>'Successful']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
