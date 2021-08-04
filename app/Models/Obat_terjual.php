<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat_terjual extends Model
{
    protected $table = 'obat_terjual';
    protected $fillable = ['id','n_barang','jumlah_harga','jumlah_qty','created_at','updated-at'];

    public function Obat(){
        return $this->belongsTo(Data_barang::class, 'n_barang');
    }
}
