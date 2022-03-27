<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
</head>
<body>
    <div class="container">

        <div style="text-align: center;">
            <h3>LAPORAN BARANG 
                @if ($jenis_laporan == 0)
                MASUK
                @elseif ($jenis_laporan == 1) 
                    KELUAR
                @endif
                APOTEK ASYIFA
            </h3>
            <h3>TANGGAL {{ $tanggal_dari }} s/d {{ $tanggal_sampai }}</h3>
            
            <h6>Jl. Raya Selaawi depan kolam Tirta Alam Ds.Cihayam Kec. Selaawi, Garut-Jawa Barat</h6>
            
        </div>
        <hr style="">
        <div style="margin-top: 30px">
            <div style="width:800px; margin:0 auto;">
                <table border="1">
                    <thead>
                            <th style="width: 50px">No</th>
                            <th style="width: 300px">Nama Barang</th>
                            <th style="width: 100px">Tanggal</th>
                            <th style="width: 80px">Jumlah</th>
                            <th style="width: 140px">Harga</th>
                        
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $item)
                            <tr>
                                <td style="text-align:center">{{ $no++ }}</td>
                                <td style="padding-left:10px">{{ $item->barang->nama_barang }}</td>
                                <td style="text-align:center">{{ $item->tanggal }}</td>
                                <td style="text-align:center">{{ $item->qty_obat }}</td>
                                <td style="text-align:center">Rp. {{ number_format($item->total) }}</td>
                            </tr>
                            
                        @endforeach
                        
                    </tbody>
                    <tfoot>
                        <th colspan="3" style="background-color: grey; color: white;">TOTAL</th>
                        <th style="background-color: grey; color: white;">{{ $sum_qty }}</th>
                        <th style="background-color: grey; color: white;">Rp. {{ number_format($sum_harga) }}</th>


                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</body>
</html>