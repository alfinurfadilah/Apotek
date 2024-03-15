@extends('adminlte::page')

@section('title', 'List Detail_Pembelian') 
@section('content_header')
<h1 class="m-0 text-dark"><mark>List Detail_Pembelian</mark></h1> 
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <a href="{{route('detail_pembelian.create')}}" class="btn btn-danger mb-2 ">
                <i class="fa fa-medkit" aria-hidden="true"> Tambah </i></a>
                <table class="table	table-hover	table-bordered table-stripped" id="example2">
                    <thead>
                    <tr class="table-danger">
                            <th>No.</th>
                            <th>Id_Pembelian</th>
                            <th>Tgl_Kadaluarsa</th>
                            <th>Harga_Beli</th>
                            <th>Jumlah_Beli</th>
                            <th>Sub_Total_Beli</th>
                            <th>Id_Obat</th>
                            <th>Opsi</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach($detail_pembelian as $key => $detail_pembelian)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$detail_pembelian->fpembelian->nonota_beli}}</td>
                            <td>{{$detail_pembelian->tgl_kadaluarsa}}</td>
                            <td>Rp{{ number_format($detail_pembelian->harga_beli, 0, ',', '.') }}</td>
                            <td>{{$detail_pembelian->jumlah_beli}}</td>
                            <td>{{$detail_pembelian->sub_total_beli}}</td>
                            <td>{{$detail_pembelian->fobat->nama_obat}}</td>
                            <td>
                                <a href="{{route('detail_pembelian.edit',$detail_pembelian)}}" class="btn btn-danger btn-xs"><i class="fa fa-edit"> Edit </i></a>
                                <a href="{{route('detail_pembelian.destroy',$detail_pembelian)}}" 
                                onclick="notificationBeforeDelete(event, this)"class="btn btn-warning btn-xs"><i class="fa fa-trash"> Delete </i></a>
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

</script> @endpush
