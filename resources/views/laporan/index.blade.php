@extends('layouts.main')
@section('title', 'Laporan')

@section('content')
<div class="page has-sidebar-left height-full">
    <header style="background-color: #01913c" class=" accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-list2 text-success s-18"></i>
                         Laporan
                    </h4>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="container-fluid my-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card no-b">
                        <div class="card-body">
                            <form class="needs-validation" action="{{ route('Asyfa.laporan.report') }}" id="form" method="GET"  enctype="multipart/form-data" novalidate>

                                <input type="hidden" id="id" name="id"/>
                                <h4 id="formTitle">Laporan</h4><hr>
                                <div class="form-row form-inline">
                                    <div class="col-md-12">
                                        <div class="form-group mt-3">
                                        <label class="col-form-label s-12 col-md-2"><strong><b>Jenis Laporan</b></strong></label>
                                        <div class="col-md-6 p-0 bg-light">
                                            <select class="select2 form-control r-0 light s-12" name="n " id="jenis_laporan" autocomplete="off">
                                                <option value="">Pilih</option>
                                                <option value="0">Laporan Masuk</option>
                                                <option value="1">Laporan Keluar</option>
                                            </select>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mt-3">
                                            <label for="tanggal" class="col-form-label s-12 col-md-2"><strong><b> Dari Tanggal</b></strong></label>
                                            <input type="date" name="tanggaldari" id="tanggal" class="form-control r-0 light s-12 col-md-6" placeholder="" autocomplete="off" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mt-3 ">
                                            <label for="tanggal" class="col-form-label s-12 col-md-2"><strong><b>Sampai Tanggal</b></strong></label>
                                            <input type="date" name="tanggalsampai" id="tanggal" class="form-control r-0 light s-12 col-md-6" placeholder="" autocomplete="off" required/>
                                        </div>
                                    </div>

                                </div>
                                <div class="mt-4" style="margin-left: 17%">
                                    <button type="submit" class="btn btn-primary btn-sm" id="action"><i class="icon-print mr-2"></i>Cetak PDF<span id="txtAction"></span></button>
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