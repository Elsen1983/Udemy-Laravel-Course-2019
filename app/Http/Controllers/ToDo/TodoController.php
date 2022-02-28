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
        $todo = Todo::find($todoId);
        return view('todo.show')->with('todo', $todo);
    }

    public function create(){
        return view('todo.create');

    }

    public function save(){

        $this->validate(request(), [
            'name'=>'required|min:6|max:24',
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

    public function edit($todoId){
        //find the specific data in the database (using the passed $todoId for it) by find() method
        $todo = Todo::find($todoId);
        return view('todo.edit')->with('todo', $todo);
    }

    //Update function for form elements
    //$todoId is passed trough the request
    public function update($todoId){
        //validate the form elements data
        $this->validate(request(), [
            'name'=>'required|min:6|max:24',
            'description'=>'required'
        ]);
        //get the validated data from the form
        $data = request()->all();

        //find the specific data in the database (using the passed $todoId for it) by find() method
        $todo = Todo::find($todoId);

        //change the selected fields values from the database by the values got from the form
        $todo->name = $data['name'];
        $todo->description = $data['description'];

        //save the updated data back to the database
        $todo->save();

        //redirect the page to todo-page
        return redirect('/todo');
    }
}
