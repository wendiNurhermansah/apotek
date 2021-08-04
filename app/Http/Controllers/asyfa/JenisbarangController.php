<?php

namespace App\Http\Controllers\asyfa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Jenis_barang;
use DataTables;

class JenisbarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Jenis_barang.jenisBarang');
    }

    public function api(){
        $J_barang = Jenis_barang::all();
        return DataTables::of($J_barang)
       

            ->addColumn('action', function ($p) {
                return "
                    <a href='#' onclick='edit(" . $p->id . ")' title='Edit'><i class='icon-pencil mr-1'></i></a>
                    <a href='#' onclick='remove(" . $p->id . ")' class='text-danger' title='Hapus'><i class='icon-remove'></i></a>";
            })

           

            ->addIndexColumn()
            ->rawColumns(['action'])
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
            'n_jenis_barang' => 'required'
        ]);
        $jenis = $request->n_jenis_barang;
        $jenis_barang = new Jenis_barang();
        $jenis_barang->n_jenis_barang = $jenis;
        $jenis_barang->save();

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
        return Jenis_barang::find($id);
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
        $Jenis_barang = Jenis_barang::find($id);
        $request->validate([
            'n_jenis_barang' => 'required'
        ]);
        $jenis = $request->n_jenis_barang;
        $Jenis_barang->update([
            'n_jenis_barang' => $jenis,
        ]);

        return response()->json([
            'message' => 'Data berhasil dirubah.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jenis_barang::destroy($id);
        return response()->json([
            'message' => 'Data berhasil di hapus.'
        ]);
    }
}
