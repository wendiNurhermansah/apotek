@extends('layouts.main')
@section('title', 'Jenis Barang')

@section('content')
<div class="page has-sidebar-left height-full">
    <header class="blue accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-clipboard-list2 text-success s-18"></i>
                        Jenis Barang
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
                                    <th width="60"></th>
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
                        <form class="needs-validation" id="form" method="POST"  enctype="multipart/form-data" novalidate>
                            {{ method_field('POST') }}
                            <input type="hidden" id="id1" name="id"/>
                            <h4 id="formTitle">Tambah Data</h4><hr>
                            <div class="form-row form-inline">
                                <div class="col-md-12">
                                    <div class="form-group m-0">
                                        <label for="n_jenis_barang" class="col-form-label s-12 col-md-4">Nama Barang</label>
                                        <input type="text" name="n_jenis_barang" id="n_jenis_barang" placeholder="" class="form-control r-0 light s-12 col-md-8" autocomplete="off" required/>
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

@endsection

@section('script')
 <script type="text/javascript">
    var table = $('#dataTable').dataTable({
   processing: true,
   serverSide: true,
   order: [ 0, 'asc' ],
   ajax: {
       url: "{{ route('Asyfa.Jenis_barang.api') }}",
       method: 'POST'
   },
   columns: [
       {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, align: 'center', className: 'text-center'},
       {data: 'n_jenis_barang', name: 'n_jenis_barang'},
       {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'}
   ]
});

    function add(){
        save_method = "add";
        $('#form').trigger('reset');
        $('#formTitle').html('Tambah Data');
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
            url = (save_method == 'add') ? "{{ route('Asyfa.Jenis_barang.store') }}" : "{{ route('Asyfa.Jenis_barang.update', ':id') }}".replace(':id', $('#id1').val());
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
        $('#formTitle').html("Edit Data <a href='#' onclick='add()' class='btn btn-outline-danger btn-xs pull-right ml-2'>Batal</a>");
        $('#txtAction').html(" Perubahan");
        $('#reset').hide();
        $('input[name=_method]').val('PATCH');
        $.get("{{ route('Asyfa.Jenis_barang.edit', ':id') }}".replace(':id', id), function(data){
            $('#id1').val(data.id);
            $('#n_jenis_barang').val(data.n_jenis_barang).focus();
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
                        $.post("{{ route('Asyfa.Jenis_barang.destroy', ':id') }}".replace(':id', id), {'_method' : 'DELETE'}, function(data) {
                           table.api().ajax.reload();
                            if(id == $('#id1').val()) add();
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
