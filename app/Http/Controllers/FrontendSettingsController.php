<?php

namespace App\Http\Controllers;

use App\FrontendSetting;
use Illuminate\Http\Request;

class FrontendSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $page_data=['page_name'=>'frontend_settings','page_title'=>'Frontend Settings'];
        $website_details=FrontendSetting::all()->keyBy('type');
        return view('admin.index',compact(['page_data','website_details']));
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
        $request=$request->toArray();

        foreach ($request as $key=>$eachRequest){
            FrontendSetting::where('type', $key)->update(['description' => $eachRequest]);
        }
        return redirect(route('frontend_settings.index'));
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
    public function banner_image(){

    }
    public function light_logo(){

    }
    public function dark_logo(){

    }
    public function small_logo(){

    }
    public function favicon(){

    }
}
