<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_kategori')->insert([
            'kategori_kode' => 'AT',
            'kategori_nama' => 'Alat Tulis',
        ]);

        DB::table('m_kategori')->insert([
            'kategori_kode' => 'AM',
            'kategori_nama' => 'Alat makan',
        ]);
        DB::table('m_kategori')->insert([
            'kategori_kode' => 'HC',
            'kategori_nama' => 'Healt Care',
        ]);
        DB::table('m_kategori')->insert([
            'kategori_kode' => 'LL',
            'kategori_nama' => 'Lain-lain',
        ]);
        DB::table('m_kategori')->insert([
            'kategori_kode' => 'BC',
            'kategori_nama' => 'Body Care',
        ]);
    }
}
