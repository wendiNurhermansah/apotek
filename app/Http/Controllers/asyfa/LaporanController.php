<?php

namespace App\Http\Controllers\asyfa;

use Illuminate\Http\Request;
use App\Models\Barang_masuk;
use App\Http\Controllers\Controller;
use PDF;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('laporan.index');
    }


    public function report(Request $request){

        if($request->tanggaldari == '' || $request->tanggalsampai == ''  || !isset($request->tanggaldari))
            return abort(403, "inputan tanggal tidak boleh kosong");

        // dd($request->jenis_laporan);
        $jenis_laporan = $request->jenis_laporan;
        $tanggal_dari = $request->tanggaldari;
        $tanggal_sampai = $request->tanggalsampai;
        $data = Barang_masuk::where('status', $request->jenis_laporan)->whereBetween('tanggal', [$request->tanggaldari, $request->tanggalsampai])->get();
        // dd($data);
        $sum_qty = Barang_masuk::where('status', $request->jenis_laporan)->whereBetween('tanggal', [$request->tanggaldari, $request->tanggalsampai])->sum('qty_obat');
        $sum_harga = Barang_masuk::where('status', $request->jenis_laporan)->whereBetween('tanggal', [$request->tanggaldari, $request->tanggalsampai])->sum('total');
        // dd($sum_harga);

        if ($jenis_laporan == 0) {
            $judul = 'Laporan_barang_masuk.pdf';
        } else {
            $judul = 'Laporan_barang_keluar.pdf';
        };
        
        


        // return view('laporan.report', compact('data', 'tanggal_dari', 'tanggal_sampai','sum_qty','sum_harga'));
        $pdf = PDF::loadview('laporan.report', [
            'data' => $data,
            'tanggal_dari' => $tanggal_dari,
            'tanggal_sampai' => $tanggal_sampai,
            'sum_qty' => $sum_qty,
            'sum_harga' => $sum_harga,
            'jenis_laporan' => $jenis_laporan
            ]);
        return $pdf->stream($judul);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
