<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Jenis_barang;
use App\Models\Satuan;
use App\Models\Supplier;

class Data_barang extends Model
{
    protected $table = 'data_barang';
    protected $fillable = ['id','nama_barang','jenis_barang_id','harga_barang','jumlah_barang','harga_perawat','satuan','harga_jual','created_at','updated_at'];

    public function JenisBarang(){
        return $this->belongsTo(Jenis_barang::class, 'jenis_barang_id');
    }

    public function Satuan(){
        return $this->belongsTo(Satuan::class, 'satuan');
    }

    public function Supplier(){
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
