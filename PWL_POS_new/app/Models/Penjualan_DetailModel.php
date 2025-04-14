<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penjualan_DetailModel extends Model
{
    use HasFactory;

    protected $table = 't_penjualan_detail';  //mendefisikan nama table
    protected $primaryKey = 'penjualan_detail_id';   //mendefisikan nama primary key
    protected $fillable = ['penjualan_id','barang_id','jumlah_barang','harga_barang'];

        public function level(): BelongsTo
    {
        return $this->belongsTo(PenjualanModel::class, 'penjualan_id', 'penjualan_id');
    }
}
