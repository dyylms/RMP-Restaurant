@extends('Dashboard.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('users.index')}}"> Back</a>
            </div>
        </div>
    </div>
    <br>

    <form action="{{route('users.update', $data->id)}}" method="POST" enctype="multipart/form-data">
        @csrf

        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name</strong>
                    <input type="text" name="name"
                        class="form-control @error('name')
                        is-invalid
                    @enderror"
                        placeholder="Enter Name..." value="{{$data->name}}" autocomplete="">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <strong>Username</strong>
                    <input type="text" name="username"
                        class="form-control @error('username')
                        is-invalid
                    @enderror"
                        placeholder="Enter Username..." value="{{$data->username}}">
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <strong>Password</strong>
                    <input type="password" name="password"
                        class="form-control @error('password')
                    is-invalid
                    @enderror"
                        placeholder="Enter Password...">
                        @if (!$errors->has('password'))
                        <small class="text-danger">*Jangan diisi jika tidak ingin mengubah password</small>
                        @endif
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="role" id="inlineRadio1" {{$data->role == 'admin' ? 'checked' : ''}} value="admin">
                        <label class="form-check-label" for="inlineRadio1">Admin</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="role" id="inlineRadio1" {{$data->role == 'manajer' ? 'checked' : ''}} value="manajer">
                        <label class="form-check-label" for="inlineRadio2">Manager</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="role" id="inlineRadio1" {{$data->role == 'kasir' ? 'checked' : ''}} value="kasir">
                        <label class="form-check-label" for="inlineRadio3">Kasir</label>
                    </div>
                    <br>
                    @error('role')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

            </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection