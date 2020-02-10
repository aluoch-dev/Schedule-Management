@extends('layouts.main')

@section('content')

<ol class="breadcrumb">
    <li class="breadcrumb-item">
    <a>CSM</a>
    </li>
    <li class="breadcrumb-item active">Users</li>
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
            <td>First Name</td>
            <td>Last Name</td>
            <td>Role</td>
            <td>Email</td>
            <td>Mobile Number</td>
            <td colspan="2" align="center">Action</td>
          </tr>
      </thead>
      <tbody>
          @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->first_name}}</td>
                <td>{{$user->last_name}}</td>
                <td>{{$user->role}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->mobile_no}}</td>
                <td><a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{ route('users.destroy', $user->id)}}" method="post">
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
        