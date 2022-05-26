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

        return view('todo.index');
    }

    //in this function we used route model binding
    //we not passing $todoId anymore (like in other functions)
    //Laravel gives us the data from database by passing 'Todo $todo' as a parameter into the function where dynamic route was used
    //so we do not need to use 'Todo::find($todoId) ...etc anymore
    public function show(Todo $todo){

        return view('todo.show')->with('todo', $todo);
    }

    public function create(){
        return view('todo.create');

    }

    public function showAll(){
        //fetching the values from the todos table in database
        $todos = Todo::all();

        // return the view (index.blade.php) from the views folder for router AND all todo from database
        return view('todo.view') ->with('todos', $todos);
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

        //  send a flash message to front-end when the save operation is done
        $message = 'Todo (' . $todo->name . ') saved successfully.';
        session()->flash('success', $message);
        // dd($todo);

        // redirect the route back to the todo view/page
        return redirect('/todos');

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

        //if the 'completed' toggle-switch is switched on
        if (request()->has('completed')) {
            $data['completed'] = 1;
        }
        // else if the 'completed' toggle-switch is switched off
        else{
            $data['completed'] = 0;
        }

        //find the specific data in the database (using the passed $todoId for it) by find() method
        $todo = Todo::find($todoId);

        //change the selected fields values from the database by the values got from the form
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = $data['completed'];


        //save the updated data back to the database
        $todo->save();

        //  send a flash message to front-end when the update+save operations are done
        $message = 'Todo (' . $todo->name . ') updated successfully.';
        session()->flash('success', $message);

        //redirect the page to todo-page
        return redirect('/todos');
    }

    public function destroy($todoId){

        //find the specific data in the database (using the passed $todoId for it) by find() method
        $todo = Todo::find($todoId);

        //delete the selected todo from the database by delete() method
        $todo->delete();

        //redirect the page to todo-page
        return redirect('/todos');
    }

    public function destroyWithRouteModelBinding(Todo $todo){

        //delete the selected todo from the database by delete() method
        $todo->delete();

        //  send a flash message to front-end when the update+save operations are done
        $message = 'Todo (' . $todo->name . ') deleted successfully.';
        session()->flash('success', $message);

        //redirect the page to todo-page
        return redirect('/todos');
    }
}
