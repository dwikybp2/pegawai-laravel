<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $provinsis = Provinsi::orderBy('kode')->get();

        return view('provinsi.index', compact('provinsis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('provinsi.create');
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
                'kode.required' => 'Kode Provinsi wajib diisi',
                'nama.required' => 'Nama Provinsi wajib diisi',
                'is_active.required' => 'Status Provinsi wajib diisi',
            ]
        );

        DB::beginTransaction();
        try {
            Provinsi::create($request->all());
            DB::commit();
            return redirect()->route('provinsi.index')->with('success', 'Provinsi berhasil ditambahkan!!');
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
    public function show(Provinsi $provinsi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Provinsi $provinsi)
    {
        return view('provinsi.edit', compact('provinsi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Provinsi $provinsi)
    {
        $request->validate(
            [
                'kode' => 'required|string',
                'nama' => 'required|string',
                'is_active' => 'required|integer|between:0,1',
            ],
            [
                'kode.required' => 'Kode Provinsi wajib diisi',
                'nama.required' => 'Nama Provinsi wajib diisi',
                'is_active.required' => 'Status Provinsi wajib diisi',
            ]
        );

        DB::beginTransaction();
        try {
            $provinsi->update($request->all());
            DB::commit();
            return redirect()->route('provinsi.index')->with('success', 'Provinsi berhasil ditambahkan!!');
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
    public function destroy(Provinsi $provinsi)
    {
        $provinsi->delete();
        return redirect()->route('provinsi.index')->with('success', 'Provinsi berhasil dihapus!!');
    }
}
