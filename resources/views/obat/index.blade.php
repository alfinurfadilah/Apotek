@extends('adminlte::page')
@section('title', 'List Obat')
@section('content_header')
<h1 class="m-0 text-dark"><mark>List Obat</mark></h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="responsive">
                <table class="table table-responsive table-hover table-bordered table-stripped" id="example2">

                <a href="{{route('obat.create')}}" class="btn btn-danger mb-2 ">
                <i class="fa fa-medkit" aria-hidden="true"> Tambah </i>
                </a>
                    <thead>
                    <tr class="table-danger">
                            <th>No.</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Merk</th>
                            <th>Jenis</th>
                            <th>Golongan</th>
                            <th>Kemasan</th>
                            <th>Satuan</th>
                            <th>Harga Jual</th>
                            <th>Stok</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($obat as $key => $obat)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$obat->kode_obat}}</td>
                            <td>{{$obat->nama_obat}}</td>
                            <td>{{$obat->merk}}</td>
                            <td>{{$obat->jenis}}</td>
                            <td>{{$obat->golongan}}</td>
                            <td>{{$obat->kemasan}}</td>
                            <td>{{$obat->satuan}}</td>
                            <td>Rp{{ number_format($obat->harga_jual, 0, ',', '.') }}</td>
                            <td>{{$obat->stok}}</td>
                            <td>
                                <a href="{{route('obat.edit', $obat)}}" class="btn btn-danger btn-xs"><i class="fa fa-edit"> Edit </i></a>
                                <a href="{{route('obat.destroy', $obat)}}"
                                    onclick="notificationBeforeDelete(event, this)"
                                    class="btn btn-warning btn-xs"> <i class="fa fa-trash"> Delete </i></a>
                                   
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
</div>
            </div>
        </div>
    </div>
</div>
@stop
@push('js')
<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>
<script>
    $('#example2').DataTable({
        "responsive": true,
    });

    function notificationBeforeDelete(event, el) {
        event.preventDefault();
        if (confirm('Apakah anda yakin akan menghapus data ? ')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    }

</script>
@endpush