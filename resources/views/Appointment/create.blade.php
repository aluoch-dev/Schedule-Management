@extends('layouts.render')

@section('content')

  <body class="bg-dark">

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Register Appointment</div>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="POST" action="{{ route('appointments.store') }}">
                @csrf

                <div class="form-group">
                    <div class="form-label-group">
                        <p>Full Name: </p><input type="text" id="inputName" name="customer_name" class="form-control"  placeholder="Input Customer's full name" required="required" autofocus="autofocus">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <p>Address/Location: </p><input type="text" id="input address" name="address" class="form-control"  placeholder="Address/Location" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <p>Email address: </p><input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <p>Mobile Number: </p><input type="text" id="inputMobile" name="mobile_no" class="form-control" placeholder="Mobile number" required="required">
                    </div>
                </div>
                 <div class="form-group">
                     <div class="form-label-group">
                        <p>Select system: </p><select name="system" id="selectSystem" class="form-control" required="required" default>
                            @foreach ($systems as $system) 
                                    <option value="{{$system->name}}">{{$system->System_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                     <div class="form-label-group">
                        <p>Select Task:</p><select name="task" id="selectTask" class="form-control" required="required" placeholder="select task">
                            @foreach ($tasks as $task) 
                                <option value="{{$task->name}}">{{$task->task_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div> 
                <div class="form-group">
                    <div class="form-label-group">
                        <p>Appointment Date:</p><input type="date" id="inputdate" name="appointment_date" class="form-control" placeholder="date" required="required">
                    </div>
                </div>
                <div class="form-group">
                     <div class="form-label-group">
                        <p>Task Status:</p><select name="task_status" id="selectStatus" class="form-control" required="required" placeholder="select task">
                            @foreach ($statuses as $status) 
                                <option value="{{$status->id}}">{{$status->Status_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div> 
                <button type="submit" class="btn btn-primary btn-block">Create</button> 
            </form>
        </div>
      </div>
    </div>
@endsection