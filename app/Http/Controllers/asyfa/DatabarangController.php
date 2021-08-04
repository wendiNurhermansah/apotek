<?php

namespace App\Http\Controllers\asyfa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Data_barang;
use App\Models\Jenis_barang;
use DataTables;




class DatabarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $jenis_barang = Jenis_barang::all();
        return view ('Data_barang.dataBarang', compact('jenis_barang'));
    }

    public function api(){
        $D_barang = Data_barang::all();
        return DataTables::of($D_barang)
       

            ->addColumn('action', function ($p) {
                return "
                    <a href='" . route( 'Asyfa.Data_barang.edit', $p->id) . "' onclick='edit(" . $p->id . ")' title='Edit'><i class='icon-pencil mr-1'></i></a>
                    <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus'><i class='icon-remove'></i></a>";
            })

            ->editColumn('jenis_barang_id', function($p){
                return $p->JenisBarang->n_jenis_barang;
            })

            ->editColumn('satuan', function($p){
               if($p->satuan == 1){
                return "Strip";
               }elseif($p->satuan == 2){
                return "Tablet";
               }elseif($p->satuan == 3){
                return "Box";
               }
            })

            ->addIndexColumn()
            ->rawColumns(['action', 'jenis_barang','satuan'])
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
        $request->validate([
            'nama_barang' => 'required',
            'jenis_barang_id' => 'required',
            'harga_barang' => 'required',
            'harga_perawat' => 'required',
            'harga_jual' => 'required',
            'jumlah_barang' => 'required',
            'satuan' => 'required',

        ]);

        $nama_barang = $request->nama_barang;
        $jenis = $request->jenis_barang_id;
        $satuan = $request->satuan;
        $beli = $request->harga_barang;
        $qty = $request->jumlah_barang;
        $jual = $request->harga_jual;
        $nakes = $request->harga_perawat;

        $Data_perusahaan = new Data_barang();
        $Data_perusahaan->nama_barang = $nama_barang;
        $Data_perusahaan->jenis_barang_id = $jenis;
        $Data_perusahaan->satuan = $satuan;
        $Data_perusahaan->harga_barang = $beli;
        $Data_perusahaan->jumlah_barang = $qty;
        $Data_perusahaan->harga_jual = $jual;
        $Data_perusahaan->harga_perawat = $nakes;
        $Data_perusahaan->save();

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
        $Data_barang = Data_barang::find($id);
        $jenis_barang = Jenis_barang::all();
        return view('Data_barang.editBarang', compact('Data_barang','jenis_barang'));
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
        $Data_barang = Data_barang::find($id);
        $request->validate([
            'nama_barang' => 'required',
            'jenis_barang_id' => 'required',
            'harga_barang' => 'required',
            'harga_perawat' => 'required',
            'harga_jual' => 'required',
            'jumlah_barang' => 'required',
            'satuan' => 'required',

        ]);

        $nama = $request->nama_barang;
        // dd($nama_barang);
        $jenis = $request->jenis_barang_id;
        // dd($jenis);
        $satuan = $request->satuan;
        $beli = $request->harga_barang;
        $qty = $request->jumlah_barang;
        // dd($qty);
        $jual = $request->harga_jual;
        $nakes = $request->harga_perawat;

        $Data_barang->update([
            'nama_barang' =>  $nama,
            'jenis_barang_id' => $jenis,
            'harga_barang' => $beli,
            'jumlah_barang' => $qty,
            'harga_perawat' => $nakes,
            'harga_jual' => $jual,
            
            'satuan' => $satuan
        ]);

        return redirect('Asyfa/Data_barang')->with('status', 'data berhasil di Rubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Data_barang::destroy($id);
        return response()->json([
            'massage' => 'data berhasil di hapus.'
        ]);
    }
}
