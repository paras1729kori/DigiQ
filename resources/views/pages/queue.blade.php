@extends('myLayout.app')

@section('content')
<div class="mx-4">
    <h1 class="text-center">{{ $title }}</h1>
    <table class="table table-hover text-center">
        <thead style="background-color: #44C5EC">
          <tr>
            <th>Mark</th>
            <th>Sr. No.</th>
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
          {{-- For printing Serial Number and not ID number --}}
          {{-- We are using for loop instead of foreach --}}
          @for ($i = 0; $i < count($names); $i++)
            <tr>
              @if($names[$i]->form_fill == '1' && $names[$i]->verified == '1' && $names[$i]->file_created == '1' && $names[$i]->payment == '1' && $names[$i]->email_create == '1')
                <td><i class="fa fa-star" aria-hidden="true"></i></td>
              @else
                <td><i class="fa fa-star-o" aria-hidden="true"></i></td>
              @endif
              <td scope="row">{{$i+1}}</td>
              <td>{{$names[$i]->name}}</td>
              <td>{{$names[$i]->application_no}}</td>
              <td>{{$names[$i]->phone_no}}</td>
              <td>{{$names[$i]->email}}</td>
            <form action="/updating/{{$i+1}}" method="POST">
              
              @if($names[$i]->form_fill == '0')
                <td><input type="checkbox" name="form_fill" value="1"></td>
              @else
                <td><input type="checkbox" name="form_fill" value="1" onclick="return false" checked></td>
              @endif
              @if($names[$i]->verified == '0')
                <td><input type="checkbox" name="verified" value="1"></td>
              @else
                <td><input type="checkbox" name="verified" value="1" onclick="return false" checked></td>
              @endif
              @if($names[$i]->file_created == '0')
                <td><input type="checkbox" name="file_created" value="1"></td>
              @else
                <td><input type="checkbox" name="file_created" value="1" onclick="return false" checked></td>
              @endif
              @if($names[$i]->payment == '0')
                <td><input type="checkbox" name="payment" value="1"></td>
              @else
                <td><input type="checkbox" name="payment" value="1" onclick="return false" checked></td>
              @endif
              @if($names[$i]->email_create == '0')
                <td><input type="checkbox" name="email_create" value="1"></td>
              @else
                <td><input type="checkbox" name="email_create" value="1" onclick="return false" checked></td>
              @endif
                
              {{-- <td><button><i class="fa fa-trash fa-lg icon" aria-hidden="true" class = "icon"></i></button></td>
              <td><button><i class="fa fa-edit fa-lg icon" aria-hidden="true" class = "icon"></i></button></td> --}}
              <td><a href="/deleting/{{$i+1}}" type="submit" style="color:#044BD9;" class=""><i class="fa fa-trash fa-lg icon" aria-hidden="true" class = "icon"></i></a></td>
              <td><a href="/editing/{{$i+1}}" type="submit" style="color:#044BD9;" class=""><i class="fa fa-edit fa-lg icon" aria-hidden="true" class = "icon"></i></a></td>
              <td>{{ $i * 5 + 5 }} minutes</td>
              <td><input type="submit" class="btn btn-sm btn-primary" value = "Update"></td>
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
            </tr>
           @endfor
        </tbody>
      </table>
</div>
@endsection
