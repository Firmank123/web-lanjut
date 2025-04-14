<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenjualanModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\database\Eloquent\ModelNotFoundException;
use App\DataTables\PenjualanDataTable;

class PenjualanController extends Controller
{
    public function index(PenjualanDataTable $dataTable)
    {
        return $dataTable->render('penjualan.index');
    }

    public function create()
    {
        return view('penjualan.create');
    }

    public function store(Request $request)
    {
        PenjualanModel::create([
            'user_id' => $request->user_id,
            'pembeli' => $request->pembeli,
            'penjualan_kode' => $request->penjualan_kode,
            'tanggal_penjualan' => $request->tanggal_penjualan,
            
        ]);

        return redirect('/penjualan');
    }
    public function edit($id)
    {
        $penjualan = PenjualanModel::findOrFail($id);
        return view('penjualan.edit', compact('penjualan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'pembeli' => 'required|string|max:100',
            'penjualan_kode' => 'required|string|max:10|unique:penjualan,penjualan_kode,' . $id . ',penjualan_id',
            'tanggal_penjualan' => 'required|date',

        ]);

        $penjualan = PenjualanModel::findOrFail($id);
        $penjualan->update([
            'user_id' => $request->user_id,
            'pembeli' => $request->pembeli,
            'penjualan_kode' => $request->penjualan_kode,
            'tanggal_penjualan' => $request->tanggal_penjualan,

            
            
        ]);

        return redirect()->route('penjualan.index')->with('status', 'Data berhasil diperbarui');
    }
    public function destroy($id)
    {
        $penjualan = PenjualanModel::findOrFail($id); // Find the penjualan by ID or throw a 404 error
        $penjualan->delete(); // Delete the penjualan

        return redirect()->route('penjualan.index')->with('status', 'Data berhasil dihapus');
    }
}
