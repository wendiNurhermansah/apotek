<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_barang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_barang')->nullable();
            $table->integer('jenis_barang_id')->nullable(); 
            $table->integer('supplier_id')->nullable();
            $table->integer('satuan')->nullable();  
            $table->string('harga_barang')->nullable();
            $table->integer('jumlah_barang', 100)->nullable();
            $table->string('harga_perawat')->nullable();
            $table->string('harga_jual')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_barang');
    }
}
