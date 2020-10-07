<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/listing/add', 'HomeController@add_listing')->name('add.listing');
Route::post('/listing/store', 'HomeController@store')->name('store.listing');

Route::group(['middleware'=>'admin'],function(){
    Route::get('/admin','AdminController@index')->name('dashboard.index');
    Route::get('/admin/dashboard','AdminController@show')->name('dashboard.show');
    Route::resource('/admin/categories','CategoriesController');
    Route::post('/admin/categories/update','CategoriesController@update')->name('category.update');
    Route::resource('/admin/amenities', 'AmenitiesController')->except('show');
    Route::resource('/admin/cities','CitiesController')->except('show');
    Route::resource('/admin/blogs','BlogsController')->except('show');
    Route::resource('/admin/users','UsersController')->except('show');
    Route::resource('/admin/packages','PackagesController')->except('show');
    Route::put('/admin/blogs/status/{id}','BlogsController@set_status')->name('blogs.status');
    Route::resource('/admin/review_wise_quality','ReviewWiseQualitiesController')->except('show','create','store');
    Route::resource('/admin/offline_payment','PackagePurchasedHistoriesController');
    Route::get('/admin/offline_payment/sort','PackagePurchasedHistoriesController@sort_by_date')->name('offline_payment.sort');
    Route::resource('/admin/booking_beauty','BookingBeautyController');
    Route::resource('/admin/booking_restaurant','BookingRestaurantController');
    Route::resource('/admin/booking_hotel','BookingHotelController');
    Route::put('/admin/booking_beauty/set_status','BookingBeautyController@set_status')->name('booking_beauty.status');
    Route::resource('/admin/system_settings','SystemSettingsController');
    Route::resource('/admin/frontend_settings','FrontendSettingsController');
    Route::post('admin/frontend_settings/banner_image','FrontendSettingsController@banner_image')->name('frontend_settings.image_upload.banner_image');
    Route::post('admin/frontend_settings/image_upload/light_logo','FrontendSettingsController@light_logo')->name('frontend_settings.image_upload.light_logo');
    Route::post('admin/frontend_settings/image_upload/dark_logo','FrontendSettingsController@dark_logo')->name('frontend_settings.image_upload.dark_logo');
    Route::post('admin/frontend_settings/image_upload/small_logo','FrontendSettingsController@small_logo')->name('frontend_settings.image_upload.small_logo');
    Route::post('admin/frontend_settings/image_upload/favicon','FrontendSettingsController@favicon')->name('frontend_settings.image_upload.favicon');
    Route::resource('/admin/payment_settings','PaymentSettingsController');
    Route::post('admin/payment_settings/system_currency_settings','PaymentSettingsController@system_currency_settings')->name('payment_settings.system_currency_settings');
    Route::post('admin/payment_settings/paypal_settings','PaymentSettingsController@paypal_settings')->name('payment_settings.paypal_settings');
    Route::post('admin/payment_settings/stripe_settings','PaymentSettingsController@stripe_settings')->name('payment_settings.stripe_settings');
    Route::resource('/admin/smtp_settings','SmtpSettingsController');
    Route::resource('/admin/manage_language','LanguagesController');
    Route::resource('/admin/map_settings','MapSettingsController');
    Route::resource('/admin/listings','ListingsController')->except('show','destroy');
    Route::delete('admin/listings/{id}','listingsController@destroy')->name('listings.destroy');
    Route::post('admin/listings/destroyMany/{ids}','listingsController@destroyMany')->name('listings.destroyMany');
    Route::post('/admin/listings/make_active','ListingsController@make_active')->name('listings.make_active');
    Route::post('/admin/listings/make_pending','ListingsController@make_pending')->name('listings.make_pending');
    Route::post('/admin/listings/make_featured','ListingsController@make_featured')->name('listings.make_featured');
    Route::post('/admin/listings/make_none_featured','ListingsController@make_none_featured')->name('listings.make_none_featured');
    Route::get('/admin/listings/filter_listing_table','ListingsController@filter_listing_table')->name('listings.filter_listing_table');
    Route::get('/admin/claimed_listings','AdminClaimedListing@index')->name('admin.claimed_listings');
    Route::get('/admin/reported_listings','AdminReportedListings@index')->name('admin.reported_listings');
});
Route::get('/home/get_city_list_by_country_id/{id}','GetCitiesByCountryIdController@index');
Route::get('/home/about','AboutController@index');
Route::get('/home/search','HomeController@search')->name('home.search');
Route::get('/home/listings/show/{id}','ListingsController@show')->name('listings.show');
Route::get('/home/filter_listings_by_categories','ListingsController@filter_listings_by_categories');
Route::get('/home/filter_listings','ListingsController@filter_listings');
Route::get('/home/category','FrontendCategoryController@index');
Route::get('/home/pricing','FrontendPricingController@index');
Route::get('/home/blog','FrontendBlogsController@index');
Route::get('/home/listings','FrontendListingsController@index');
Route::group(['middleware'=>'user'], function(){
    Route::get('/user','UserController@index')->name('user.index');
    Route::get('user/dashboard','UserController@index')->name('user.dashboard');
//    Route::resource('/user/listings','UserListingsController',[
//        'as'=>'user'
//    ]);
    Route::get('user/listings','UserListingsController@index')->name('user.listings.index');
    Route::get('/user/listings/create','UserListingsController@create')->name('user.listings.create');
    Route::get('user/wishlists','UserWishlistsController@index')->name('user.wishlists');
    Route::post('user/listings/add','UserListingsController@store')->name('user.listings.add');
    Route::get('user/manage_profile/{id}','UserManageProfilesController@index')->name('user.manage_profile');
    Route::get('user/booking_request_beauty','UserBookingRequestController@beauty')->name('user.booking.beauty');
    Route::get('user/booking_request_hotel','UserBookingRequestController@hotel')->name('user.booking.hotel');
    Route::get('user/booking_request_restaurant','UserBookingRequestController@restaurant')->name('user.booking.restaurant');
    Route::get('user/packages','UserPricingsController@packages')->name('user.packages');
    Route::get('user/purchase_history','UserPricingsController@purchase_history')->name('user.purchase_history');
    Route::put('user/manage_profile_update/{id}','UserManageProfilesController@update_profile_info')->name('user.manage_profile_id');
    Route::get('user/package_invoice/{id}','UserPricingsController@print_invoice')->name('user.package_invoice');
    Route::get('user/free_package/{request}','PurchasePackage@free')->name('user.purchase_package.free');
    Route::get('user/payment_gateway/{request}','PurchasePackage@paid')->name('user.purchase_package.paid');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
