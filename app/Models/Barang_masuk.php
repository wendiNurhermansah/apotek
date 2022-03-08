<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Data_barang;

class Barang_masuk extends Model
{
    protected $table = 'barang_masuk';
    protected $fillable = ['id', 'data_obat_id', 'qty_obat', 'tanggal', 'status', 'total', 'created_at', 'updated_at'];


    public function barang(){
        return $this->belongsTo(Data_barang::class, 'data_obat_id');
    }
}
