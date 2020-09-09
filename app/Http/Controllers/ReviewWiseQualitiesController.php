<?php

namespace App\Http\Controllers;

use App\ReviewWiseQuality;
use Illuminate\Http\Request;

class ReviewWiseQualitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $page_data=['page_name'=>'rating_wise_quality','page_title'=>'Rating Wise Quality'];
        $qualities=ReviewWiseQuality::all();
        return view('admin.index',compact(['page_data','qualities']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $page_data=['page_name'=>'rating_wise_quality_create','page_title'=>'Rating Wise Quality'];
        return view('admin.index',compact(['page_data']));
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
        $page_data=['page_name'=>'rating_wise_quality_edit','page_title'=>'Rating Wise Quality'];
        $edit_data=ReviewWiseQuality::find($id);
//        dd($edit_data);
        return view('admin.index',compact(['page_data','edit_data']));
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
        ReviewWiseQuality::find($id)->forceDelete();
        return redirect(route('review_wise_quality.index'));
    }
}
