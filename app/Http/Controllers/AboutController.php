<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function index(){

        // return the view (index.blade.php) from the views/about folder for router
        return view('about.index');
    }
}
