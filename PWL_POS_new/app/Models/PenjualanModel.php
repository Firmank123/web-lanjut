<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PenjualanModel extends Model
{
    use HasFactory;

    protected $table = 't_penjualan';  //mendefisikan nama table
    protected $primaryKey = 'penjualan_id';   //mendefisikan nama primary key
    protected $fillable = ['user_id','pembeli','penjualan_kode','tanggal_penjualan'];
        public function level(): BelongsTo
    {
        return $this->belongsTo(PenjualanModel::class, 'penjualan_id', 'penjualan_id');
    }
}
