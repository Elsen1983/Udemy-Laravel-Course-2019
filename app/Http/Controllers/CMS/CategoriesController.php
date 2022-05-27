<?php

namespace App\Http\Controllers\CMS;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoryRequest;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fetching the values from the todos table in database
        $categories = Category::all();

        // return the categories view (index.blade.php) from the views folder for router AND all categories from database
        return view('cms.categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Categories\CreateCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request){
        //  validation is moved to CreateCategoryRequest rules() method
        Category::create([
            'name' => $request->name
        ]);

        //  send a flash message to front-end when the save operation is done
        $message = $message = 'Category (' . $request->name . ') created successfully.';
        session()->flash('success', $message);

        return redirect(route('categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Log::debug('blaaaa');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //  instead of creating/using a new view (like did for ToDos) for edit category we return the create view
        //  and passing a named argument (the currently selected category itself) to this view
        return view('cms.categories.create')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        Log::debug('Update called');
        Log::debug($category);
        $category->name = $request->name;

        $category->save();

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // Log::debug('destroy called');
        // Log::debug($category);
        //delete the selected category from the database by delete() method
        $category->delete();

        //  send a flash message to front-end when the delete operation is done
        $message = 'Category (' . $category->name . ') deleted successfully.';
        session()->flash('success', $message);

        return redirect()->back();
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function doSomething($id)
    {
        //
    }
}
