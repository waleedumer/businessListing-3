<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class FrontendBlogsController extends Controller
{
    //
    public function index(){
        $page_data=['page_name'=>'blogs', 'page_title'=>'Post'];
        $blogs=Blog::paginate(5);
//        $blogs=Blog::all();
//        dd($blogs);
        $latest_posts=Blog::all()->sortByDesc('updated_at');
        $blogs_categories=Blog::all();
        return view('frontend.index',compact(['page_data','latest_posts','blogs','blogs_categories']));
    }
}
