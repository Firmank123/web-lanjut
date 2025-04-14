<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use App\Models\KategoriModel;
class KategoriController extends Controller
{
    public function index()
    {
        $breadcrumb = [
            'title' => 'Daftar Kategori',
            'list' => ['Home', 'Kategori']
        ];
        $page = (object)[
            'title' => 'Daftar Kategori Yang Tersedia'
        ];
        $activeMenu = 'kategori';
        $kategoris = Kategori::all();
        return view('kategori.index', compact('breadcrumb', 'page', 'activeMenu', 'kategoris'));
    }

    public function list(Request $request)
    {
        $kategoris = Kategori::select('kategori_id', 'kategori_kode', 'kategori_nama', 'created_at', 'updated_at');
        return DataTables::of($kategoris)
            ->addIndexColumn()
            ->addColumn('aksi', function ($kategori) {
                $btn = '<a href="' . url('/kategori/show/' . $kategori->kategori_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/kategori/edit/' . $kategori->kategori_id) . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/kategori/delete/' . $kategori->kategori_id) . '">' . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->addColumn('AJAX', function ($kategori) {
                $btn = '<button onclick="modalAction(\'' . url('/kategori/' . $kategori->kategori_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/kategori/' . $kategori->kategori_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/kategori/' . $kategori->kategori_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button>';
                return $btn;
            })
            ->rawColumns(['aksi', 'AJAX']) // memberitahu bahwa kolom aksi dan AJAX adalah html
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = [
            'title' => 'Tambah Kategori',
            'list' => ['Home', 'Kategori', 'Tambah']
        ];
        $page = (object)[
            'title' => 'Tambah Kategori Baru'
        ];
        $activeMenu = 'kategori';
        return view('kategori.create', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_kode' => 'required|string|unique:m_kategori,kategori_kode|max:10',
            'kategori_nama' => 'required|string|max:100'
        ]);

        Kategori::create($request->all());

        return redirect('kategori')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kategori = KategoriModel::find($id);
        $breadcrumb = [
            'title' => 'Edit Kategori',
            'list' => ['Home', 'Kategori', 'Edit']
        ];
        $page = (object)[
            'title' => 'Edit Kategori'
        ];
        $activeMenu = 'kategori';
        return view('kategori.edit', compact('breadcrumb', 'page', 'activeMenu', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_kode' => 'required|string|unique:m_kategori,kategori_kode,' . $id . ',kategori_id|max:10',
            'kategori_nama' => 'required|string|max:100'
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        try {
            $kategori->delete();
            return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('kategori.index')->with('error', 'Kategori tidak bisa dihapus.');
        }
    }
    public function show($id)
    {
        $kategori = KategoriModel::find($id);
        $breadcrumb = [
            'title' => 'Detail Kategori',
            'list' => ['Home', 'Kategori', 'Detail']
        ];
        $page = (object)[
            'title' => 'Detail Kategori'
        ];
        $activeMenu = 'kategori';
        return view('kategori.show', compact('breadcrumb', 'page', 'activeMenu', 'kategori'));
    }
    public function show_ajax(string $id)
    {
        $kategori = Kategori::find($id);
        return view('kategori.show_ajax', ['kategori' => $kategori]);
    }

    public function create_ajax()
    {
        return view('kategori.create_ajax');
    }

    public function store_ajax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'kategori_kode' => 'required|string|unique:m_kategori,kategori_kode|max:10',
                'kategori_nama' => 'required|string|max:100'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi Gagal',
                    'msgField' => $validator->errors()
                ]);
            }

            Kategori::create($request->all());
            return response()->json([
                'status' => true,
                'message' => 'Kategori berhasil disimpan'
            ]);
        }
        return redirect('/');
    }

    public function edit_ajax(string $id)
    {
        $kategori = Kategori::find($id);
        return view('kategori.edit_ajax', ['kategori' => $kategori]);
    }

    public function update_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'kategori_kode' => 'required|string|unique:m_kategori,kategori_kode,' . $id . ',kategori_id|max:10',
                'kategori_nama' => 'required|string|max:100'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors()
                ]);
            }

            $kategori = Kategori::find($id);
            if ($kategori) {
                $kategori->update($request->all());
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil diperbarui'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }
        return redirect('/');
    }

    public function confirm_ajax(string $id)
    {
        $kategori = Kategori::find($id);
        return view('kategori.confirm_ajax', ['kategori' => $kategori]);
    }

    public function delete_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $kategori = Kategori::find($id);
            if ($kategori) {
                try {
                    $kategori->delete();
                    return response()->json([
                        'status' => true,
                        'message' => 'Data berhasil dihapus'
                    ]);
                } catch (\Illuminate\Database\QueryException $e) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Data tidak bisa dihapus'
                    ]);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ]);
            }
        }
        return redirect('/');
    }
}
