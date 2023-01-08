@extends('Dashboard.master')
@section('css')
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New Menu</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('Manajer.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <br>
    <form action="{{ route('Manajer.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Menu</strong>
                    <input type="text" name="nama_menu"
                        class="form-control
                    @error('nama_menu')
                        is-invalid
                    @enderror"
                        placeholder="Enter New Menu..." value="{{ old('nama_menu') }}" autocomplete="off">
                    @error('nama_menu')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <strong>Harga</strong>
                    <input type="number" name="harga"
                        class="form-control @error('harga')
                        is-invalid
                    @enderror"
                        placeholder="Enter New Username..." value="{{ old('harga') }}">
                    @error('harga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <strong for="Description">Description</strong>
                    <textarea
                        class="form-control rounded-0 @error('deskripsi')
                        is-invalid
                    @enderror"
                        name="deskripsi" id="exampleFormControlTextarea2" rows="3">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <strong>Tersedia</strong>
                    <input type="number" name="ketersediaan"
                        class="form-control @error('ketersediaan')
                        is-invalid
                    @enderror"
                        placeholder="Available..." value="{{ old('ketersediaan') }}">
                    @error('ketersediaan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
