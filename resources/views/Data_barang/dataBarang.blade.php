@extends('layouts.main')
@section('title', 'Data Obat')

@section('content')
<div class="page has-sidebar-left height-full">
    <header style="background-color: #01913c" class="accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-glass mr-2"></i>
                        List Data Obat
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul role="tablist" class="nav nav-material nav-material-white responsive-tab">
                    <li class="nav-item">
                        <a class="nav-link active show" id="tab1" data-toggle="tab" href="#semua-data" role="tab"><i class="icon icon-home2"></i>Semua Obat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab2" data-toggle="tab" href="#tambah-data" role="tab"><i class="icon icon-plus"></i>Tambah Obat</a>
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
                                <div class="table-responsive">
                                    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <th width="30">No</th>
                                            <th>NAMA OBAT</th>
                                            <th>SATUAN</th>
                                            <th>JENIS OBAT</th>
                                            <th>SUPPLIER</th>
                                            <th>HARGA BELI</th>
                                            <th>QTY</th>
                                            <th>HARGA JUAL</th>
                                            <th>HARGA NAKES</th>
                                            <th>Aksi</th>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
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
                                            <div class="form-group m-0">
                                                <label for="nama_barang" class="col-form-label s-12 col-md-2">Nama Obat</label>
                                                <input type="text" name="nama_barang" id="nama_barang" class="form-control r-0 light s-12 col-md-6" autocomplete="off" required/>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label class="col-form-label s-12 col-md-2">Satuan</label>
                                                <div class="col-md-6 p-0 bg-light">
                                                    <select class="select2 form-control r-0 light s-12" name="satuan" id="satuan" autocomplete="off">
                                                        <option value="">Pilih</option>
                                                        @foreach ($satuan as $i)
                                                            <option value="{{$i->id}}">{{$i->n_satuan}}</option>
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
                                                            <option value="{{$i->id}}">{{$i->n_jenis_barang}}</option>
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
                                                            <option value="{{$i->id}}">{{$i->n_supplier}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="harga_barang" class="col-form-label s-12 col-md-2">Harga Beli</label>
                                                <input type="text" name="harga_barang" id="harga_barang" class="form-control r-0 light s-12 col-md-6" onkeyup="convertToRupiah(this)" autocomplete="off" required/>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="jumlah_barang" class="col-form-label s-12 col-md-2">Qty</label>
                                                <input type="text" name="jumlah_barang" id="jumlah_barang" class="form-control r-0 light s-12 col-md-6" autocomplete="off" required/>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="harga_jual" class="col-form-label s-12 col-md-2">Harga Jual</label>
                                                <input type="text" name="harga_jual" id="harga_jual" class="form-control r-0 light s-12 col-md-6" onkeyup="convertToRupiah(this)" autocomplete="off" required/>
                                            </div>
                                            <div class="form-group mt-3 ">
                                                <label for="harga_perawat" class="col-form-label s-12 col-md-2">Harga Nakes</label>
                                                <input type="text" name="harga_perawat" id="harga_perawat" class="form-control r-0 light s-12 col-md-6" onkeyup="convertToRupiah(this)" autocomplete="off" required/>
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
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf',
        ],
        ajax: {
            url: "{{ route('Asyfa.Data_barang.api') }}",
            method: 'POST'
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, align: 'center', className: 'text-center'},
            {data: 'nama_barang', name: 'nama_barang'},
            {data: 'satuan', name: 'satuan'},
            {data: 'jenis_barang_id', name: 'jenis_barang_id'},
            {data: 'supplier_id', name: 'supplier_id'},
            {data: 'harga_barang', name: 'harga_barang',  render: $.fn.dataTable.render.number(',', '.', 0, '')},
            {data: 'jumlah_barang', name: 'jumlah_barang'},
            {data: 'harga_jual', name: 'harga_jual',  render: $.fn.dataTable.render.number(',', '.', 0, '')},
            {data: 'harga_perawat', name: 'harga_perawat',  render: $.fn.dataTable.render.number(',', '.', 0, '')},
            {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'}
        ]
    });

    function convertToRupiah(objek) {
	  separator = ".";
	  a = objek.value;
	  b = a.replace(/[^\d]/g,"");
	  c = "";
	  panjang = b.length; 
	  j = 0; 
	  for (i = panjang; i > 0; i--) {
	    j = j + 1;
	    if (((j % 3) == 1) && (j != 1)) {
	      c = b.substr(i-1,1) + separator + c;
	    } else {
	      c = b.substr(i-1,1) + c;
	    }
	  }
	  objek.value = c;

	}       

	function convertToAngka()
	{	var nominal= document.getElementById("nominal").value;
		var angka = parseInt(nominal.replace(/,.*|[^0-9]/g, ''), 10);
		document.getElementById("angka").innerHTML= angka;
	}       

	function convertToAngka()
	{	var nominal1= document.getElementById("nominal1").value;
		var angka1 = parseInt(nominal.replace(/,.*|[^0-9]/g, ''), 10);
		document.getElementById("angka1").innerHTML= angka;
	}

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
            url = "{{ route('Asyfa.Data_barang.store') }}",
            $.ajax({
                url : url,
                type : 'POST',
                data: new FormData(($(this)[0])),
                contentType: false,
                processData: false,
                success : function(data) {
                    console.log(data);
                    $('#alert').html("<div role='alert' class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>??</span></button><strong>Success!</strong> " + data.message + "</div>");
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
                    $('#alert').html("<div role='alert' class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>??</span></button><strong>Error!</strong> " + respon.message + "<ol class='pl-3 m-0'>" + err + "</ol></div>");
                }
            });
            return false;
        }
        $(this).addClass('was-validated');
    });

    function remove(id){
        $.confirm({
            title: '',
            content: 'Apakah Anda yakin akan menghapus data ini ?',
            icon: 'icon icon-question amber-text',
            theme: 'modern',
            closeIcon: true,
            animation: 'scale',
            type: 'red',
            buttons: {
                ok: {
                    text: "ok!",
                    btnClass: 'btn-primary',
                    keys: ['enter'],
                    action: function(){
                        $.post("{{ route('Asyfa.Data_barang.destroy', ':id') }}".replace(':id', id), {'_method' : 'DELETE'}, function(data) {
                           table.api().ajax.reload();
                            if(id == $('#id').val()) add();
                        }, "JSON").fail(function(){
                            location.reload();
                        });
                    }
                },
                cancel: function(){}
            }
        });
    }

    </script>

@endsection
