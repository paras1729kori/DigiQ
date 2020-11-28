@extends('myLayout.app')

@section('content')
<div class="mx-4">
    <h1 class="text-center">{{ $title }}</h1>
    <form action="/updating/{{$id}}" method="POST" class="mx-5">
      <input type="hidden" name="token" value="{{$token}}">
        <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" name="name" class="form-control form-control-sm" value="{{$data['name']}}" id="Name" placeholder="name">
          </div>
          <div class="form-group">
            <label for="Application Number">Application Number</label>
            <input type="text" name="application_no" class="form-control form-control-sm" value="{{$data['application_no']}}" id="Application Number" placeholder="application number">
          </div>
          <div class="form-group">
            <label for="Phone Number">Phone Number</label>
            <input type="text" name="phone_no" class="form-control form-control-sm" value="{{$data['phone_no']}}" id="Phone Number" placeholder="phone number">
          </div>
          <div class="form-group">
            <label for="Email ID">Email ID</label>
            <input type="text" name="email" class="form-control form-control-sm" value="{{$data['email']}}" id="Email ID" placeholder="email id">
          </div>

          <input type="submit" name="Update_Details" value="Update" class="btn btn-primary">
          <a href="/queue" class="btn btn-danger">Cancel</a>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
</div>
@endsection
