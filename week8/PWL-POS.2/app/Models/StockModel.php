<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class StockModel extends Model
{
    use HasFactory;

    protected $table = 't_stock';  //mendefisikan nama table
    protected $primaryKey = 'stock_id';   //mendefisikan nama primary key
    protected $fillable = ['stock_id', 'barang_id', 'user_id', 'stok_tanggal_masuk', 'stok_jumlah'];
        public function level(): BelongsTo
    {
        return $this->belongsTo(StockModel::class, 'stock_id', 'stock_id');
    }
}
