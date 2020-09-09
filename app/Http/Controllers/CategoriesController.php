<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use DB;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param int $category_id
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $page_data['page_name'] = 'categories';
        $page_data['page_title'] ='Categories';
        $categories=Category::orderBy('name','asc')->get();
        $sub_categories=Category::all();
        return view('admin.index',compact(['page_data','categories', 'sub_categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $page_data['page_name'] = 'categories_create';
        $page_data['page_title'] ='Categories';
        $categories=Category::all();
        return view('admin.index', compact(['page_data','categories']));
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

        if(!($request->hasFile('category_thumbnail'))) {
            $request['thumbnail'] = 'thumbnail.png';
        }else {
            $file=$request->file('category_thumbnail');
            $name=time().'.'.$file->getClientOriginalExtension();
            $destinationPath=public_path('uploads/category_thumbnails');
            $file->move($destinationPath,$name);
            $request['thumbnail']=$name;
        }
        Category::create($request->all());

        return redirect(route('categories.index'));
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
        $page_data['page_name'] = 'categories_edit';
        $page_data['page_title'] ='Categories Edit';
        $category_details=Category::find($id);
        $categories=Category::all();
        $category_id=Category::all('id')->find($id);
        return view('admin.index',compact(['page_data','category_details', 'categories','category_id']));

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
        Category::find($id)->delete();
        return redirect(route('categories.index'));
    }
}
