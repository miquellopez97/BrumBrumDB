@extends('Crud.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example from scratch - ItSolutionStuff.com</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('Crud.create') }}"> Create New Product</a>
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
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($usuarios as $usuarios)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $usuarios->name }}</td>
            <td>{{ $usuarios->detail }}</td>
            <td>
                <form action="{{ route('Crud.destroy',$usuarios->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('Crud.show',$usuarios->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('Crud.edit',$usuarios->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $usuarios->links() !!}

@endsection