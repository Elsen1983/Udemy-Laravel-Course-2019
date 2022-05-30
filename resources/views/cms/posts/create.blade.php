@extends('layouts.app')

@section('title')
    {{ isset($post) ? 'Edit Post' : 'Create Post' }}
@endsection

@section('content')
    <div class="container">
        <h1 class="text-center my-3">{{ isset($post) ? 'Edit Post ( ' . $post->name . ' )' : __('Create Post') }}</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card card-default">
                        <div class="card-header">{{ isset($post) ? __('Edit Post') : __('Create New Post') }}</div>
                    <div class="card-body">
                        <!-- Form Start -->
                        <form action=' {{ isset($post) ? route("posts.update", $post) : route("posts.store") }}'
                                method="POST">
                            @csrf
                            <!-- IMPORTANT TO USE THE WAY BELOW FOR CHANGE THE TYPE OF THE METHOD OF THE FORM INSTEAD USE INLINE CODE LIKE FOR ACTION='' -->
                            @if(isset($post))
                                @method('PUT')
                            @endif
                            <div class="form-group">
                                <label for="post_name">{{ __('Name') }}</label>
                                <input type="text" class="form-control" id="post_name" name="name" value="{{ isset($post) ? __($post->name) : '' }}">
                            </div>
                            <div class="form-group">
                                <div class="my-2">
                                    <button class="btn btn-success">{{ isset($post) ? __('Update Post') : __('Add Post') }}</button>
                                </div>
                            </div>
                        </form>
                        <!-- Form End -->

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
