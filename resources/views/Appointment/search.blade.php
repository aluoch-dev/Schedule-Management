@extends('layouts.main')

@section('content')
<!-- Breadcrumbs-->
    <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <a>CSM</a>
            </li>
            <li class="breadcrumb-item active">Search results</li>
    </ol>

    <div class="container">
            @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}  
            </div><br />
            @endif

            @if(isset($details))
                <p> The Search results for your query <b> {{ $q }} </b> are :</p>
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>Customer's Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>System</th>
                                <th>Task</th>
                                <th>Appointment Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($details as $appointment)
                                <tr>
                                    <td>{{$appointment->customer_name}}</td>
                                    <td>{{$appointment->address}}</td>
                                    <td>{{$appointment->email}}</td>
                                    <td>{{$appointment->mobile}}</td>
                                    <td>{{$appointment->system}}</td>
                                    <td>{{$appointment->task}}</td>
                                    <td>{{$appointment->appointment_date}}</td>
                                    <td>{{$appointment->task_status}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            @endif
    </div>
@endsection
