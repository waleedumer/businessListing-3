<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $page_data=['page_name'=>'users','page_title'=>'Users'];
        $users=User::all();
        return view('admin.index',compact(['page_data','users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $page_data=['page_name'=>'users_create','page_title'=>'Create Users'];
        return view('admin.index', compact('page_data'));
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
        if(!($request->hasFile('photo'))) {
            $request['photo'] = 'user.png';
        }else {
            $file=$request->file('photo');
            $name=time().'.'.$file->getClientOriginalExtension();
            $destinationPath=public_path('uploads/user_image');
            $file->move($destinationPath,$name);
            $request['photo']=$name;
        }
        $request['password']=bcrypt($request['password']);
        User::create($request->all());
        return(redirect(route('users.index')));
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
        $page_data=['page_name'=>'users_edit','page_title'=>'Edit Users'];
        $user_details=User::find($id);
        return view('admin.index', compact(['page_data','user_details']));
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
        if(!($request->hasFile('photo'))) {
            $request['photo'] = 'user.png';
        }else {
            $file=$request->file('photo');
            $name=time().'.'.$file->getClientOriginalExtension();
            $destinationPath=public_path('uploads/user_image');
            $file->move($destinationPath,$name);
            $request['photo']=$name;
        }
        $request['password']=bcrypt($request['password']);
        User::find($id)->update($request->all());
        return(redirect(route('users.index')));

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
        User::find($id)->forceDelete();
        Blog::where('user_id',$id)->forceDelete();
        return redirect(route('users.index'));
    }
}
