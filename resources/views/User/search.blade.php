@extends('layouts.render')

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
        <p> The Search results for your query <b> {{ $query }} </b> are :</p>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>User's Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($details as $user)
                    <tr>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->mobile_no}}</td>
                        <td>{{$user->role}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    @endif
</div>
@endsection
