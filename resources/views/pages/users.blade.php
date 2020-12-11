@extends('myLayout.app')

@section('content')
<div class="mx-4">
    <h1 class="text-center">{{ $title }}</h1>
    @if(count($users) > 0)
    <table class="table table-hover text-center">
        <thead style="background-color: #44C5EC">
          <tr>
            <th>Name</th>
            <th>Identity Number</th>
            <th>Role</th>
            <th>Login Time</th>
            <th>Logout Time</th>
          </tr>
        </thead>
        <tbody>
          {{-- For printing Serial Number and not ID number --}}
          {{-- We are using for loop instead of foreach --}}
          @foreach ($users as $user)
            <tr>
              <td>{{ $user->name }}</td>
              <td>1324654321</td>
              @if($user->controller == '0')
                  <td>User</td>
              @else
                  <td>Admin</td>
              @endif
              <td>
                @if($user->created_at == null)
                  <p>--------</p>
                @else
                  {{$user->created_at}}
                @endif
              </td>
              <td>
                @if($user->updated_at == null)
                  <p>--------</p>
                @else
                  {{$user->updated_at}}
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <h4 class="text-center">No Admins added yet</h4>
    @endif
</div>
@endsection
