@extends('layout')


@section('content')
<h2>Updating restaurants</h2>
@if(Session::get('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{Session::get('status')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<form method="POST" action="/edit">
    @csrf
    <div class="col-sm-6">
        <input type="hidden" name="id" value="{{$data['id']}}"/>
        <div class="form-group">
            <label for="exampleInputEmail1">Restaurant Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{$data['name']}}" aria-describedby="emailHelp" placeholder="Restaurant name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email ID</label>
            <input type="email" class="form-control" id="exampleInputPassword1" name="email" value="{{$data['email']}}" placeholder="Email ID">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="address" value="{{$data['address']}}" placeholder="Address">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@stop