@extends('Dashboard.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laporan</h2>
            </div>
            <hr>
            <div class="pull-right">
                <a class="btn btn-danger" href="laporan/pdf"> Cetak</a>
            </div>
        </div>
    </div>
    <br>
    <form action="{{ route('search') }}" method="get">
        @csrf
        <div class="form-group row">
            <label for="from" class="col-form-label col-sm-2">Date From :</label>
            <div class="col-sm-3">
                <input type="date" class="form-control" name="from"  required>
            </div>
            <label for="to" class="col-form-label col-sm-2">Date to :</label>
            <div class="col-sm-3">
                <input type="date" class="form-control" name="to" required>
            </div>
            <div class="col-sm-2">
            <button type="submit"  class="btn btn-info"><i class="fa fa-search"></i></button>
            </div>
        </div>

        <hr class="sidebar-divider">
    </form>
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
            <th>Total</th>
            <th>Nama Pegawai</th>
            <th>Tanggal</th>
        </tr>
        @foreach ($report as $item )
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama_pelanggan }}</td>
            <td>{{ $item->nama_menu }}</td>
            <td>Rp. {{ number_format ($item->harga) }}</td>
            <td>{{ $item->jumlah }}</td>
            <td>Rp. {{ Number_format ($item->total_harga) }}</td>
            <td>{{ $item->nama_pegawai}}</td>
            <td>{{ $item->tanggal}}</td>

        @endforeach
    </table>
    <table class="table table-bordered" style="width: 200px">
        <th >Total Penghasilan : <br> Rp. {{$total}}</th>
    </table>



@endsection
