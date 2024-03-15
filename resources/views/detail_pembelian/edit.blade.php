@extends('adminlte::page')
@section('title', 'Edit Detail_Pembelian')
@section('content_header')
<h1 class="m-0 text-dark">Edit Detail_Pembelian</h1>
@stop
@section('content')
<form action="{{route('detail_pembelian.update', $detail_pembelian)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    
                <div class="form-group">
                        <label for="nonota_beli">No Nota beli</label>
                        <div class="input-group">
                            <input type="hidden" name="id_pembelian" id="id_pembelian"
                                value="{{$detail_pembelian->fpembelian->id ?? old('id_pembelian') }}">
                            <input type="text" class="form-control @error('nonota_beli') is-invalid @enderror"
                                placeholder="No Nota beli" id="nonota_beli" name="nonota_beli"
                                value="{{ $detail_pembelian->fpembelian->nonota_beli ??old('nonota_beli') }}" aria-label="No Nota" aria-describedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop1"></i>Cari No Nota</button>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputTgl_Kadaluarsa">Tgl_Kadaluarsa</label>
                        <input type="date" class="form-control
    @error('tgl_kadaluarsa') is-invalid @enderror" id="exampleInputtgl_kadaluarsa" placeholder="Masukkan tgl_kadaluarsa" name="tgl_kadaluarsa" value="{{$detail_pembelian->tgl_kadaluarsa ??
    old('tgl_kadaluarsa')}}">
                        @error('tgl_kadaluarsa') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputHarga_Beli">Harga_Beli</label>
                        <input type="text" class="form-control
    @error('harga_beli') is-invalid @enderror" id="exampleInputharga_beli" placeholder="Masukkan harga_beli" name="harga_beli" value="{{$detail_pembelian->harga_beli ??
    old('harga_beli')}}">
                        @error('harga_beli') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputJumlah_Beli">Jumlah_Beli</label>
                        <input type="text" class="form-control
    @error('jumlah_beli') is-invalid @enderror" id="exampleInputjumlah_beli" placeholder="Masukkan jumlah_beli" name="jumlah_beli" value="{{$detail_pembelian->jumlah_beli ??
    old('jumlah_beli')}}">
                        @error('jumlah_beli') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputSub_Total_Beli">Sub_Total_Beli</label>
                        <input type="sub_total_beli" class="form-control
    @error('sub_total_beli') is-invalid @enderror" id="exampleInputsub_total_beli" placeholder="Masukkan sub_total_beli" name="sub_total_beli" value="{{$detail_pembelian->sub_total_beli ??
    old('sub_total_beli')}}">
                        @error('sub_total_beli') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPersen_Margin_Jual">Persen_Margin_Jual</label>
                        <input type="text" class="form-control
@error('persen_margin_jual') is-invalid @enderror" id="exampleInputPersen_Margin_Jual"
                            placeholder="Masukkan Persen Keuntungan" name="persen_margin_jual"
                            value="{{$detail_pembelian->persen_margin_jual ?? old('persen_margin_jual') }}">
                        @error('persen_margin_jual')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Id_Obat">Id_Obat</label>
                        <div class="input-group">
                            <input type="hidden" name="id_obat" id="id_obat" value="{{ $detail_pembelian->fobat->id ?? old('id_obat')}}">
                            <input type="text" class="form-control @error('nama_obat')  is-invalid  @enderror"
                                placeholder="Nama_obat" id="nama_obat" name="nama_obat"
                                value="{{ $detail_pembelian->fobat->nama_obat ?? old('nama_obat')}}" aria- label="Nama Distributor" aria-describedby="cari"
                                readonly>
                            <button class="btn  btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop2"></i> Cari Data Obat</button>
                        </div>
                    
                        </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-danger"><i class="fas fa-save"> Simpan </i></button>
                                <a href="{{ route('detail_pembelian.index') }}" class="btn btn-warning"><i class="fa fa-times-circle"> Batal </i></button><a>
                                
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                        </div>


                        
                        <!-- Modal -->
            <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian No Nota</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-hover table-bordered table-stripped" id="example1">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>No Nota</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pembelian as $key => $pembelian)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td id={{ $key + 1 }}>{{ $pembelian->nonota_beli }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-xs"
                                                onclick="pilih1('{{ $pembelian->id }}', '{{ $pembelian->nonota_beli }}')"
                                                data-bs-dismiss="modal">Pilih</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal -->
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian No Nota</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-hover table-bordered table-stripped" id="example2">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Obat</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($obat as $key => $obat)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $obat->nama_obat }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-xs"
                                                onclick="pilih2('{{ $obat->id }}', '{{ $obat->nama_obat }}')"
                                                data-bs-dismiss="modal">Pilih</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal -->
            @stop
            @push('js')
            <script>
                $('#example1').DataTable({
                    "responsive": true,
                });

                function pilih1(id, nonota_beli) {
                    document.getElementById('id_pembelian').value = id
                    document.getElementById('nonota_beli').value = nonota_beli
                }

            </script>
            <script>
                $('#example2').DataTable({
                    "responsive": true,
                });

                function pilih2(id, nama_obat) {
                    document.getElementById('id_obat').value = id
                    document.getElementById('nama_obat').value = nama_obat
                }

            </script>
            @endpush

























