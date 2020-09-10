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
//        $request['room_name']=json_encode($request['room_name']);
        $request['room_description']=json_encode($request['room_description']);
        $request['room_price']=json_encode($request['room_price']);
        $request['hotel_room_amenities']=json_encode($request['hotel_room_amenities']);
        $request['user_id']=auth()->user()->id;

        //start for listing images
        $destinationPath=public_path('uploads/hotel_room_images');
        $listing_images=collect([]);
        if($request->hasFile('listing_images')){
            $files=$request->file('listing_images');
            foreach($files as $key=>$file){
                $name=auth()->user()->id.time().$key.'.'.$file->getClientOriginalExtension();
                $file->move($destinationPath,$name);
                $listing_images[]=$name;
            }
        }
        //end for listing images
        //start for listing thumbnail
        $destination_path_for_thumbnail=public_path('uploads/listing_thumbnails');
        $thumbnail=null;
        if($request->hasFile('listing_thumbnail')){
            $file_for_thumbnail=$request->file('listing_thumbnail');
            $name_for_thumbnail=auth()->user()->id.time().'.'.$file_for_thumbnail->getClientOriginalExtension();
            $file_for_thumbnail->move($destination_path_for_thumbnail,$name_for_thumbnail);
            $thumbnail=$name_for_thumbnail;
        }else{
            $thumbnail='thumbnail.png';
        }
        //end for listing thumbnail
        //start for listing Cover
        $destination_path_for_cover=public_path('uploads/listing_cover_photo');
        $cover=null;
        if($request->hasFile('listing_cover')){
            $file_for_cover=$request->file('listing_cover');
            $name_for_cover=auth()->user()->id.time().'.'.$file_for_cover->getClientOriginalExtension();
            $file_for_cover->move($destination_path_for_cover,$name_for_cover);
            $cover=$name_for_cover;
        }else{
            $cover='thumbnail.png';
        }
        //end for listing cover
        //start creating and saving listing
        $listing=Listing::create([
            'code'=>$request['code'], 'name'=>$request['name'],
            'description' =>$request['code'],
            'video_url'=>$request['video_url'],'video_provider'=>$request['video_provider'],
            'tags'=>$request['tags'],'address'=>$request['address'],
            'email'=>$request['email'],'phone'=>$request['phone'],
            'website' =>$request['website'],'social'=>$request['social'],
            'user_id'=>$request['user_id'],'latitude' =>$request['latitude'],
            'longitude'=>$request['longitude'],'country_id'=>$request['country_id'],
            'city_id'=>$request['city_id'],'status'=>$request['status'],
            'listing_type'=>$request['listing_type'], 'listing_thumbnail'=>$thumbnail,
            'listing_cover'=>$cover,'seo_meta_tags'=>$request['seo_meta_tags'],
            'meta_description'=>$request['meta_description'],
            'is_featured'=>$request['is_featured'],
            'google_analytics_id'=>$request['google_analytics_id'], 'package_id'=>$request['package_id'],
            'images'=>json_encode($listing_images)
        ]);
        //end creating listing and saving it
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
        if($amenities->exists()) {
            foreach ($amenities as $amenity) {
                $amenity->listings()->attach($listing);
            }
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
