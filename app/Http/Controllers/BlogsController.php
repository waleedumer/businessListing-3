<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $page_data['page_name']='blogs';
        $page_data['page_title']='Blogs';
        $blogs=Blog::all();
        return view('admin.index',compact(['page_data','blogs']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $page_data['page_name']='blogs_create';
        $page_data['page_title']='Create Blogs';
        $categories=Category::all();
        return view('admin.index',compact(['page_data','categories']));
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


        if(!($request->hasFile('blog_thumbnail'))&&!($request->hasFile('blog_cover')))
        {
            $request['blog_thumbnail'] = 'thumbnail.png';
            $request['blog_cover']='thumbnail.png';
        }
        elseif($request->hasFile('blog_thumbnail')&&!($request->hasFile('blog_cover')))
        {
            $file_blog_thumbnail=$request->file('blog_thumbnail');
            $name_thumbnail='thumbnail'.time().'.'.$file_blog_thumbnail->getClientOriginalExtension();
            $destinationPath=public_path('uploads/blog_thumbnails');
            $file_blog_thumbnail->move($destinationPath,$name_thumbnail);
            $request['blog_thumbnail']=$name_thumbnail;
            $request['blog_cover']='thumbnail.png';
        }elseif(!($request->hasFile('blog_thumbnail'))&&($request->hasFile('blog_cover'))){
            $file_cover_thumbnail=$request->file('blog_thumbnail');
            $name_cover='cover'.time().'.'.$file_cover_thumbnail->getClientOriginalExtension();
            $destinationPath=public_path('uploads/blog_thumbnails');
            $file_cover_thumbnail->move($destinationPath,$name_cover);
            $request['blog_cover']=$name_cover;
            $request['blog_thumbnail']='thumbnail.png';
        }
        else {
            $file_blog_thumbnail=$request->file('blog_thumbnail');
            $name_thumbnail='thumbnail'.time().'.'.$file_blog_thumbnail->getClientOriginalExtension();
            $destinationPath=public_path('uploads/blog_thumbnails');
            $file_blog_thumbnail->move($destinationPath,$name_thumbnail);
            $request['blog_thumbnail']=$name_thumbnail;
            $file_cover_thumbnail=$request->file('blog_thumbnail');
            $name_cover='cover'.time().'.'.$file_cover_thumbnail->getClientOriginalExtension();
            $destinationPath=public_path('uploads/blog_thumbnails');
            $file_cover_thumbnail->move($destinationPath,$name_cover);
            $request['blog_cover']=$name_cover;
        }
        Blog::create($request->all());
        return redirect(route('blogs.index'));
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
        $page_data['page_name']='blogs_edit';
        $page_data['page_title']='Edit Blogs';
        $blog=Blog::find($id);
        $categories=Category::all();
        return view('admin.index',compact(['page_data','blog','categories']));
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
        if(!($request->hasFile('blog_thumbnail'))&&!($request->hasFile('blog_cover')))
        {
            $request['blog_thumbnail'] = 'thumbnail.png';
            $request['blog_cover']='thumbnail.png';
        }
        elseif($request->hasFile('blog_thumbnail')&&!($request->hasFile('blog_cover')))
        {
            $file_blog_thumbnail=$request->file('blog_thumbnail');
            $name_thumbnail='thumbnail'.time().'.'.$file_blog_thumbnail->getClientOriginalExtension();
            $destinationPath=public_path('uploads/blog_thumbnails');
            $file_blog_thumbnail->move($destinationPath,$name_thumbnail);
            $request['blog_thumbnail']=$name_thumbnail;
            $request['blog_cover']='thumbnail.png';
        }elseif(!($request->hasFile('blog_thumbnail'))&&($request->hasFile('blog_cover'))){
            $file_cover_thumbnail=$request->file('blog_thumbnail');
            $name_cover='cover'.time().'.'.$file_cover_thumbnail->getClientOriginalExtension();
            $destinationPath=public_path('uploads/blog_thumbnails');
            $file_cover_thumbnail->move($destinationPath,$name_cover);
            $request['blog_cover']=$name_cover;
            $request['blog_thumbnail']='thumbnail.png';
        }
        else {
            $file_blog_thumbnail=$request->file('blog_thumbnail');
            $name_thumbnail='thumbnail'.time().'.'.$file_blog_thumbnail->getClientOriginalExtension();
            $destinationPath=public_path('uploads/blog_thumbnails');
            $file_blog_thumbnail->move($destinationPath,$name_thumbnail);
            $request['blog_thumbnail']=$name_thumbnail;
            $file_cover_thumbnail=$request->file('blog_thumbnail');
            $name_cover='cover'.time().'.'.$file_cover_thumbnail->getClientOriginalExtension();
            $destinationPath=public_path('uploads/blog_thumbnails');
            $file_cover_thumbnail->move($destinationPath,$name_cover);
            $request['blog_cover']=$name_cover;
        }
        Blog::find($id)->update($request->all());
        return redirect(route('blogs.index'));

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
        Blog::find($id)->forceDelete();
        return redirect(route('blogs.index'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function set_status($id,Request $request){
        $status=$request->status;
        Blog::find($id)->update(['status'=>$status]);
        return(redirect(route('blogs.index')));
    }
}
