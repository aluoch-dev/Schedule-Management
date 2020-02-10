@extends('layouts.render')

@section('content')
<body class="bg-dark">
    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Manage a User</div>
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
                <form method="post" action="{{ route('users.update', $user->id) }}">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" class="form-control" name="first_name" value={{ $user->first_name }} />
                    </div>
                    <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" class="form-control" name="last_name" value={{ $user->last_name }} />
                    </div>
                    <div class="form-group">
                    <label for="mobileno">Mobile Number</label>
                    <input type="text" class="form-control" name="mobile_no" value={{ $user->mobile_no }} />
                    </div>
                    <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" value={{ $user->email }} />
                    </div>
                    <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" name="password" value={{ $user->password }} />
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
  
            </div>
        </div>
    </div>
</body>
@endsection