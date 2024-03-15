@extends('adminlte::page')
@section('title', 'Tambah distributor')
@section('content_header')
    <h1 class="m-0 text-dark">Tambah distributor</h1>
@stop
@section('content')
    <form action="{{ route('distributor.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputNama_Distributor">Nama Distributor</label>
                            <input type="text" class="form-control
@error('nama distributor') is-invalid @enderror"
                                id="exampleInputNama_Distributor" placeholder="Nama_Distributor" name="nama_distributor"
                                value="{{ old('nama_distributor') }}">
                            @error('nama_distributor')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputAlamat">Alamat</label>
                            <input type="text" class="form-control
@error('alamat') is-invalid @enderror"
                                id="exampleInputAlamat" placeholder="Alamat" name="alamat"
                                value="{{ old('alamat') }}">
                            @error('alamat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputNotelepon">Notelepon</label>
                            <input type="text" class="form-control
@error('notelepon') is-invalid @enderror"
                                id="exampleInputNotelepon" placeholder="Notelepon" name="notelepon"
                                value="{{ old('notelepon') }}">
                            @error('notelepon')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                    </div>
                    <div class="card-footer">
                    <button type="submit" class="btn btn-danger"><i class="fas fa-save"> Simpan </i></button> 
                                <a href="{{ route('distributor.index') }}"  class="btn btn-warning"><i class="fa fa-times-circle"> Batal </i></button></a>
                    </div>
                </div>
            </div>
        </div>
    @stop