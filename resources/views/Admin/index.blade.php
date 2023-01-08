@extends('Dashboard.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data User</h2>
            </div>
            <hr>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('users.create')}}"> Create</a>
            </div>
        </div>
    </div>
    <br>
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
@endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Role</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $users )
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $users->name }}</td>
            <td>{{ $users->username }}</td>
            <td>{{ $users->role }}</td>
            <td>
                <form action="{{ route('users.destroy', $users->id)}}" method="post">
                    @method('delete')
                    @csrf
                    <a class="btn btn-primary" href="{{ route('users.edit', $users->id)}}">Edit</a>

                    @csrf

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection
