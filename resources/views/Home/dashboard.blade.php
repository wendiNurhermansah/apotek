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
                            <h5 class=" mt-3">{{number_format($jenis,0,',','.')}} Jenis</h5>
                            
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
                            <h5 class=" mt-3">{{number_format($barang,0,',','.')}} Pcs</h5>
                            
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
                            <h5 class=" mt-3">Rp. {{number_format($today[0]->total,0,',','.')}}</h5>
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
                            <h5 class=" mt-3">Rp. {{number_format($month[0]->total,0,',','.')}}</h5>
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
        
             <div class="card-body p-0">
                <div id="calendar" class="fc fc-unthemed fc-ltr">
                     
                </div>

            </div>
                  
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
     
    @php
        $wen = "{$month[0]->total}";
        $di = "{$today[0]->total}";        
     @endphp
// Create the chart
Highcharts.chart('chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'APOTEK ASYIFA'
    },
    subtitle: {
        text: ''
    },
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: ''
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
    },

    series: [
        {
            name: "APOTEK ASYIFA",
            colorByPoint: true,
            data: [
                
               
                {
                    name: "Jumlah Jenis Obat",
                    y: {{$jenis}},
                    
                },
                {
                    name: "Jumlah Keseluruhan stok Obat",
                    y: {{$barang}},
                    
                },
                {
                    name: "Penghasilan Bulan ini",
                    y: {{$wen}},
                   
                }
            ]
        }
    ],
    
});
              

 </script>

@endsection
