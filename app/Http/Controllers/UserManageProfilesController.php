<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserManageProfilesController extends Controller
{
    //
    public function index($id){
        $page_data=['page_name'=>'manage_profile','page_title'=>'Manage Profile'];
        $user_info=User::find($id);
        return view('admin.index',compact(['page_data','user_info']));
    }
    public function update_profile_info($id, Request $request){
        User::find($id)->update($request->all());
        $page_data=['page_name'=>'manage_profile','page_title'=>'Manage Profile'];
        return redirect(route('user.manage_profile',$id));
    }
    public function update_password($id, Request $request){
        User::find($id)->update(['password'=>$request['password']]);
        return redirect(route('user.manage_profile',$id));
    }
}
