@extends('layouts.main')
@section('title', 'Barang Keluar')

@section('content')
<div class="page has-sidebar-left height-full">
    <header style="background-color: #01913c" class="accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon  icon-arrow_downward amber-text s-18"></i>
                        Barang Keluar
                    </h4>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid relative animatedParent animateOnce">
        <div class="container-fluid my-3">
            <div class="row">
                <div class="col-md-8">
                    <div class="card no-b">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <th width="30">No</th>
                                        <th>Nama Barang</th>
                                        
                                        <th width="80">Tanggal</th>
                                        <th width="80">Qty</th>
                                        <th width="80">Total</th>
                                
                                        <th width="60">Aksi</th>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div id="alert"></div>
                    <div class="card no-b">
                        <div class="card-body">
                            <form class="needs-validation" id="form" method="POST" novalidate>
                                {{ method_field('POST') }}
                                <input type="hidden" id="id" name="id"/>
                                <h4 id="formTitle">Tambah Barang Keluar</h4><hr>
                                <div class="form-row form-inline">
                                    <div class="col-md-12">
                                        <div class="form-group m-0">
                                            <label class="col-form-label s-12 col-md-4">Nama Barang</label>
                                                <div class="col-md-8 p-0 bg-light">
                                                    <select class="select2 form-control r-0 light s-12" name="data_obat_id" id="data_obat_id" autocomplete="off">
                                                        <option value="">Pilih</option>
                                                        @foreach ($data_barang as $i)
                                                        <option value="{{$i->id}}">{{$i->nama_barang}}</option>
                                                        @endforeach
                                                         
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="tanggal" class="col-form-label s-12 col-md-4">Tanggal</label>
                                            <input type="date" name="tanggal" id="tanggal1" placeholder="" class="form-control r-0 light s-12 col-md-8" autocomplete="off" required/>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="qty_obat" class="col-form-label s-12 col-md-4">Qty</label>
                                            <input type="number" name="qty_obat" id="qty_obat" placeholder="" class="form-control r-0 light s-12 col-md-8" autocomplete="off" required/>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="total" class="col-form-label s-12 col-md-4">Total</label>
                                            <input type="text" name="total" id="total" placeholder="" onkeyup="convertToRupiah(this)" class="form-control r-0 light s-12 col-md-8" autocomplete="off" required/>
                                        </div>
                                        <div class="mt-2" style="margin-left: 34%">
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

@endsection

@section('script')
    <script type="text/javascript">

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

    var table = $('#dataTable').dataTable({
        processing: true,
        serverSide: true,
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf',
        ],
        order: [ 0, 'asc' ],
        ajax: {
            url: "{{ route('Asyfa.Barang_keluar.tables') }}",
            method: 'POST'
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, align: 'center', className: 'text-center'},
            {data: 'data_obat_id', name: 'data_obat_id'},
           
            {data: 'tanggal', name: 'tanggal'},
            {data: 'qty_obat', name: 'qty_obat', className: 'text-center', render: $.fn.dataTable.render.number(',', '.', 0, '')},
            {data: 'total', name: 'total', className: 'text-center', render: $.fn.dataTable.render.number(',', '.', 0, '')},
            {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'}
        ]
    });

    function add(){
        save_method = "add";
        $('#form').trigger('reset');
        $('#formTitle').html('Tambah Barang Keluar');
        $('input[name=_method]').val('POST');
        $('#txtAction').html('');
        $('#reset').show();
        $('#name').focus();
    }

    add();
    $('#form').on('submit', function (e) {
        if ($(this)[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        else{
            $('#alert').html('');
            $('#action').attr('disabled', true);
            url = (save_method == 'add') ? "{{ route('Asyfa.Barang_keluar.index') }}" : "{{ route('Asyfa.Barang_keluar.update', ':id') }}".replace(':id', $('#id').val());
            $.post(url, $(this).serialize(), function(data){
                $('#alert').html("<div role='alert' class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Success!</strong> " + data.message + "</div>");
                table.api().ajax.reload();
                if(save_method == 'add') add();
            }, "JSON").fail(function(data){
                err = ''; respon = data.responseJSON;
                $.each(respon.errors, function(index, value){
                    err += "<li>" + value +"</li>";
                });
                $('#alert').html("<div role='alert' class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><strong>Error!</strong> " + respon.message + "<ol class='pl-3 m-0'>" + err + "</ol></div>");
            }).always(function(){
                $('#action').removeAttr('disabled');
            });
            return false;
        }
        $(this).addClass('was-validated');
    });

    function edit(id) {
        save_method = 'edit';
        var id = id;
        $('#alert').html('');
        $('#form').trigger('reset');
        $('#formTitle').html("Edit Barang Masuk <a href='#' onclick='add()' class='btn btn-outline-danger btn-xs pull-right ml-2'>Batal</a>");
        $('#txtAction').html(" Perubahan");
        $('#reset').hide();
        $('input[name=_method]').val('PATCH');
        $.get("{{ route('Asyfa.Barang_keluar.edit', ':id') }}".replace(':id', id), function(data){
            $('#id').val(data.id);
            $('#data_obat_id').val(data.data_obat_id).change();
           
            $('#qty_obat').val(data.qty_obat);
            $('#total').val(data.total);
            $('#tanggal1').val(data.tanggal);
        }, "JSON").fail(function(){
            reload();
        });
    }

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
                        $.post("{{ route('Asyfa.Barang_keluar.destroy', ':id') }}".replace(':id', id), {'_method' : 'DELETE'}, function(data) {
                           table.api().ajax.reload();
                            if(id == $('#id').val()) add();
                        }, "JSON").fail(function(){
                            reload();
                        });
                    }
                },
                cancel: function(){}
            }
        });
    }
    </script>

@endsection
