@extends('layouts.app')

@section('title')
    Create Todo
@endsection

@section('content')
    <div class="container">
        <h1 class="text-center my-5">Edit Todo  ({{$todo->name}})</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <!-- <div class="card-header">
                        Edit ToDo
                    </div> -->
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <u class="list-group">
                                    @foreach($errors->all() as $error)
                                        <li class="list-group-item">
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </u>
                            </div>
                        @endif

                        <form action="/todo/{{$todo->id}}/update-todo" method="POST">
                            @csrf
                            <label class="form-check-label py-2 fw-bold" for="name">Name</label>
                            <div class="form-group py-2">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ $todo->name }}">
                            </div>
                            <label class="form-check-label py-2 fw-bold" for="description">Description</label>
                            <div class="form-group py-2">
                                <textarea name="description" id="description" placeholder="Description" cols="5" rows="5" class="form-control" value="">{{ $todo->description }}</textarea>
                            </div>
                            <!-- <div class="form-group py-2"> -->
                            <label class="form-check-label py-2 fw-bold" for="completedSwitch">Completed</label>
                            <div class="form-check form-switch" style="padding-left:0;">
                                @if($todo->completed == 0)
                                    <input class="form-check-input" type="checkbox" name="completed" id="completedSwitch" style="font-size:1.25rem; margin-left:0;">
                                @else
                                    <input class="form-check-input" type="checkbox" name="completed" id="completedSwitch" style="font-size:1.25rem; margin-left:0;" checked>
                                @endif
                            </div>
                            <!-- </div> -->
                            <div class="form-group py-4">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>

                </div>
                <br>
                <h5><a href="/todo">Back to Todos</a></h5>
            </div>
        </div>
    </div>

@endsection
