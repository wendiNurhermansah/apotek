<?php

namespace App\Http\Controllers\asyfa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use App\Models\Data_barang;
use App\Models\Jenis_barang;
use App\Models\Satuan;
use App\Models\Supplier;
use App\Models\Barang_masuk;

class Barang_keluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_barang = Data_barang::all();
        return view('masterBarang.barang_keluar' , compact('data_barang'));
    }

    public function tables(){

        $barang = Barang_masuk::where('status', 1)->get();

        return DataTables::of($barang)
       

            ->addColumn('action', function ($p) {
                return "
                    
                    <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus Role'><i class='icon-remove'></i></a>";
            })

            ->editColumn('data_obat_id', function ($p){
                return $p->barang->nama_barang;
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'permissions'])
            ->toJson();
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
        Barang_masuk::create([
            'data_obat_id' => $request->data_obat_id,
            'qty_obat' => $request->qty_obat,
            'tanggal' => $request->tanggal,
            'total' => str_replace(".", "", $request->total),
            'status' => 1
        ]);

        $barang_id = $request->data_obat_id;
        

        $data_barang = Data_barang::findOrFail($barang_id);

        $jumlah_masuk = $data_barang->jumlah_barang-$request->qty_obat;
        // dd($jumlah);
       
        $data_barang->update([
            'jumlah_barang' => $jumlah_masuk
        ]);

        return response()->json([
            'message' => 'Data berhasil tersimpan.'
        ]);
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
        Barang_masuk::destroy($id);
        return response()->json([
            'massage' => 'data berhasil di hapus.'
        ]);
    }
}
