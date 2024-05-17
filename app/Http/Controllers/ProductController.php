<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\Barang;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Models\KategoriBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Nette\Utils\Random;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Daftar Barang | Barang',
            'currentNav' => 'product',
            'currentNavChild' => 'product',
        ];

        return view('product.index', $data);
    }

    // mengambil data barang
    public function getProduct()
    {
        $products = Barang::with('category:kode,nama', 'unit:kode,nama')
            ->select('id', 'nama', 'kode', 'jumlah', 'kd_kategori', 'kd_satuan')
            ->get();

        return ResponseFormatter::success([
            'products' => $products,
        ], 'Data berhasil diambil');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Barang | Barang',
            'currentNav' => 'product',
            'currentNavChild' => 'add',
            'categories' => KategoriBarang::all(),
        ];

        return view('product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi data masukkan
        $rules = [
            'name' => 'required|unique:barang,nama',
            'category' => 'required|exists:kategori_barang,kode',
            'unit' => 'required|exists:satuan_barang,kode',
            'quantity' => 'nullable|min:0|max:100|numeric',
        ];

        $message = [
            'name.required' => 'Nama barang wajib diisi',
            'name.unique' => 'Nama barang sudah ada',
            'category.required' => 'Kategori barang wajib diisi',
            'category.exists' => 'Kategori barang tidak ditemukan',
            'unit.required' => 'Satuan barang wajib diisi',
            'unit.exists' => 'Satuan barang tidak ditemukan',
            'quantity.min' => 'Jumlah barang minimal 0',
            'quantity.max' => 'Jumlah barang maksimal 100',
            'quantity.numeric' => 'Jumlah barang harus berupa angka',
        ];


        $validated = Validator::make($request->all(), $rules, $message);

        if ($validated->fails()) {
            return ResponseFormatter::error([
                'error' => $validated->errors()->first(),
            ], 'Data gagal divalidasi', 422);
        }

        // mendapatkan data kode barang
        $codeProduct = Random::generate(6, '0-9A-Z');

        // menyimpan data barang
        try {
            DB::beginTransaction();

            Barang::create([
                'kd_kategori' => $request->category,
                'kd_satuan' => $request->unit,
                'kode' => $codeProduct,
                'nama' => $request->name,
                'jumlah' => $request->quantity,
                'id_user_insert' => auth()->id(),
            ]);

            DB::commit();
            return ResponseFormatter::success(
                [
                    'redirect' => route('product'),
                ],
                'Data berhasil disimpan'
            );
        } catch (\Exception $e) {
            DB::rollback();
            return ResponseFormatter::error([
                'error' => $e->getMessage(),
            ], 'Data gagal disimpan', 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        $data = [
            'title' => 'Ubah Barang | Barang',
            'currentNav' => 'product',
            'currentNavChild' => 'edit',
            'categories' => KategoriBarang::all(),
            'product' => $barang,
        ];

        return view('product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        // validasi data masukkan
        $rules = [
            'name' => 'required|unique:barang,nama,' . $barang->id,
            'category' => 'required|exists:kategori_barang,kode',
            'unit' => 'required|exists:satuan_barang,kode',
            'quantity' => 'nullable|min:0|max:100|numeric',
            'code' => 'required|unique:barang,kode,' . $barang->id,
        ];

        $message = [
            'name.required' => 'Nama barang wajib diisi',
            'name.unique' => 'Nama barang sudah ada',
            'category.required' => 'Kategori barang wajib diisi',
            'category.exists' => 'Kategori barang tidak ditemukan',
            'unit.required' => 'Satuan barang wajib diisi',
            'unit.exists' => 'Satuan barang tidak ditemukan',
            'quantity.min' => 'Jumlah barang minimal 0',
            'quantity.max' => 'Jumlah barang maksimal 100',
            'quantity.numeric' => 'Jumlah barang harus berupa angka',
            'code.required' => 'Kode barang wajib diisi',
            'code.unique' => 'Kode barang sudah ada',
        ];

        $validated = Validator::make($request->all(), $rules, $message);

        if ($validated->fails()) {
            return ResponseFormatter::error([
                'error' => $validated->errors()->first(),
            ], 'Data gagal divalidasi', 422);
        }

        // menyimpan data barang
        try {
            DB::beginTransaction();
            // merubah kode barang menjadi uppercase
            $code = strtoupper($request->code);

            $barang->update([
                'kd_kategori' => $request->category,
                'kd_satuan' => $request->unit,
                'nama' => $request->name,
                'jumlah' => $request->quantity,
                'kode' => $code,
                'id_user_update' => auth()->id(),
            ]);

            DB::commit();
            return ResponseFormatter::success(
                [
                    'redirect' => route('product'),
                ],
                'Data berhasil diubah'
            );
        } catch (\Exception $e) {
            DB::rollback();
            return ResponseFormatter::error([
                'error' => $e->getMessage(),
            ], 'Data gagal diubah', 500);
        }
    }
}
