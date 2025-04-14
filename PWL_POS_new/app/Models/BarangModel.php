<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BarangModel extends Model
{
    use HasFactory;
    protected $table = 'm_barang';
    protected $primaryKey = 'barang_id';
    protected $fillable = ['barang_kode', 'barang_nama','kategori_id','harga_jual','harga_beli'];
    public function barang(): HasMany
    {
        return $this->hasMany(BarangModel::class, 'barang_id', 'barang_id');
    }
}