@extends('layouts.main')
@section('title', 'Daftar Transaksi Tunai')

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
@endsection

@section('content')
<div class="page has-sidebar-left height-full">
    <header style="background-color: #01913c" class="accent-3 relative nav-sticky">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon icon-add_shopping_cart text-success s-18"></i>
                        Transaksi Tunai
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

                           

                                <div class="row">
                                    <div class="col-md-8">
                                    
                                        <h4 id="formTitle">Order Obat</h4><hr>
                                        <table class="table table-light" id="data_table">
                                        <thead style="text-align: center" class="table-active">
                                            
                                              <th>Nama Barang</th>
                                              <th>Harga</th>
                                              <th>Qty</th>
                                              <th>Total</th>
                                          
                                        </thead>
                                        <tbody id="mytable" class="text-center">
                                            
                                        </tbody>
                                      
                                      <tfoot class="text-center">
                                        <tr>
                                            
                                            <td colspan="2" class="table-active">Total Bayar</td>
                                            
                                            <td>
                                                20
                                            </td>
                                            <td>
                                                400.000
                                            </td>
                                          </tr>
                                      </tfoot>
                                    </table>
                                    
                                    </div>
                                    <div class="com-md-4">
                                        

                                        
                                            <div class="form-group mt-4 ml-5">
                                                <label for="barang" class="col-form-label col-md-12">Nama Barang</label>
                                                <div class="col-md-12 p-0 bg-light">
                                                    <select class="select2 form-control r-0 light s-12" name="barang" id="barang" autocomplete="off">
                                                        <option value="">Pilih</option>
                                                        @foreach ($obat as $i)
                                                            <option value="{{$i->id}}">{{$i->nama_barang}}</option>
                                                        @endforeach
                                                       
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 ml-5">
                                                <label for="harga" class="col-form-label col-md-12">Harga</label>
                                                <input type="text" name="harga" id="harga" placeholder="" class="form-control r-0 light s-12 col-md-12" autocomplete="off" required/>
                                            </div>
                                            <div class="form-group mt-4 ml-5">
                                                <label for="total" class="col-form-label col-md-12">Qty</label>
                                                <input type="text" name="total" id="total" placeholder="" class="form-control r-0 light s-12 col-md-12" autocomplete="off" required/>
                                            </div>
        
                                            
                                            
                                            <div class="mt-2" style="margin-left: 34%">
                                                <button type="submit" class="btn btn-primary btn-sm" id="btn_add"><i class="icon-save mr-2"></i>Simpan<span id="txtAction"></span></button>
                                                
                                            </div>
                                    </div>
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

$(function(){
    $('#btn_add').click(function(){
        var _barang = $('select[name="barang"]').val();
        var _harga = $('input[name="harga"]').val();
        var _total = $('input[name="total"]').val();
        var _jumlah = _harga*_total;
        var _tr = `<tr> <td>`+_barang+`</td> <td>`+_harga+`</td> <td>`+_total+`</td> <td>`+_jumlah+`</td> </tr>`;

        $('tbody').append(_tr);
    });
});

    
</script>


@endsection