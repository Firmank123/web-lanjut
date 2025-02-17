<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Membuat skema untuk tabel 'items'
        Schema::create('items', function (Blueprint $table) {
            $table->id(); // Menambahkan kolom 'id' sebagai primary key dengan auto-increment
            $table->string('name'); // Menambahkan kolom 'name' untuk menyimpan teks dengan panjang tertentu
            $table->text('description'); // Menambahkan kolom 'description' untuk menyimpan teks panjang
            $table->timestamps(); // Menambahkan kolom 'created_at' dan 'updated_at' untuk mencatat waktu pembuatan dan pembaruan
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
