<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void //mendefinisikan perubahan yang akan diterapkan pada database.
    {
        Schema::create('items', function (Blueprint $table) { //membuat dan mendefinisikan struktur tabel
            $table->id(); //menambahkan kolom id ke dalam tabel
            $table->string('name'); //menambahkan kolom name ke dalam tabel
            $table->text('description'); //menambahkan kolom description ke dalam tabel
            $table->timestamps(); //menambahkan dua kolom created_up dan updated_up
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
