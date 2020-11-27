@extends('myLayout.app')

@section('content')
<div class="mx-4">
    <h1 class="text-center">{{ $title }}</h1>
    <form action="/updating/{{$id}}" method="POST" class="mx-5">
        <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" class="form-control form-control-sm" id="Name" placeholder="name">
          </div>
          <div class="form-group">
            <label for="Application Number">Application Number</label>
            <input type="text" class="form-control form-control-sm" id="Application Number" placeholder="application number">
          </div>
          <div class="form-group">
            <label for="Phone Number">Phone Number</label>
            <input type="text" class="form-control form-control-sm" id="Phone Number" placeholder="phone number">
          </div>
          <div class="form-group">
            <label for="Email ID">Email ID</label>
            <input type="text" class="form-control form-control-sm" id="Email ID" placeholder="email id">
          </div>

          <input type="submit" value="Update" class="btn btn-primary">
    </form>
</div>
@endsection
