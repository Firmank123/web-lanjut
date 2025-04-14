<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan_DetailModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\database\Eloquent\ModelNotFoundException;
use App\DataTables\Penjualan_DetailDataTable;

class Penjualan_DetailController extends Controller
{
    public function index(Penjualan_DetailDataTable $dataTable)
    {
        return $dataTable->render('penjualan_detail.index');
    }

    public function create()
    {
        return view('penjualan_detail.create');
    }

    public function store(Request $request)
    {
        Penjualan_DetailModel::create([
            'penjualan_id' => $request->penjualan_id,
            'barang_id' => $request->barang_id,
            'jumlah_barang' => $request->jumlah_barang,
            'harga_barang' => $request->harga_barang,
                        
        ]);

        return redirect('/penjualan_detail');
    }
    public function edit($id)
    {
        $penjualan_detail = Penjualan_DetailModel::findOrFail($id);
        return view('penjualan_detail.edit', compact('penjualan_detail'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'penjualan_id' => 'required|integer',
            'barang_id' => 'required|integer',
            'jumlah_barang' => 'required|integer',
            'harga_barang' => 'required|integer',

        ]);

        $penjualan_detail = Penjualan_DetailModel::findOrFail($id);
        $penjualan_detail->update([
            'penjualan_id' => $request->penjualan_id,
            'barang_id' => $request->barang_id,
            'jumlah_barang' => $request->jumlah_barang,
            'harga_barang' => $request->harga_barang,
            
            
        ]);

        return redirect()->route('penjualan_detail.index')->with('status', 'Data berhasil diperbarui');
    }
    public function destroy($id)
    {
        $penjualan_detail = Penjualan_DetailModel::findOrFail($id); // Find the penjualan_detail by ID or throw a 404 error
        $penjualan_detail->delete(); // Delete the penjualan_detail

        return redirect()->route('penjualan_detail.index')->with('status', 'Data berhasil dihapus');
    }
}
