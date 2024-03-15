@extends('adminlte::page')

@section('title', 'List Pembelian')
@section('content_header')
<h1 class="m-0 text-dark"><mark>List Pembelian</mark></h1> @stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

            <a href="{{route('pembelian.create')}}" class="m-0 text-white btn btn-danger mb-2"><i class="fa fa-medkit" aria-hidden="true"> Tambah </i>
                </a>
                @if(auth()->user()->level=='pemilik')
                <a href="{{route('pembelian.create')}}" class="m-0 text-white btn btn-danger mb-2"><i class="fa fa-medkit" aria-hidden="true"> Tambah </i>
                </a>
                <a href="{{url('download1-laporan1-pdf')}}" target="_blank"> <button class="m-0 btn btn-secondary  mb-2"><i class="fa fa-file "></i> &nbsp; Buka PDF</button>
                </a>
                @else
                @endif
                
                <table class="table	table-hover	table-bordered table-stripped " id="example2">
                    <thead>
                        <tr class="table-danger">
                            <th>No.</th>
                            <th>Nonota_Beli</th>
                            <th>Tgl_Beli</th>
                            <th>Total_Beli</th>
                            <th>Id_Distributor</th>
                            <th>Id_User</th>
                            <th>Opsi</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach($pembelian as $key => $pembelian)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$pembelian->nonota_beli}}</td>
                            <td>{{$pembelian->tgl_beli}}</td>
                            <td>{{$pembelian->total_beli}}</td>
                            <td>{{$pembelian->fdistributor->nama_distributor}}</td>
                            <td>{{$pembelian->fuser->name}}</td>
                            <td>
                                <a href="{{route('pembelian.edit', $pembelian)}}" class="btn btn-danger btn-xs"><i
                                        class="fa fa-edit"> Edit </i></a>
                                <a href="{{route('pembelian.destroy', $pembelian)}}"
                                    onclick="notificationBeforeDelete(event, this)" class="btn btn-warning btn-xs"> <i
                                        class="fa fa-trash"> Delete </i></a> 
                                </a>
                            </td>
                        </tr> @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> @stop

@push('js')
<form action="" id="delete-form" method="post"> @method('delete')
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

</script> @endpush
