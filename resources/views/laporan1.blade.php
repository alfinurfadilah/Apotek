@extends('adminlte::page')
@section('title', 'Report Generate')
@section('content_header')
<h1 class="m-0 text-dark mb-2 "><mark>Report Pembelian</mark></h1> 
@stop
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <link rel="stylesheet" href="/css/app.css">
                <div class="card-header">
                    <h4>Data Pembelian</h4> <a href="{{url('download1-laporan1-pdf')}}" target="_blank">
                    <button class="btn btn-secondary"><i class="fa fa-file "></i> &nbsp; Buka PDF</button>
                </a>
                </div>
                <div class="card-body">
                    <form method="get" action="{{ route('laporan1') }}" class="form-inline">
                        <div class="form-group mb-2">
                        <label for="tgl_beli">Tanggal beli</label>
                        <input type="date" class="form-control @error('tgl_beli') is-invalid @enderror" id="tgl_beli" placeholder="Tanggal beli" name="tgl_beli" value="{{old('tgl_beli')}}">
                        </div>
                        <!-- <div class="form-group mx-sm-3 mb-2">
                        <label for="exampleInputtgl_beli">Tanggal Beli</label>
                        <input type="date" class="form-control @error('tgl_beli') is-invalid @enderror" id="exampleInputtgl_beli" placeholder="Tanggal Beli" name="tgl_beli" value="{{old('tgl_beli')}}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="status" class="card-body">Status:</label>
                            <select class="form-control" id="status" name="status">
                                <option value="">-- Pilih Status --</option>
                                <option value="pesan">Pesan</option>
                                <option value="dibayar">Dibayar</option>
                                <option value="selesai">Selesai</option>
                            </select>
                        </div> -->
                        &nbsp;
                        &nbsp;
                        <button type="submit" class="btn btn-danger"><i class="fa fa-filter "></i> &nbsp;Filter</button>
                    </form>

                    <div class="table-responsive">
                    <table class="table	table-hover	table-bordered table-stripped " id="example2">
                    <thead>
                        <tr class="table-danger">
                            <th>No.</th>
                            <th>Nonota_Beli</th>
                            <th>Tgl_Beli</th>
                            <th>Total_Beli</th>
                            <th>Id_Distributor</th>
                            <th>Id_User</th>
                            
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
                         
                            </tr>
        @endforeach
    </tbody>
                </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
        <script>
        $(document).ready(function() {
            $('table:not(#laporan1)').DataTable();

            $('#laporan').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'pdfHtml5',
                    'print'
                ],
                footer: true
            });
        });
    </script>
</div>

@endsection
