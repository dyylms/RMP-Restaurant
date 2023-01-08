@extends('Dashboard.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Daftar Transaksi</h2>
            </div>
            <hr>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('Kasir.create') }}"> Create</a>
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
            <th>Nama Pelanggan</th>
            <th>Nama Menu</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
            <th>Nama Pegawai</th>
            <th>Tanggal</th>
            <th width="100px">Action</th>
        </tr>
        @foreach ($transaksi as $items )
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $items->nama_pelanggan }}</td>
            <td>{{ $items->nama_menu }}</td>
            <td>Rp. {{number_format ($items->harga) }}</td>
            <td>{{ $items->jumlah }}</td>
            <td>Rp. {{number_format ($items->total_harga) }}</td>
            <td>{{ $items->nama_pegawai}}</td>
            <td>{{ $items->tanggal}}</td>
            <td>
                <form action="{{ route('Kasir.destroy',$items->id) }}" method="POST">


                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection
