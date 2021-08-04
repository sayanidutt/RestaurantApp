@extends('layout')


@section('content')
<h1>Welcome to Restro App</h1>

@if(Session::get('status'))

<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{Session::get('status')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="container">
<h2><b><i>Hello {{session('user')}}</i></b></h2>
</div>

<a href="/list" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">List</a>
<a href="/add" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Add</a>


<div class="container"><h4>Click <a href="/logout">Logout</a> for logging out</h4></div>
@endif

@stop