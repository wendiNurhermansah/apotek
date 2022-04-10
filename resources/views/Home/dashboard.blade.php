@extends('layouts.main')
@section('title', 'Dashboard')

@section('content')
<div class="page has-sidebar-left height-full">
    <header style="background-color: #01913c" class=" accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-box"></i>
                        APOTEK ASYIFA   
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
                                <h5 class="mt-5">{{ number_format($jenis) }}</h5>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3" style="cursor:pointer">
                        <div class="counter-box white r-5 p-3" style="height: 110%">
                            <div class="p-4">
                                <div class="float-right">
                                    <span class="icon icon-organization-1  s-48"></span>
                                </div>
                                <div class="counter-title"><strong>Jumlah Keseluruhan Obat</strong></div>
                                <h5 class=" mt-3">{{ number_format($barang) }}</h5>
                                
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
                                <h5 class=" mt-3">{{ number_format($today) }}</h5>
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
                                <h5 class=" mt-3">{{ number_format($month) }}</h5>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-flex row row-eq-height my-3">
    <div class="col-md-6">
        <div class="card">
        
             <div class="card-body p-0">
                <div id="chart" >
                     
                </div>

            </div>
                  
        </div>

    </div>
    <div class="col-md-6">
        <div class="card">
        
            
                  
        </div>

    </div>
    
</div>

@endsection
@section('script')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
 <script>
     
   

              

 </script>

@endsection
