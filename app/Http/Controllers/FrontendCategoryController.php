<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class FrontendCategoryController extends Controller
{
    //
    public function index(){
        $page_data=['page_name'=>'categories', 'page_title'=>'Categories'];
        $categories=Category::all();
        $sub_categories=Category::where('parent','>',0)->get();
        return view('frontend.index',compact(['page_data','categories','sub_categories']));
    }
}
