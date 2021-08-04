@extends('layout')


@section('content')
<h2>Add restaurants</h2>

<form method="POST" action="/add">
    @csrf
    <div class="col-sm-6">
        <div class="form-group">
            <label for="exampleInputEmail1">Restaurant Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" placeholder="Restaurant name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email ID</label>
            <input type="email" class="form-control" id="exampleInputPassword1" name="email" placeholder="Email ID">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="address" placeholder="Address">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@stop