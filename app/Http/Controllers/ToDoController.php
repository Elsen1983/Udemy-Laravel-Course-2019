<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
class TodoController extends Controller
{
    //
    public function index(){

        //fetching the values from the todos table in database
        $todos = Todo::all();

        // return the view (index.blade.php) from the views/about folder for router AND
        return view('todo.index') ->with('todos', $todos);
    }

    public function show($todoId){
        //dd($todoId);
        $todo = Todo::find($todoId);
        return view('todo.show')->with('todo', $todo);
    }
}
