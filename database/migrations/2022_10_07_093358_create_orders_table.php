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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id');
            $table->foreignId('user_id');
            $table->dateTime('tgl_pembelian');
            $table->string('total_biaya');
            $table->integer('total_item');
            $table->enum('status', ['Belum dibayar', 'Sudah dibayar', 'Diproses', 'Done']);
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
        Schema::dropIfExists('orders');
    }
};
