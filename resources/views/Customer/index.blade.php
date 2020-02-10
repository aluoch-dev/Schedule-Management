@extends('layouts.main')

@section('content')

<ol class="breadcrumb">
    <li class="breadcrumb-item">
    <a>CSM</a>
    </li>
    <li class="breadcrumb-item active">Customers</li>
</ol>

  <div>
    @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}  
      </div><br />
    @endif
    <table class="table table-striped">
      <thead>
          <tr>
            <td>ID</td>
            <td>Customer's Name</td>
            <td>Email</td>
            <td>Mobile Number</td>
            <td align="center" >Action</td>
          </tr>
      </thead>
      <tbody>
          @foreach($appointments as $appointment)
            <tr>
                <td>{{$appointment->id}}</td>
                <td>{{$appointment->customer_name}}</td>
                <td>{{$appointment->email}}</td>
                <td>{{$appointment->mobile_no}}</td>
                <td><a href="{{ route('customers.edit',$appointment->id)}}" class="btn btn-primary"><i class="fa fa-eye">View Details</i></a></td>
            </tr>
          @endforeach
      </tbody>
    </table>
  </div>
@endsection
        