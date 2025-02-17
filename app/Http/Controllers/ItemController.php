<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class ItemController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {
//         //
//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         //
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         //
//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(string $id)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(string $id)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, string $id)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(string $id)
//     {
//         //
//     }
// }
namespace App\Http\Controllers; //deklarasi namespace

use Illuminate\Http\Request; // mengimpor kelas Request dari namespace Illuminate\Http
use App\Models\Item; //  mengimpor kelas Item (model) dari namespace App\Models

class ItemController extends Controller // definisi kelas ItemController
{
    public function index() // definisi method (fungsi) index()
    {
        $items = Item::all(); // Method all() adalah method Eloquent (ORM Laravel) yang mengambil semua baris dari tabel yang terkait dengan model Item dan hasilnya disimpan dalam variabel $items
        return view('items.index', compact('items')); //mengembalikan sebuah view (tampilan) bernama items.index teruntuk compact('items') adalah cara mudah untuk membuat array asosiatif dengan nama variabel sebagai key dan nilai variabel sebagai value
    }

    public function create() // definisi method create()
    {
        return view('items.create'); // mengembalikan view items.create
    }

    public function store(Request $request) // definisi method store(), menyimpan data item baru ke database, Menerima objek Request sebagai argumen, yang berisi data yang dikirim melalui form.
    {
        $request->validate([ // melakukan validasi data input dari form
            'name' => 'required', // Memastikan bahwa field name wajib diisi
            'description' => 'required', // Memastikan bahwa field name wajib diisi
        ]);

        // Item::create($request->all());
        // return redirect()->route('items.index');

        // Hanya masukkan atribut yang diizinkan
        Item::create($request->only(['name', 'description'])); // menggunakan model Item untuk membuat item baru dalam database, memastikan bahwa hanya data dari field name dan description yang disimpan, meskipun mungkin ada field lain di form menggunakan only(['name', 'description'])

        return redirect()->route('items.index')->with('success', 'Item added successfully.'); // melakukan redirect (pengalihan) ke route bernama items.index. with('success', 'Item added successfully.') menambahkan pesan sukses ke session, yang kemudian dapat ditampilkan di view.
    }
    public function show(Item $item) // definisi method (fungsi) show(), menerima satu argumen, yaitu $item
    {
        return view('items.show', compact('item')); // mengembalikan sebuah view (tampilan) bernama items.show, compact('item') adalah cara mudah untuk membuat array asosiatif dengan nama variabel sebagai key dan nilai variabel sebagai value
    }

    public function edit(Item $item) // definisi method edit(). Method ini digunakan untuk menampilkan form untuk mengedit item yang sudah ada.
    {
        return view('items.edit', compact('item')); // Mengembalikan view items.edit, yang berisi form untuk mengedit item
    }

    public function update(Request $request, Item $item) // definisi method update(). Method ini digunakan untuk menyimpan perubahan data item ke database.
                                                        // $request: Objek Request yang berisi data yang dikirim melalui form edit.
                                                        // $item: Objek Item yang akan diupdate.
    {
        $request->validate([ // melakukan validasi data input dari form
            'name' => 'required', // Memastikan bahwa field name wajib diisi
            'description' => 'required', // Memastikan bahwa field name wajib diisi
        ]);

        // $item->update($request->all());
        // return redirect()->route('items.index');

        // Hanya masukkan atribut yang diizinkan
        $item->update($request->only(['name', 'description'])); // $request->only(['name', 'description']) memastikan bahwa hanya data dari field name dan description yang digunakan untuk update, meskipun mungkin ada field lain di form.

        return redirect()->route('items.index')->with('success', 'Item updated successfully.'); // Melakukan redirect (pengalihan) ke route bernama items.index, with('success', 'Item updated successfully.') menambahkan pesan sukses ke session, yang kemudian dapat ditampilkan di view.
    }

    public function destroy(Item $item) // definisi method destroy(). Method ini digunakan untuk menghapus item dari database, menerima objek Item yang akan dihapus.
    
    {
        // return redirect()->route('items.index");
        $item->delete(); // Baris ini menghapus data item dari database

        return redirect()->route('items.index')->with('success', 'Item deleted successfully.'); // Melakukan redirect ke route items.index dengan pesan sukses
    }
}
