<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use App\Models\SupplierModel;

class SupplierController extends Controller
{
    public function index()
    {
        $breadcrumb = [
            'title' => 'Daftar Supplier',
            'list' => ['Home', 'Supplier']
        ];
        $page = (object)[
            'title' => 'Daftar Supplier Yang Tersedia'
        ];
        $activeMenu = 'supplier';
        $suppliers = Supplier::all();
        return view('supplier.index', compact('breadcrumb', 'page', 'activeMenu', 'suppliers'));
    }

    public function list(Request $request)
    {
        $suppliers = Supplier::select('supplier_id', 'supplier_kode', 'name_supplier', 'supplier_contact', 'supplier_alamat', 'supplier_email', 'supplier_aktif', 'supplier_keterangan', 'created_at', 'updated_at');
        return DataTables::of($suppliers)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($supplier) { // menambahkan kolom aksi
                $btn = '<a href="' . url('/supplier/show/' . $supplier->supplier_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/supplier/edit/' . $supplier->supplier_id . '/') . '"class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/supplier/delete/' . $supplier->supplier_id) . '">' . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->addColumn('AJAX', function ($supplier) {
                $btn = '<button onclick="modalAction(\'' . url('/supplier/' . $supplier->supplier_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/supplier/' . $supplier->supplier_id . '/edit_ajax') . '\')" class="btn btn-warning btn-sm">Edit</button> ';
                $btn .= '<button onclick="modalAction(\'' . url('/supplier/' . $supplier->supplier_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button>';
                return $btn;
            })
            ->rawColumns(['aksi', 'AJAX']) // memberitahu bahwa kolom aksi dan AJAX adalah html
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = [
            'title' => 'Tambah Supplier',
            'list' => ['Home', 'Supplier', 'Tambah']
        ];
        $page = (object)[
            'title' => 'Tambah Supplier Baru'
        ];
        $activeMenu = 'supplier';
        return view('supplier.create', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function store(Request $request)
    {
        $rules = [
            'supplier_kode' => 'required|string|unique:m_supplier,supplier_kode|max:10',
           
            'name_supplier' => 'required|string|max:100',
            'supplier_contact' => 'required|string|max:20',
            'supplier_alamat' => 'required|string|max:255',
            'supplier_email' => 'required|string|max:100',
            'supplier_keterangan' => 'nullable|string|max:255'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Supplier::create($request->all());
        return redirect('/supplier')->with('success', 'Supplier berhasil disimpan');
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);
        $breadcrumb = [
            'title' => 'Edit Supplier',
            'list' => ['Home', 'Supplier', 'Edit']
        ];
        $page = (object)[
            'title' => 'Edit Supplier'
        ];
        $activeMenu = 'supplier';
        return view('supplier.edit', compact('breadcrumb', 'page', 'activeMenu', 'supplier'));;
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'supplier_kode' => 'required|string|unique:m_supplier,supplier_kode,' . $id . ',supplier_id|max:10',
            'name_supplier' => 'required|string|max:100',
            'supplier_contact' => 'required|string|max:20',
            'supplier_alamat' => 'required|string|max:255',
            'supplier_email' => 'required|string|max:100',
            'supplier_keterangan' => 'nullable|string|max:255'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $supplier = Supplier::find($id);
        if ($supplier) {
            $supplier->update($request->all());
            return redirect('/supplier')->with('success', 'Data berhasil diperbarui');
        }
        return redirect('/supplier')->with('error', 'Data tidak ditemukan');
    }

    public function delete($id)
    {
        $supplier = Supplier::find($id);
        if ($supplier) {
            try {
                $supplier->delete();
                return redirect('/supplier')->with('success', 'Data berhasil dihapus');
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect('/supplier')->with('error', 'Data tidak bisa dihapus');
            }
        }
        return redirect('/supplier')->with('error', 'Data tidak ditemukan');
    }
    public function show($id)
    {
        $supplier = Supplier::find($id);
        $breadcrumb = [
            'title' => 'Detail Supplier',
            'list' => ['Home', 'Supplier', 'Detail']
        ];
        $page = (object)[
            'title' => 'Detail Supplier'
        ];
        $activeMenu = 'supplier';
        return view('supplier.show', compact('breadcrumb', 'page', 'activeMenu', 'supplier'));
    }
    public function show_ajax($id)
    {
        $supplier = Supplier::find($id);
        return view('supplier.show_ajax', ['supplier' => $supplier]);
    }

    public function create_ajax()
    {
        return view('supplier.create_ajax');
    }

    public function store_ajax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'supplier_kode' => 'required|string|unique:m_supplier,supplier_kode|max:10',
               
                'name_supplier' => 'required|string|max:100',
                'supplier_contact' => 'required|string|max:20',
                'supplier_alamat' => 'required|string|max:255',
                'supplier_email' => 'required|string|max:100',
                'supplier_keterangan' => 'nullable|string|max:255'
            ];
    
            $validator = Validator::make($request->all(), $rules);
    
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Error validasi',
                    'errors' => $validator->getMessageBag()->toArray()
                ]);
            }

            try {
                Supplier::create($request->all());
                return response()->json([
                    'status' => true,
                    'message' => 'Supplier berhasil disimpan'
                ]);
            } catch (\Illuminate\Database\QueryException $e) {
                return response()->json([
                    'status' => false,
                    'message' => 'Error saat menyimpan data'
                ]);
            }
        }
        return redirect('/');
    }

    public function edit_ajax(string $id)
    {
        $supplier = Supplier::find($id);
        return view('supplier.edit_ajax', ['supplier' => $supplier]);
    }

    public function update_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'supplier_kode' => 'required|string|unique:m_supplier,supplier_kode,' . $id . ',supplier_id|max:10',
              
                'name_supplier' => 'required|string|max:100',
            'supplier_contact' => 'required|string|max:20',
            'supplier_alamat' => 'required|string|max:255',
            'supplier_email' => 'required|string|max:100',
            'supplier_aktif' => 'required|boolean',
            'supplier_keterangan' => 'nullable|string|max:255'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal.',
                    'msgField' => $validator->errors()
                ]);
            }

            try {
                try {
                    $supplier = Supplier::find($id);
                    if ($supplier) {
                        $supplier->update($request->all());
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
                } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Data tidak ditemukan'
                    ]);
                }
            } catch (\Illuminate\Database\QueryException $e) {
                return response()->json([
                    'status' => false,
                    'message' => 'Error saat memperbarui data'
                ]);
            }
        }
        return redirect('/');
    }
    public function confirm_ajax(string $id)
    {
        $supplier = Supplier::find($id);

        return view('supplier.confirm_ajax', ['supplier' => $supplier]);
    }

    public function delete_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $supplier = Supplier::find($id);
            if ($supplier) {
                try {
                    $supplier->delete();
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
