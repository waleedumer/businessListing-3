<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\Http\Requests\CitiesRequest;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cities=City::all();
        $page_data['page_name']='cities';
        $page_data['page_title']='Cities';
        $country_details=City::all();
        return view('admin.index',compact(['page_data','cities','country_details','cities']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $page_data['page_name']='cities_create';
        $page_data['page_title']='Create Cities';
        $countries=Country::all()->pluck('name','id')->toArray();
        return view('admin.index', compact(['page_data','countries']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CitiesRequest $request)
    {
        //
        City::create($request->all());
        return redirect(route('cities.index'));
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
        $page_data['page_name']='cities_edit';
        $page_data['page_title']='Edit Cities';
        $city_details=City::find($id);
        $countries=Country::all()->pluck('name','id')->toArray();
        return view('admin.index',compact(['page_data','city_details','countries']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CitiesRequest $request, $id)
    {
        //
        City::find($id)->update($request->all());
        return redirect(route('cities.index'));
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
        City::find($id)->forceDelete();
        return redirect(route('cities.index'));
    }
}
