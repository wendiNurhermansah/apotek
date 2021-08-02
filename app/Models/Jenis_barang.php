<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jenis_barang extends Model
{
    protected $table = 'jenis_barang';
    protected $fillable = ['id','n_jenis_barang','created_at', 'updated_at'];
}
