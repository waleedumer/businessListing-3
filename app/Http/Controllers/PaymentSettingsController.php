<?php

namespace App\Http\Controllers;

use App\Currency;
use App\Setting;
use Illuminate\Http\Request;

class PaymentSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $paypal_supported_currencies=Currency::all()->where('paypal_supported',1);
        $stripe_supported_currencies=Currency::all()->where('stripe_supported',1);
        $website_details=Setting::all()->keyBy('type');
        $currencies=Currency::all();
        $page_data=['page_name'=>'payment_settings','page_title'=>'Payment Settings'];
        return view('admin.index',compact(['page_data','currencies','website_details','paypal_supported_currencies','stripe_supported_currencies']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function system_currency_settings(Request $request)
    {
        $request=$request->toArray();

        foreach ($request as $key=>$eachRequest){
            Setting::where('type', $key)->update(['description' => $eachRequest]);
        }
        return redirect(route('payment_settings.index'));
    }
    public function paypal_settings(Request $request)
    {
        $request=$request->toArray();

        foreach ($request as $key=>$eachRequest){
            Setting::where('type', $key)->update(['description' => $eachRequest]);
        }
        return redirect(route('payment_settings.index'));
    }
    public function stripe_settings(Request $request)
    {
        $request=$request->toArray();

        foreach ($request as $key=>$eachRequest){
            Setting::where('type', $key)->update(['description' => $eachRequest]);
        }
        return redirect(route('payment_settings.index'));
    }
}
