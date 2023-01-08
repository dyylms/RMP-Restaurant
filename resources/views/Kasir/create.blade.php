@extends('Dashboard.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tambah Transaksi</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('Kasir.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <br>
    <form action="{{ route('Kasir.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Pelanggan</strong>
                    <input type="text" name="nama_pelanggan" class="form-control" placeholder="Customer...">
                </div>
                <div class="form-group">
                    <strong>Menu</strong>
                    <select type="text" name="nama_menu" class="form-control">
                        @foreach ($menu as $items)

                        <option><tr>{{ $items->nama_menu }}</tr></option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <strong>Jumlah</strong>
                    <input type="number" class="form-control" min="1" name="jumlah" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
