@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="text-center my-5">ToDo Page</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        Todos
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($todos as $todo)
                                <li class="list-group-item">
                                    {{ $todo->name }}
                                    <a href="/todo/{{ $todo->id }}" class="btn btn-primary btn-small p-1" style="float:right;">View</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <br>
                <h5 class=""><a href="/">Landing Page</a></h5>
            </div>
        </div>
    </div>

@endsection
