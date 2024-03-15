@extends('adminlte::page')
@section('title', 'Edit Distributor')
@section('content_header')
<h1 class="m-0 text-dark">Edit Distributor</h1>
@stop
@section('content')
<form action="{{route('distributor.update', $distributor)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    
                    <div class="form-group">
                        <label for="exampleInputName">Nama_Distributor</label>
                        <input type="text" class="form-control
    @error('nama_distributor') is-invalid @enderror" id="exampleInputNama_Distributor" placeholder="Nama_Distributor" name="nama_distributor" value="{{$distributor->nama_distributor ??
    old('nama_distributor')}}">
                        @error('nama_distributor') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAlamat">Alamat</label>
                        <input type="alamat" class="form-control
    @error('alamat') is-invalid @enderror" id="exampleInputalamat" placeholder="Masukkan alamat" name="alamat" value="{{$distributor->alamat ??
    old('alamat')}}">
                        @error('alamat') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputNotelepon">Notelepon</label>
                        <input type="notelepon" class="form-control
    @error('notelepon') is-invalid @enderror" id="exampleInputnotelepon" placeholder="Masukkan notelepon" name="notelepon" value="{{$distributor->notelepon ??
    old('notelepon')}}">
                        @error('notelepon') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-danger"><i class="fas fa-save"> Simpan </i></button>
                    <a href="{{ route('distributor.index') }}" class="btn btn-warning"><i class="fa fa-times-circle"> Batal </i></button><a>
                    
                    </a>
                </div>
            </div>
        </div>
    </div>
    @stop
