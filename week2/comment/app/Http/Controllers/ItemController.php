<?php

namespace App\Http\Controllers; // Mendefinisikan namespace untuk controller ini

// Mengimpor model Item dan Request dari framework Laravel
use App\Models\Item;
use Illuminate\Http\Request;

// Mendefinisikan kelas ItemController yang mewarisi kelas Controller
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // Metode index untuk menampilkan daftar semua item
    public function index()
    {
        // Mengambil semua item dari basis data
        $items = Item::all();
        // Mengembalikan view 'items.index' dengan data item yang diambil
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // Metode create untuk menampilkan form pembuatan item baru
    public function create()
    {
        // Mengembalikan view 'items.create'
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // Metode store untuk menyimpan item baru ke dalam basis data
    public function store(Request $request)
    {
        // Melakukan validasi terhadap request
        $request->validate([
            'name' => 'required', // Kolom 'name' harus diisi
            'description' => 'required', // Kolom 'description' harus diisi
        ]);

        // Hanya masukkan atribut yang diizinkan
        Item::create($request->only(['name', 'description']));
        // Mengalihkan ke route 'items.index' dengan pesan sukses
        return redirect()->route('items.index')->with('success', 'Item added successfully.');
    }

    /**
     * Display the specified resource.
     */
    // Mendefinisikan metode show untuk menampilkan item tertentu
    public function show(Item $item)
    {
        // Mengembalikan view 'items.show' dengan data item yang diambil
        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Mendefinisikan metode edit untuk menampilkan form edit item
    public function edit(Item $item)
    {
        // Mengembalikan view 'items.edit' dengan data item yang diambil
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Mendefinisikan metode update untuk memperbarui item tertentu
    public function update(Request $request, Item $item)
    {
        // Melakukan validasi terhadap request
        $request->validate([
            'name' => 'required', // Kolom 'name' harus diisi
            'description' => 'required', // Kolom 'description' harus diisi
        ]);

        // Hanya masukkan atribut yang diizinkan dan memperbarui item
        $item->update($request->only(['name', 'description']));
        // Mengalihkan ke route 'items.index' dengan pesan sukses
        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Mendefinisikan metode destroy untuk menghapus item tertentu
    public function destroy(Item $item)
    {
        // Menghapus item dari basis data
        $item->delete();
        // Mengalihkan ke route 'items.index' dengan pesan sukses
        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }
}
