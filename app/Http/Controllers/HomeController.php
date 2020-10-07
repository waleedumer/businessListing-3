<?php

namespace App\Http\Controllers;


use App\ClaimedListing;

use App\HotelRoomSpecification;
use App\FoodMenu;
use App\BeautyService;
use App\Listing;
use App\Package;
use App\Review;
use App\TimeConfiguration;
use App\User;
use Illuminate\Support\Carbon;
use function MongoDB\BSON\toJSON;
use App\Category;
use App\FrontendSetting;
use App\Amenity;
use App\City;
use App\Country;
use Illuminate\Http\Request;
use DB;

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
        if($_GET['selected_category_id'] == null)
        {
            $listings = Listing::where('name', 'like', '%'.$_GET['search_string'].'%')->paginate(8);
        }
        else
        {
            // $listings = DB::table('listings as l')
            // ->join('category_listing as c', 'c.listing_id', '=', 'l.id')
            // ->where('c.category_id', $_GET['selected_category_id'])
            // ->where('l.name', 'like', $_GET['search_string'].'%')
            // ->select('*')
            // ->get()->toArray();
            $listings = null;
        }
        $page_data=['page_name'=>'listings','page_title'=>'Listings'];
        // $listings=Listing::orderBy('is_featured','DESC')->paginate(8);
        $categories=Category::all();
        $amenities=Amenity::all();
        $cities=City::all();
        return view('frontend.index', compact(['page_data','listings','categories','amenities','cities']));
    }

    public function add_listing()
    {
        $amenities = Amenity::all();
        $countries = Country::all();
        $categories = Category::all();
        $page_data=['page_name'=>'addListing','page_title','Add Listing'];
        return view('frontend.index', compact('page_data', 'categories','countries', 'amenities'));
    }

    public function store(Request $request)
    {
        // $request['user_id'] = auth()->user()->id;

        //start for listing images
        $destinationPath = public_path('uploads/hotel_room_images');
        $listing_images = collect([]);
        if ($request->hasFile('listing_images')) {
            $files = $request->file('listing_images');
            $destinationPath = public_path('uploads/listing_images');
            foreach ($files as $key => $file) {
                $name = auth()->user()->id . time() . $key . '.' . $file->getClientOriginalExtension();
                $file->move($destinationPath, $name);
                $listing_images[] = $name;
            }
        }
        //end for listing images
        //start for listing thumbnail
        $destination_path_for_thumbnail = public_path('uploads/listing_thumbnails');
        $thumbnail = null;
        if ($request->hasFile('listing_thumbnail')) {
            $file_for_thumbnail = $request->file('listing_thumbnail');
            $name_for_thumbnail = auth()->user()->id . time() . '.' . $file_for_thumbnail->getClientOriginalExtension();
            $file_for_thumbnail->move($destination_path_for_thumbnail, $name_for_thumbnail);
            $thumbnail = $name_for_thumbnail;
        } else {
            $thumbnail = 'thumbnail.png';
        }
        //end for listing thumbnail
        //start for listing Cover
        $destination_path_for_cover = public_path('uploads/listing_cover_photo');
        $cover = null;
        if ($request->hasFile('listing_cover')) {
            $file_for_cover = $request->file('listing_cover');
            $name_for_cover = auth()->user()->id . time() . '.' . $file_for_cover->getClientOriginalExtension();
            $file_for_cover->move($destination_path_for_cover, $name_for_cover);
            $cover = $name_for_cover;
        } else {
            $cover = 'thumbnail.png';
        }
        //end for listing cover
        //start creating and saving listing
        $listing = Listing::create([
            'code' => $request['code'], 'name' => $request['name'],
            'description' => $request['description'],
            'video_url' => $request['video_url'], 'video_provider' => $request['video_provider'],
            'tags' => $request['tags'], 'address' => $request['address'],
            'email' => $request['email'], 'phone' => $request['phone'],
            'website' => $request['website'], 'social' => $request['social'],
            'user_id' => $request['user_id'], 'latitude' => $request['latitude'],
            'longitude' => $request['longitude'], 'country_id' => $request['country_id'],
            'city_id' => $request['city_id'], 'status' => $request['status'],
            'listing_type' => $request['listing_type'], 'listing_thumbnail' => $thumbnail,
            'listing_cover' => $cover, 'seo_meta_tags' => $request['seo_meta_tags'],
            'meta_description' => $request['meta_description'],
            'is_featured' => $request['is_featured'],
            'google_analytics_id' => $request['google_analytics_id'], 'package_id' => $request['package_id'],
            'images' => json_encode($listing_images)
        ]);

        
        // Listing Type Checking

          if($request['listing_type'] == 'hotel'){
            $room_images = collect([]);
              foreach ($request['room_name'] as $key => $value) {
                if($value != null):
                    if ($request->hasFile('room_image')) {
                        $files = $request->file('room_image');
                        $destinationPath = public_path('uploads/hotel_room_images');
                        if($files[$key] != null):
                            $name = auth()->user()->id . time() . $key . '.' . $files[$key]->getClientOriginalExtension();
                            $files[$key]->move($destinationPath, $name);
                            $room_images[] = $name;
                        else:
                            $room_images[] = 'thumbnail.png';
                        endif;
                    }
                    HotelRoomSpecification::create([
                        'listing_id' => $listing->id,
                        'name' => $request['room_name'][$key],
                        'description'=> json_encode($request['room_description'][$key]),
                        'price' => $request['room_price'][$key],
                        'amenities' => json_encode($request['hotel_room_amenities'][$key]),
                        'photo' => $room_images[$key]
                    ]);
                endif;
              }
            
          }else if($request['listing_type'] == 'restaurant'){
            
            $menu_images = collect([]);
            foreach ($request['menu_name'] as $key => $value) {
              if($value != null):
                  if ($request->hasFile('menu_image')) {
                      $files = $request->file('menu_image');
                      $destinationPath = public_path('uploads/restaurant_menu_images');
                      if($files[$key] != null):
                          $name = auth()->user()->id . time() . $key . '.' . $files[$key]->getClientOriginalExtension();
                          $files[$key]->move($destinationPath, $name);
                          $menu_images[] = $name;
                      else:
                          $menu_images[] = 'thumbnail.png';
                      endif;
                  }
                  FoodMenu::create([
                      'listing_id' => $listing->id,
                      'name' => $request['menu_name'][$key],
                      'items'=> json_encode($request['items'][$key]),
                      'price' => $request['menu_price'][$key],
                      'photo' => $menu_images[$key]
                  ]);
              endif;
            }

          }else if($request['listing_type'] == 'shop'){
            $menu_images = collect([]);
            foreach ($request['menu_name'] as $key => $value) {
              if($value != null):
                  if ($request->hasFile('menu_image')) {
                      $files = $request->file('menu_image');
                      $destinationPath = public_path('uploads/restaurant_menu_images');
                      if($files[$key] != null):
                          $name = auth()->user()->id . time() . $key . '.' . $files[$key]->getClientOriginalExtension();
                          $files[$key]->move($destinationPath, $name);
                          $menu_images[] = $name;
                      else:
                          $menu_images[] = 'thumbnail.png';
                      endif;
                  }
                  FoodMenu::create([
                      'listing_id' => $listing->id,
                      'name' => $request['menu_name'][$key],
                      'variant'=> json_encode($request['items'][$key]),
                      'price' => $request['menu_price'][$key],
                      'photo' => $menu_images[$key]
                  ]);
              endif;
            }

          }else if($request['listing_type'] == 'beauty'){
            $menu_images = collect([]);
            foreach ($request['service_name'] as $key => $value) {
              if($value != null):
                  if ($request->hasFile('service_image')) {
                      $files = $request->file('service_image');
                      $destinationPath = public_path('uploads/beauty_service_images');
                      if($files[$key] != null):
                          $name = auth()->user()->id . time() . $key . '.' . $files[$key]->getClientOriginalExtension();
                          $files[$key]->move($destinationPath, $name);
                          $menu_images[] = $name;
                      else:
                          $menu_images[] = 'thumbnail.png';
                      endif;
                  }
                  BeautyService::create([
                      'listing_id' => $listing->id,
                      'name' => $request['service_name'][$key],
                      'service_times'=> $request['starting_time'][$key].'-'.$request['ending_time'][$key],
                      'price' => $request['service_price'][$key],
                      'photo' => $menu_images[$key]
                  ]);
              endif;
            }
          }
          

        // Listing Type Checking Ended


        //end creating listing and saving it
        TimeConfiguration::create([
            'saturday' => $request['saturday_opening'] . '-' . $request['saturday_closing'],
            'sunday' => $request['sunday_opening'] . '-' . $request['sunday_closing'],
            'monday' => $request['monday_opening'] . '-' . $request['monday_closing'],
            'tuesday' => $request['tuesday_opening'] . '-' . $request['tuesday_closing'],
            'wednesday' => $request['wednesday_opening'] . '-' . $request['wednesday_closing'],
            'thursday' => $request['thursday_opening'] . '-' . $request['thursday_closing'],
            'friday' => $request['friday_opening'] . '-' . $request['friday_closing']
        ]);
        $time = TimeConfiguration::all()->last();
        $time->listing()->associate($listing);
        $time->save();

        $categories = Category::find($request['categories']);
        foreach ($categories as $key => $category) {
            $category->listings()->attach($listing);
        }

        ClaimedListing::create();
        $claimedListing = ClaimedListing::all()->last();
        $claimedListing->listing()->associate($listing);
        $claimedListing->save();
        $amenities = Amenity::find($request['amenities']);
        if (!is_null($amenities)) {
            foreach ($amenities as $amenity) {
                $amenity->listings()->attach($listing);
            }
        }
        return redirect(route('home'))->with(['message'=>'Successful']);
    }
}
