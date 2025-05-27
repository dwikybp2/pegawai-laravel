<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Kecamatan::orderBy('kode')->get();

        return view('kecamatan.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kecamatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'kode' => 'required|string',
                'nama' => 'required|string',
                'is_active' => 'required|integer|between:0,1',
            ],
            [
                'kode.required' => 'Kode Kecamatan wajib diisi',
                'nama.required' => 'Nama Kecamatan wajib diisi',
                'is_active.required' => 'Status Kecamatan wajib diisi',
            ]
        );

        DB::beginTransaction();
        try {
            Kecamatan::create($request->all());
            DB::commit();
            return redirect()->route('kecamatan.index')->with('success', 'Kecamatan berhasil ditambahkan!!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withInput()->withErrors([
                'error' => $th->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kecamatan $kecamatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kecamatan $kecamatan)
    {
        return view('kecamatan.edit', compact('kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kecamatan $kecamatan)
    {
        $request->validate(
            [
                'kode' => 'required|string',
                'nama' => 'required|string',
                'is_active' => 'required|integer|between:0,1',
            ],
            [
                'kode.required' => 'Kode Kecamatan wajib diisi',
                'nama.required' => 'Nama Kecamatan wajib diisi',
                'is_active.required' => 'Status Kecamatan wajib diisi',
            ]
        );

        DB::beginTransaction();
        try {
            $kecamatan->update($request->all());
            DB::commit();
            return redirect()->route('kecamatan.index')->with('success', 'Kecamatan berhasil ditambahkan!!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->withInput()->withErrors([
                'error' => $th->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kecamatan $kecamatan)
    {
        $kecamatan->delete();
        return redirect()->route('kecamatan.index')->with('success', 'Kecamatan berhasil dihapus!!');
    }
}
