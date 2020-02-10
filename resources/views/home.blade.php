@extends('layouts.main')

@section('content')

<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
    <a>CSM</a>
    </li>
    <li class="breadcrumb-item active">Appointments</li>
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
            <td>Customer name</td>
            <td>Address</td>
            <td>Email</td>
            <td>Mobile Number</td>
            <td>System</td>
            <td>Task</td>
            <td>Appointment Date</td>
            <td>Task Status</td>
            <td colspan="2" align="center">Action</td>
          </tr>
      </thead>
      <tbody>
          @foreach($appointments as $appointment)
            <tr>
                <td>{{$appointment->id}}</td>
                <td>{{$appointment->customer_name}}</td>
                <td>{{$appointment->address}}</td>
                <td>{{$appointment->email}}</td>
                <td>{{$appointment->mobile_no}}</td>
                <td>{{$appointment->system}}</td>
                <td>{{$appointment->task}}</td>
                <td>{{$appointment->appointment_date}}</td>
                <td>{{$appointment->task_status}}</td>
                <td><a href="{{ route('appointments.show',$appointment->id)}}" class="btn btn-info">Assign</a></td>
                <td><a href="{{ route('appointments.edit',$appointment->id)}}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{ route('appointments.destroy', $appointment->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
          @endforeach
      </tbody>
    </table>
  </div>
@endsection
        