@extends('layouts.main')
@section('title', 'Data Barang Terjual')

@section('content')
<div class="page has-sidebar-left height-full">
    <header style="background-color: #01913c" class="accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-list mr-2"></i>
                        List Data Barang Terjual
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul role="tablist" class="nav nav-material nav-material-white responsive-tab">
                    <li class="nav-item">
                        <a class="nav-link active show" id="tab1" data-toggle="tab" href="#semua-data" role="tab"><i class="icon icon-home2"></i>Semua Barang Terjual</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab2" data-toggle="tab" href="#tambah-data" role="tab"><i class="icon icon-plus"></i>Input Barang Terjual</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce">
        @if (session('status'))
            <div class="alert alert-success  mt-1">
                {{ session('status') }}
            </div>
        @endif
        <div class="tab-content my-3" id="pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="semua-data" role="tabpanel">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card no-b">
                            <div class="card-body">
                                
                                    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <th width="30">No</th>
                                            <th>NAMA OBAT</th>
                                            <th>JUMLAH HARGA</th>
                                            <th>JUMLAH QTY</th>
                                            <th>TANGGAL</th>
                                            
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                
                                <div class="mt-5">PENGHASILAN HARI INI    : Rp. {{number_format($today[0]->total,0,',','.')}} </div>
                                
                                <div>PENGHASILAN BULANAN INI   : Rp. {{number_format($month[0]->total,0,',','.')}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane animated fadeInUpShort" id="tambah-data" role="tabpanel">
                <div class="row">
                    <div class="col-md-12">
                        <div id="alert"></div>
                        <div class="card">
                            <div class="card-body">
                                <form class="needs-validation" id="form" method="POST"  enctype="multipart/form-data" novalidate>
                                    {{ method_field('POST') }}
                                    
                                    <input type="hidden" id="id" name="id"/>
                                    <h4 id="formTitle">Tambah Data</h4><hr>
                                    <div class="form-row form-inline">
                                        <div class="col-md-8">
                                            
                                            <div class="form-group mt-3">
                                                <label class="col-form-label s-12 col-md-2">Nama Obat</label>
                                                <div class="col-md-6 p-0 bg-light">
                                                    <select class="select2 form-control r-0 light s-12" name="n_barang" id="n_barang" autocomplete="off">
                                                        <option value="">Pilih</option>
                                                       @foreach ($Data as $item)
                                                        <option value="{{$item->id}}">{{$item->nama_barang}}</option>
                                                        @endforeach
                                                       
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group mt-3">
                                                <label for="jumlah_qty" class="col-form-label s-12 col-md-2">Jumlah qty</label>
                                                <input type="text" name="jumlah_qty" id="jumlah_qty" class="form-control r-0 light s-12 col-md-6" autocomplete="off" required/>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="jumlah_harga" class="col-form-label s-12 col-md-2">Jumlah Harga</label>
                                                <input type="text" name="jumlah_harga" id="jumlah_harga" class="form-control r-0 light s-12 col-md-6" autocomplete="off" required/>
                                            </div>
                                            
                                            
                                            <div class="mt-2" style="margin-left: 17%">
                                                <button type="submit" class="btn btn-primary btn-sm" id="action"><i class="icon-save mr-2"></i>Simpan<span id="txtAction"></span></button>
                                                <a class="btn btn-sm" onclick="add()" id="reset">Reset</a>
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
</div>
@endsection
@section('script')
 <script type="text/javascript">
    var table = $('#dataTable').dataTable({
        processing: true,
        serverSide: true,
        order: [ 0, 'asc' ],
        
        ajax: {
            url: "{{ route('Asyfa.Obat_Terjual.api') }}",
            method: 'POST'
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, align: 'center', className: 'text-center'},
            {data: 'n_barang', name: 'n_barang', className: 'text-center'},
            {data: 'jumlah_harga', name: 'jumlah_harga', className: 'text-center',  render: $.fn.dataTable.render.number(',', '.', 0, '')},
            {data: 'jumlah_qty', name: 'jumlah_qty', className: 'text-center'},
            {data: 'created_at', name: 'created_at', className: 'text-center'},
           
        ],
        
    });

    function add(){
        save_method = "add";
        $('#form').trigger('reset');
        $('#formTitle').html('Tambah Data');
        $('input[name=_method]').val('POST');
        $('#txtAction').html('');
        $('#reset').show();
        $('#preview').attr({ 'src': '-', 'alt': ''});
        $('#changeText').html('Browse Image')
        $('#username').focus();
    }

    $('#form').on('submit', function (e) {
        if ($(this)[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        else{
            $('#alert').html('');
            url = "{{ route('Asyfa.Obat_Terjual.store') }}",
            $.ajax({
                url : url,
                type : 'POST',
                data: new FormData(($(this)[0])),
                contentType: false,
                processData: false,
                success : function(data) {
                    console.log(data);
                    $('#alert').html("<div role='alert' class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Success!</strong> " + data.message + "</div>");
                    table.api().ajax.reload();
                    add();
                },
                error : function(data){
                    err = '';
                    respon = data.responseJSON;
                    if(respon.errors){
                        $.each(respon.errors, function( index, value ) {
                            err = err + "<li>" + value +"</li>";
                        });
                    }
                    $('#alert').html("<div role='alert' class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Error!</strong> " + respon.message + "<ol class='pl-3 m-0'>" + err + "</ol></div>");
                }
            });
            return false;
        }
        $(this).addClass('was-validated');
    });

    // function remove(id){
    //     $.confirm({
    //         title: '',
    //         content: 'Apakah Anda yakin akan menghapus data ini ?',
    //         icon: 'icon icon-question amber-text',
    //         theme: 'modern',
    //         closeIcon: true,
    //         animation: 'scale',
    //         type: 'red',
    //         buttons: {
    //             ok: {
    //                 text: "ok!",
    //                 btnClass: 'btn-primary',
    //                 keys: ['enter'],
    //                 action: function(){
    //                     $.post("{{ route('Asyfa.Data_barang.destroy', ':id') }}".replace(':id', id), {'_method' : 'DELETE'}, function(data) {
    //                        table.api().ajax.reload();
    //                         if(id == $('#id').val()) add();
    //                     }, "JSON").fail(function(){
    //                         location.reload();
    //                     });
    //                 }
    //             },
    //             cancel: function(){}
    //         }
    //     });
    // }

    </script>

@endsection
