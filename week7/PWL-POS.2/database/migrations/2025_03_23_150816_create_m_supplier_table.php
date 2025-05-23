<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('m_supplier', function (Blueprint $table) {
            $table->id('supplier_id');
            $table->string('supplier_kode', 10)->unique();
            $table->string('name_supplier', 100);
            $table->string('supplier_contact', 15);
            $table->string('supplier_alamat', 255)->nullable();
            $table->string('supplier_email', 100)->nullable();
            $table->boolean('supplier_aktif')->default(true);
            $table->text('supplier_keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_supplier');
    }
};