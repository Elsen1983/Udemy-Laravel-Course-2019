<?php

namespace App\Http\Controllers\CMS;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fetching the values from the posts table in database
        $posts = Post::all();

        // return the posts view (index.blade.php) from the views folder for router AND all posts from database
        return view('cms.posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.posts.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        //  upload the image to the public storage
        //  with ['disk' => 'public'] we point to public folder in the filesystem config file, so we DO NOT have to change the FILESYSTEM-DRIVER to public anymore
        $image = $request->image->store('posts', ['disk' => 'public']);

        // dd($request->image);
        //  create the post (do not forget add protected fillable array into the Post model)
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $image,
            'published_at' => $request->published_at
        ]);

        //  send a flash message to front-end when the save operation is done
        $message = 'Post (' . $request->title . ') created successfully.';
        session()->flash('success', $message);

        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //  instead of creating/using a new view (like did for ToDos) for edit posts we return the create view
        //  and passing a named argument (the currently selected post itself) to this view
        return view('cms.posts.create')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\Posts\UpdatePostRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $postNameOld = $post->title;

        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $request->image,
            'published_at' => $request->published_at
        ]);

        $post->save();

        //  send a flash message to front-end when the save operation is done
        $message = 'Post updated ( from ' .$postNameOld . ' to ' . $request->title . ' ) successfully.';
        session()->flash('success', $message);

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        Log::debug($post);
         //delete the selected category from the database by delete() method
         $post->delete();

         //  send a flash message to front-end when the delete operation is done
         $message = 'Post (' . $post->title . ') deleted successfully.';
         session()->flash('success', $message);

         return redirect()->back();
    }
}
