@extends('layouts.app')
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
                    {{ $todo->id === 1 ? "Yes" : "No" }}
                </div>
            </div>
            <br>
            <h5><a href="/todo">Back to Todos</a></h5>
        </div>
    </div>
</div>
@endsection
