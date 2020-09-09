<?php

namespace App\Providers;

use App\FrontendSetting;
use App\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $website_details=Setting::all()->keyBy('type')['website_title']->description;
        $setting_cookie=FrontendSetting::all()->keyBy('type')['cookie_status']->description;
        $cookie_note=FrontendSetting::all()->keyBy('type')['cookie_note']->description;
        $currency=Setting::all()->keyBy('type')['system_currency']->description;
        $settings=Setting::all()->keyBy('type');
        View::share('website_title',$website_details);
        View::share('cookie_status',$setting_cookie);
        View::share('cookie_note',$cookie_note);
        View::share('currency',$currency);
        View::share('settings',$settings);
    }
}
