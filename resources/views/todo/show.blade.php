@extends('layouts.app')

@section('title')
    Todo:  {{ $todo->name }}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-left pt-5">{{ $todo->name }}</h2>
            <div class="card card-default">
                <div class="card-header">
                    Details
                </div>
                <div class="card-body">
                    {{ $todo->description}}
                </div>
            </div>
            <div class="card card-default">
                <div class="card-header">
                    Completed
                </div>
                <div class="card-body">
                    {{ $todo->completed === 1 ? "Yes" : "No" }}
                </div>
            </div>
            <a href="/todo/{{ $todo->id }}/edit" class="btn btn-info px-4 py-2 mt-2">Edit</a>
            <a href="/todo/{{ $todo->id }}/delete" class="btn btn-danger px-4 py-2 mt-2">Delete</a>
            <br><br>
            <h5><a href="/todo">Back to Todos</a></h5>
        </div>
    </div>
</div>
@endsection
