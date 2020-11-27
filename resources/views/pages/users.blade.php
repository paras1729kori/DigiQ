@extends('myLayout.app')

@section('content')
<div class="mx-4">
    <h1 class="text-center">{{ $title }}</h1>
    <table class="table table-hover text-center">
        <thead style="background-color: #44C5EC">
          <tr>
            <th>Sr. No.</th>
            <th>Name</th>
            <th>Identity Number</th>
            <th>Login Time</th>
            <th>Logout Time</th>
          </tr>
        </thead>
        <tbody>
          {{-- For printing Serial Number and not ID number --}}
          {{-- We are using for loop instead of foreach --}}
          @for ($i = 0; $i < count($users); $i++)
            <tr>
              <th scope="row">{{$i+1}}</th>
              <td>{{$users[$i]->name}}</td>
              <td>1315646486</td>
              <td>11:22:33</td>
              <td>13:24:56</td>
            </tr>
          @endfor
        </tbody>
      </table>
</div>
@endsection
