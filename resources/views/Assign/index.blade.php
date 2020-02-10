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

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Mails') }}</div>
                            @foreach($assigns as $assign)
                                <div class="container mail_body">
                                    <p>Sender: Admin </p>
                                    <p>To:{{$assign->user->first_name}}</p> 
                                    <p>Message: {{$assign->message}}</p>
                                </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection

