<?php

namespace App\Http\Controllers;
// use Auth;
use Illuminate\Http\Request;
use App\Models\Data_barang;
use App\Models\Jenis_barang;
use App\Models\Obat_terjual;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $hari_ini = Carbon::now();
        $hari = Carbon::today();
        $bulan = $hari_ini->month;
        
        $jenis = Jenis_barang::count('id');
        $barang = Data_barang::sum('jumlah_barang');

        $today = Obat_terjual::select(DB::raw("SUM(jumlah_harga) as total"))
        ->whereDate('created_at', $hari)
        ->get();
        // dd($today);

        $month = Obat_terjual::select(DB::raw("SUM(jumlah_harga) as total"))
        ->whereMonth('created_at', $bulan)
        ->get();
        // dd($barang);
        return view('Home.dashboard', compact('jenis','barang','today','month'));
    }
}
