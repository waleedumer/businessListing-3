<?php

namespace App\Http\Controllers;

use App\Amenity;
use App\Category;
use App\City;
use App\ClaimedListing;
use App\Country;
use App\Listing;
use App\Package;
use App\Review;
use App\TimeConfiguration;
use App\User;
use Illuminate\Http\Request;

class ListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $page_data=['page_name'=>'listings','page_title'=>'Directories'];
        $users=User::all();
        $listings=Listing::all();
        $claimed_listings=ClaimedListing::all();
        return view('admin.index',compact(['page_data','users','listings','claimed_listings']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $page_data=['page_name'=>'listing_create_wiz','page_title'=>'Add New Listing'];
        $countries=Country::all();
        $categories=Category::all();
        $amenities=Amenity::all();
        return view('admin.index',compact(['page_data','countries','categories','amenities']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        return redirect(route('listings.create'))->with(['message'=>'Successful']);
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
        $listing_details=Listing::find($id);
        $page_data=['page_name'=>'listing','page_title'=>'Listing'];
        $categories=Category::all();;
        $amenities=Amenity::all();
        $cities=City::all();
        return view('frontend.index',compact(['page_data','listing_details','categories','amenities','cities']));
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
    public function make_active(Request $request, $id){

    }
    public function make_pending(Request $request, $id){

    }
    public function make_featured(Request $request, $id){

    }
    public function make_none_featured(Request $request){

    }
    public function filter_listing_table(Request $request){

    }
    public function get_city_list_by_country_id(Request $request){

    }
    public function filter_listings(Request $request){
        $page_data=['page_name'=>'listings','page_title'=>'Listings'];
        $listings=Category::where('name',$request->input('category'))->first()->listings()->paginate(8);
        $categories=Category::all();
        $amenities=Amenity::all();
        $cities=City::all();
        return view('frontend.index', compact(['page_data','listings','categories','amenities','cities']));
    }
}
