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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('category_service_id');
            $table->string('name');
            $table->string('slug');
            $table->string('code_service');
            $table->string('thumb_img')->nullable();
            $table->string('price');
            $table->text('description');
            $table->text('detail');
            $table->enum('category', ['progtech', 'design']);
            $table->enum('tag',['pplg', 'mplb', 'tkjt', 'dkv', 'bdp', 'kln', 'htl']);
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
        Schema::dropIfExists('services');
    }
};
