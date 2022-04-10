<?php

namespace App\Http\Controllers;
// use Auth;
use Illuminate\Http\Request;
use App\Models\Data_barang;
use App\Models\Jenis_barang;
use App\Models\Obat_terjual;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Barang_masuk;

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
        // dd($bulan);
        
        $jenis = Jenis_barang::count('id');
        $barang = Data_barang::count();

        $today = Barang_masuk::where('status', 1)
        ->whereDate('created_at', $hari)
        ->sum('total');

        
        
        // dd($today);

        $month = Barang_masuk::where('status', 1)
        ->whereMonth('created_at', $bulan)
        ->sum('total');
        // dd($month);
        return view('Home.dashboard', compact('jenis', 'barang', 'month', 'today'));
    }
}
