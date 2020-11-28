@extends('myLayout.app')

@section('content')
<div class="mx-4">
    <h1 class="text-center">{{ $title }}</h1>
    <table class="table table-hover text-center">
        <thead style="background-color: #44C5EC">
          <tr>
            <th>Mark</th>
            <th>Name</th>
            <th>Application Number</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Form Filled</th>
            <th>Verified</th>
            <th>File Created</th>
            <th>Payment</th>
            <th>Email Creation</th>
            <th>Delete</th>
            <th>Edit</th>
            <th>Approximate Wait Time</th>
            <th>Update</th>
          </tr>
        </thead>
        <tbody>
          @php
            $i = 0;   
          @endphp
          @foreach ($names as $key => $row)
              <tr>
                @if($row['form_fill'] == '1' && $row['verified'] == '1' && $row['file_created'] == '1' && $row['payment'] == '1' && $row['email_create'] == '1')
                  <td><i class="fa fa-star" aria-hidden="true"></i></td>
                @else
                  <td><i class="fa fa-star-o" aria-hidden="true"></i></td>
                @endif
                <td>{{ $row['name'] }}</td>
                <td>{{ $row['application_no']}}</td>
                <td>{{ $row['phone_no'] }}</td>
                <td>{{ $row['email'] }}</td>
                @php
                 $i++;  
                @endphp
            <form action="/updating/{{$key}}" method="POST">
                {{-- Hidden Data --}}
                <input type="hidden" name="name" value="{{$row['name']}}">
                <input type="hidden" name="application_no" value="{{$row['application_no']}}">
                <input type="hidden" name="phone_no" value="{{$row['phone_no']}}">
                <input type="hidden" name="email" value="{{$row['email']}}">
                <input type="hidden" name="token" value="{{$key}}">

                  @if($row['form_fill'] == '0')
                    <td><input type="checkbox" name="form_fill" value="1"></td>
                  @else
                    <td><input type="checkbox" name="form_fill" value="1" onclick="return false" checked></td>
                  @endif
                  @if($row['verified'] == '0')
                    <td><input type="checkbox" name="verified" value="1"></td>
                  @else
                    <td><input type="checkbox" name="verified" value="1" onclick="return false" checked></td>
                  @endif
                  @if($row['file_created'] == '0')
                    <td><input type="checkbox" name="file_created" value="1"></td>
                  @else
                    <td><input type="checkbox" name="file_created" value="1" onclick="return false" checked></td>
                  @endif
                  @if($row['payment'] == '0')
                    <td><input type="checkbox" name="payment" value="1"></td>
                  @else
                    <td><input type="checkbox" name="payment" value="1" onclick="return false" checked></td>
                  @endif
                  @if($row['email_create'] == '0')
                    <td><input type="checkbox" name="email_create" value="1"></td>
                  @else
                    <td><input type="checkbox" name="email_create" value="1" onclick="return false" checked></td>
                  @endif
                
                <td><a href="/deleting/{{$key}}" type="submit" style="color:#044BD9;" class=""><i class="fa fa-trash fa-lg icon" aria-hidden="true" class = "icon"></i></a></td>
                <td><a href="/editing/{{$key}}" type="submit" style="color:#044BD9;" class=""><i class="fa fa-edit fa-lg icon" aria-hidden="true" class = "icon"></i></a></td>
                
                <td>{{ $i * 5 }} minutes</td>
                <td><input type="submit" class="btn btn-sm btn-primary" value = "Update"></td>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
          </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
