<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index(){

        // return the view (index.blade.php) from the views/contact folder for router
        return view('contact.index');
    }
}
