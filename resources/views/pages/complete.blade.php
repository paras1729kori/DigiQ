@extends('myLayout.app')

@section('content')
<div class="mx-4">
    <h1 class="text-center">{{ $title }}</h1>
    <table class="table table-hover text-center">
        <thead style="background-color: #44C5EC">
          <tr>
            <th>Name</th>
            <th>Application Number</th>
            <th>Phone Number</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($names as $key => $row)
                    @if($row['form_fill'] == '1' && $row['verified'] == '1' && $row['file_created'] == '1' && $row['payment'] == '1' && $row['email_create'] == '1')
                        <td>{{ $row['name'] }}</td>
                        <td>{{ $row['application_no']}}</td>
                        <td>{{ $row['phone_no'] }}</td>
                        <td>{{ $row['email'] }}</td> 
                    @endif
                @endforeach
            </tr>
        </tbody>
    </table>
</div>
@endsection
