@extends('layouts.main')
@section('title', 'Dashboard')

@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-box"></i>
                        Dashboard
                    </h4>
                </div>
            </div>
        </div>
    </header>
<div class="container-fluid relative animatedParent animateOnce">
    <div class="tab-content pb-3" id="v-pills-tabContent">
        <div class="tab-pane animated fadeInUpShort show active" id="v-pills-1">

            {{-- COUNT --}}
            <div class="row mt-2 mb-4" style="height: 100%">
                <div class="col-md-3" style="cursor:pointer">
                    <div class="counter-box white r-5 p-3" style="height: 110%">
                        <div class="p-4">
                            <div class="float-right">
                                <span class="icon icon-notebook-text  s-48"></span>
                            </div>
                            <div class="counter-title"><strong>Jumlah Jenis Obat</strong></div>
                            <h5 class=" mt-3">{{$jenis}}</h5>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="cursor:pointer">
                    <div class="counter-box white r-5 p-3" style="height: 110%">
                        <div class="p-4">
                            <div class="float-right">
                                <span class="icon icon-organization-1  s-48"></span>
                            </div>
                            <div class="counter-title"><strong>Jumlah Keseluruhan stok Obat</strong></div>
                            <h5 class=" mt-3">{{$barang}}</h5>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="cursor:pointer">
                    <div class="counter-box white r-5 p-3"  style="height: 110%">
                        <div class="p-4">
                            <div class="float-right">
                                <span class="icon icon-money-bag  s-48"></span>
                            </div>
                            <div class="counter-title"><strong>Penghasilan hari ini</strong></div>
                            <h5 class=" mt-3">{{number_format($today[0]->total,2,',','.')}}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" style="cursor:pointer">
                    <div class="counter-box white r-5 p-3"  style="height: 110%">
                        <div class="p-4">
                            <div class="float-right">
                                <span class="icon icon-dollar  s-48"></span>
                            </div>
                            <div class="counter-title"><strong>Penghasilan Bulan ini</strong></div>
                            <h5 class=" mt-3">{{number_format($month[0]->total,2,',','.')}}</h5>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<div class="d-flex row row-eq-height my-3">
    <div class="col-md-12">
        <div class="card">
        
             <div class="card-body p-0">
                 <div id="calendar" class="fc fc-unthemed fc-ltr">
                     
                </div>

            </div>
                  
        </div>

    </div>
    
</div>

@endsection
@section('script')

@endsection
