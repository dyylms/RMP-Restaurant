@extends('Dashboard.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Daftar Menu</h2>
            </div>
            <hr>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('Manajer.create') }}"> Create</a>
            </div>
        </div>
    </div>

    <br>
    @if ($message = Session::get('Success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th width="150px">Menu</th>
            <th width="110px">Harga</th>
            <th>Deskripsi</th>
            <th>Tersedia</th>
            <th width="200px">Action</th>
        </tr>
        @foreach ($manajer as $menu )
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $menu->nama_menu }}</td>
            <td>Rp. {{ number_format ($menu->harga) }}</td>
            <td>{{ $menu->deskripsi }}</td>
            <td>{{ $menu->ketersediaan }}</td>
            <td>
                <form action="{{ route('Manajer.destroy',$menu->id) }}"  method="POST">

                    <a class="btn btn-primary" href="{{ route('Manajer.edit',$menu->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection
