<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class FrontendFooterController extends Controller
{
    //
    public function index(){
        $categories=Category::paginate(6);
    }
}
