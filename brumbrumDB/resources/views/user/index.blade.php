@extends('user.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>BRUM BRUM CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('user.create') }}"> Create New User</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Password</th>
            <th>Rol</th>
            <th>Detail</th>
            <th>Other Info</th>
        </tr>
        @foreach ($users as $users)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $users->username }}</td>
            <td>{{ $users->email }}</td>
            <td>{{ $users->name }}</td>
            <td>{{ $users->surname }}</td>
            <td>{{ $users->password }}</td>
            <td>{{ $users->rol }}</td>
            <td>{{ $users->detail }}</td>
            <td>{{ $users->otherInformation }}</td>
            <td>
                <form action="{{ route('user.destroy',$users->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('user.show',$users->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('user.edit',$users->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection
