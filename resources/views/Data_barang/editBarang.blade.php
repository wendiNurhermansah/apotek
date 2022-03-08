@extends('layouts.main')
@section('title', 'Data Obat')

@section('content')
<div class="page has-sidebar-left height-full">
    <header style="background-color: #01913c" class="accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-pencil mr-2"></i>
                        Edit Data Obat
                    </h4>
                </div>
            </div>
            
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="tab-content my-3" id="pills-tabContent">
            
                <div class="row">
                    <div class="col-md-12">
                        <div id="alert"></div>
                        <div class="card">
                            <div class="card-body">
                            <form class="needs-validation" id="form" action="{{ route('Asyfa.Data_barang.update', $Data_barang->id) }}"  method='POST' enctype="multipart/form-data" novalidate>
                                   {{ method_field('PATCH') }}
                                    @csrf
                                    <input type="hidden" id="id" name="id"/>
                                    <h4 id="formTitle">Edit Data Obat</h4><hr>
                                    <div class="form-row form-inline">
                                        <div class="col-md-8">
                                            <div class="form-group m-0">
                                                <label for="nama_barang" class="col-form-label s-12 col-md-2">Nama Obat</label>
                                                <input type="text" name="nama_barang" id="nama_barang" class="form-control r-0 light s-12 col-md-6" value="{{$Data_barang->nama_barang}}" autocomplete="off" required/>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label class="col-form-label s-12 col-md-2">Satuan</label>
                                                <div class="col-md-6 p-0 bg-light">
                                                    <select class="select2 form-control r-0 light s-12" name="satuan" id="satuan" autocomplete="off">
                                                        <option value="">Pilih</option>
                                                        <option value="">Pilih</option>
                                                        @foreach ($satuan as $i)
                                                            <option value="{{$i->id}}" {{ $i->id == $Data_barang->satuan ? 'selected' : '' }}>{{$i->n_satuan}}</option>
                                                        @endforeach
                                                       
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label class="col-form-label s-12 col-md-2">Jenis Obat</label>
                                                <div class="col-md-6 p-0 bg-light">
                                                    <select class="select2 form-control r-0 light s-12" name="jenis_barang_id" id="jenis_barang_id" autocomplete="off">
                                                        <option value="">Pilih</option>
                                                         @foreach ($jenis_barang as $i)
                                                            <option value="{{$i->id}}" {{ $i->id == $Data_barang->jenis_barang_id ? 'selected' : '' }}>{{$i->n_jenis_barang}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label class="col-form-label s-12 col-md-2">Supplier</label>
                                                <div class="col-md-6 p-0 bg-light">
                                                    <select class="select2 form-control r-0 light s-12" name="supplier_id" id="supplier_id" autocomplete="off">
                                                        <option value="">Pilih</option>
                                                         @foreach ($supplier as $i)
                                                            <option value="{{$i->id}}" {{ $i->id == $Data_barang->supplier_id ? 'selected' : '' }}>{{$i->n_supplier}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="harga_barang" class="col-form-label s-12 col-md-2">Harga Beli</label>
                                                <input type="text" name="harga_barang" id="harga_barang" class="form-control r-0 light s-12 col-md-6"  value="{{$Data_barang->harga_barang}}" autocomplete="off" required/>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="jumlah_barang" class="col-form-label s-12 col-md-2">Qty / Jumlah</label>
                                                <input type="text" name="jumlah_barang" id="jumlah_barang" class="form-control r-0 light s-12 col-md-6"  value="{{$Data_barang->jumlah_barang}}" autocomplete="off" required/>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="harga_jual" class="col-form-label s-12 col-md-2">Harga Jual</label>
                                                <input type="text" name="harga_jual" id="harga_jual" class="form-control r-0 light s-12 col-md-6"  value="{{$Data_barang->harga_jual}}" autocomplete="off" required/>
                                            </div>
                                            <div class="form-group mt-3 ">
                                                <label for="harga_perawat" class="col-form-label s-12 col-md-2">Harga Nakes</label>
                                                <input type="text" name="harga_perawat" id="harga_perawat" class="form-control r-0 light s-12 col-md-6"  value="{{$Data_barang->harga_perawat}}" autocomplete="off" required/>
                                            </div>

                                            
                                            <div class="mt-2" style="margin-left: 17%">
                                                <button type="submit" class="btn btn-success btn-sm" id="action"><i class="icon-save mr-2"></i>Rubah<span id="txtAction"></span></button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection