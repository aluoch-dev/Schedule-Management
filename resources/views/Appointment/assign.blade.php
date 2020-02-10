@extends('layouts.render')

@section('content')
<body class="bg-dark">
    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Assign Task</div>
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

                    <form method="POST" action="{{ route('assigns.store') }}">
                        @csrf                    
                        
                        <p align="center"><em>Proceed to assign the task</em></p>

                        
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right"> {{ ('Assign To') }} </label>

                            <div class="col-md-6">
                                <select  id="user" name="user" class="form-control" placeholder="Select user">
                                    @foreach ($users as $user)
                                        <option value="{{$user->id}}">{{$user->first_name}}  {{$user->last_name}} </option>
                                     @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    <select id="email" name="email" class="form-control">
                                        @foreach ($users as $user)
                                            <option value="{{$user->id}}">{{$user->email}} </option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="task_status" class="col-md-4 col-form-label text-md-right">{{__('Task Status') }}</label>

                            <div class="col-md-6">
                                <select name="task_status" id="task_status" class="form-control" placeholder="Task Status">
                                    @foreach ($statuses as $status) 
                                            <option value="{{$status->id}}" >{{$status->Status_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="message" class="col-md-4 col-form-label text-md-right">{{ __('Message') }}</label>

                                <div class="col-md-6">
                                    <textarea id="message" type="text" class="form-control" name="message" rows="8" 
                                    height="160px" required>You have been assigned task {{$appointment->id}} with the client {{$appointment->customer_name}},  mobile number {{$appointment->mobile_no}} on the {{$appointment->appointment_date}} at {{$appointment->address}}. Keep the Manager posted on progress. </textarea>
                                </div>
                        </div> 

                        <div class= "form-group row">
                            <div class= "col-md-6">
                                <button type="submit" class="btn btn-primary fa-pull-right"> Submit </button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#user').on('change',function(){
                var user_id = $(this).val();
                if(user_id){
                    $.ajax({
                        type:'POST',
                        url:'ajaxData.php',
                        data:'user_id='+user_id,
                        success:function(html){
                            $('#email').html(html); 
                        }
                    }); 
                }
            });
        });
</script>

</body>
@endsection