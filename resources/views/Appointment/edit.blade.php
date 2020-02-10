@extends('layouts.render')

@section('content')
<body class="bg-dark">
    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Manage appointment</div>
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
                <form method="post" action="{{ route('appointments.update', $appointment->id) }}">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                    <label for="firstName">Customer Name</label>
                    <input type="text" class="form-control" name="customer_name" value={{ $appointment->customer_name }} />
                    </div>
                    <div class="form-group">
                    <label for="lastName">Address</label>
                    <input type="text" class="form-control" name="address" value={{ $appointment->address }} />
                    </div>
                    <div class="form-group">
                    <label for="mobileno">Email</label>
                    <input type="text" class="form-control" name="email" value={{ $appointment->email }} />
                    </div>
                    <div class="form-group">
                    <label for="mobileno">Mobile No</label>
                    <input type="text" class="form-control" name="mobile_no" value={{ $appointment->mobile_no }} />
                    </div>
                    <div class="form-group">
                    <label for="email">System</label>
                    <input type="text" class="form-control" name="system" value={{ $appointment->system }} />
                    </div>
                    <div class="form-group">
                    <label for="password">task</label>
                    <input type="text" class="form-control" name="task" value={{ $appointment->task }} />
                    </div>
                    <div class="form-group">
                    <label for="password">Appointment Date</label>
                    <input type="text" class="form-control" name="appointment_date" value={{ $appointment->appointment_date }} />
                    </div>
                    <div class="form-group">
                    <label for="taskStatus">task Status</label>
                    <input type="text" class="form-control" name="task_status" value={{ $appointment->task_status }} />
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
              </div>
        </div>
    </div>
</body>
@endsection