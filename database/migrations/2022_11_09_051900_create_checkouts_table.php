<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->integer('total_price_checkout');
            $table->string('payment');
            $table->string('id_invoice');
            $table->string('id_pemesanan');
            $table->enum('status', ['pending', 'success', 'process', 'done']);
            $table->timestamp('tgl_konfirmasi')->nullable();
            $table->timestamp('estimasi_tiba')->nullable();
            $table->timestamp('pesanan_sampai')->nullable();
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
        Schema::dropIfExists('checkouts');
    }
};
