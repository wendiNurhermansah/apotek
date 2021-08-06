<?php

namespace App\Http\Controllers\asyfa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Obat_terjual;
use App\Models\Data_barang;
use DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ObatterjualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $hari_ini = Carbon::now();
        $hari = Carbon::today();
        $bulan = $hari_ini->month;

        // dd($bulan);
        // dd($bulan);

        $today = Obat_terjual::select(DB::raw("SUM(jumlah_harga) as total"))
        ->whereDate('created_at', $hari)
        ->get();

        $month = Obat_terjual::select(DB::raw("SUM(jumlah_harga) as total"))
        ->whereMonth('created_at', $bulan)
        ->get();
        // dd($month);
        // $sum1 = Obat_terjual::where('created_at', $hari)->sum('jumlah_harga');
        // dd($sum1);
       
        $Data = Data_barang::all();
        return view('Obat_terjual.obatterjual', compact('Data','today','month'));
    }

    public function api(){
        $obat = Obat_terjual::all();
        return DataTables::of($obat)

            ->editColumn('n_barang', function($p){
                return $p->Obat->nama_barang;
            })
            ->editColumn('created_at', function($p){
                return substr($p->created_at, 0,10) ;
            })
           

            ->addIndexColumn()
            ->rawColumns(['n_barang'])
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
            'n_barang' => 'required',
            'jumlah_harga' => 'required',
            'jumlah_qty' => 'required'
        ]);
        $Data = Data_barang::find($request->n_barang);
        // dd($Data);

        $barang_bb = $request->n_barang;
        $harga = $request->jumlah_harga;
        $qty = $request->jumlah_qty;

        $Obat_terjual = new Obat_terjual();
        $Obat_terjual->n_barang = $barang_bb;
        $Obat_terjual->jumlah_harga = $harga;
        $Obat_terjual->jumlah_qty = $qty;
        $Obat_terjual->save();

        $kurang = $Data->jumlah_barang-$qty;
        $Data->update([
            'jumlah_barang' => $kurang,
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
        //
    }
}
