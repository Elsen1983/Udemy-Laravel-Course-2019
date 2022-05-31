@extends('layouts.app')

@section('title')
    Posts
@endsection

@section('content')
    <div class="container">
        <h1 class="text-center my-3">Posts</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card card-default">
                    <div class="card-header">{{ __('Posts') }}</div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($posts as $post)
                                <li class="list-group-item d-flex justify-content-between">
                                    <span class="py-2">{{ $post->title }}</span>
                                    <div id="post_btns">
                                        <a href='{{ route("posts.edit", $post) }}' class="btn btn-primary">Edit</a>
                                        <button class="btn btn-danger" onclick="handleDelete( '{{ $post->id }}', '{{ $post->title }}','deletePostModal', 'deletePostName', 'deletePostForm',  'posts' )">Delete</button>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="d-flex justify-content-start mt-2">
                    <a href='{{ route("posts.create")}}' class="btn btn-success"> Add New Post</a>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="deletePostModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deletePostLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form action="" method="POST" id="deletePostForm">
                    @method('DELETE')
                    @csrf
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deletePostLabel">Delete Post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete <strong id="deletePostName"></strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Delete</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

{{-- custom scripts --}}
@section('scripts')
<script>
</script>
@endsection


