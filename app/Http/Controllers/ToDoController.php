<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToDoController extends Controller
{
    //
    public function index(){

        // return the view (index.blade.php) from the views/todo folder for router
        return view('todo.index');
    }
}
