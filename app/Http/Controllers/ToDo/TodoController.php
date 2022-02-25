<?php

namespace App\Http\Controllers\ToDo;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

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

    public function create(){
        return view('todo.create');

    }

    public function save(){

        $this->validate(request(), [
            'name'=>'required|min:6|max:12',
            'description'=>'required'
        ]);

        $data = request()->all();

        //create a new Todo, and assign all the data from the request into that
        //must match all the columns in the db table
        $todo = new Todo();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = 0;

        // dd($todo->all());

        //finally we save them into the database
        $todo->save();
        // dd($todo);

        // redirect the route back to the todo view/page
        return redirect('/todo');

    }
}
