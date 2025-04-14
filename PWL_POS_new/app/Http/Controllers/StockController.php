<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\database\Eloquent\ModelNotFoundException;
use App\DataTables\StockDataTable;

class StockController extends Controller
{
    public function index(StockDataTable $dataTable)
    {
        return $dataTable->render('stock.index');
    }

    public function create()
    {
        return view('stock.create');
    }

    public function store(Request $request)
    {
        StockModel::create([
            'stock_id' => $request->stock_id,
            'barang_id' => $request->barang_id,
            'user_id' => $request->user_id,
            'stok_tanggal_masuk' => $request->stock_tanggal_masuk,
            'stok_jumlah' => $request->stock_jumlah,
            
        ]);

        return redirect('/stock');
    }
    public function edit($id)
    {
        $stock = StockModel::findOrFail($id);
        return view('stock.edit', compact('stock'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        'stock_id' => 'required|integer',
        'barang_id' => 'required|integer',
        'user_id' => 'required|integer',
        'stok_tanggal_masuk' => 'required|date',
        'stok_jumlah' => 'required|integer',

        ]);

        $stock = StockModel::findOrFail($id);
        $stock->update([
            'stock_id' => $request->stock_id,
            'barang_id' => $request->barang_id,
            'user_id' => $request->user_id,
            'stok_tanggal_masuk' => $request->stock_tanggal_masuk,
            'stok_jumlah' => $request->stock_jumlah,
            
        ]);

        return redirect()->route('stock.index')->with('status', 'Data berhasil diperbarui');
    }
    public function destroy($id)
    {
        $stock = StockModel::findOrFail($id); // Find the stock by ID or throw a 404 error
        $stock->delete(); // Delete the stock

        return redirect()->route('stock.index')->with('status', 'Data berhasil dihapus');
    }
}
