@extends('Dashboard.header')

<body onload="window.print()">
<div class="container-md">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laporan Transaksi</h2>
            </div>
            <hr>
            <div class="pull-right">
            </div>
        </div>
    </div>


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
        @foreach ($transaksi as $item )
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama_pelanggan }}</td>
            <td>{{ $item->nama_menu }}</td>
            <td>Rp. {{ $item->harga }}</td>
            <td>{{ $item->jumlah }}</td>
            <td>Rp. {{ $item->total_harga }}</td>
            <td>{{ $item->nama_pegawai}}</td>
            <td>{{ $item->tanggal}}</td>

        @endforeach
    </table>
    <table class="table table-bordered" style="width: 200px">
        <th >Total Penghasilan : <br> Rp. {{$total}}</th>
    </table>
</div>
</body>
