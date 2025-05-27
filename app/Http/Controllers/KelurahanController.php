<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Kelurahan::with('kecamatan')->orderBy('kode')->get();

        return view('kelurahan.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parKecamatan = Kecamatan::orderBy('kode')->get();

        return view('kelurahan.create', compact('parKecamatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'kecamatan_id' => 'required',
                'kode' => 'required|string',
                'nama' => 'required|string',
                'is_active' => 'required|integer|between:0,1',
            ],
            [
                'kecamatan_id.required' => 'Kecamatan wajib diisi',
                'kode.required' => 'Kode Kelurahan wajib diisi',
                'nama.required' => 'Nama Kelurahan wajib diisi',
                'is_active.required' => 'Status Kelurahan wajib diisi',
            ]
        );

        DB::beginTransaction();
        try {
            Kelurahan::create($request->all());
            DB::commit();
            return redirect()->route('kelurahan.index')->with('success', 'Kelurahan berhasil ditambahkan!!');
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
    public function show(Kelurahan $kelurahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelurahan $kelurahan)
    {
        $parKecamatan = Kecamatan::orderBy('kode')->get();

        return view('kelurahan.edit', compact('kelurahan', 'parKecamatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelurahan $kelurahan)
    {
        $request->validate(
            [
                'kecamatan_id' => 'required|exists:kecamatans,id',
                'kode' => 'required|string',
                'nama' => 'required|string',
                'is_active' => 'required|integer|between:0,1',
            ],
            [
                'kecamatan_id.required' => 'Kecamatan wajib diisi',
                'kode.required' => 'Kode Kelurahan wajib diisi',
                'nama.required' => 'Nama Kelurahan wajib diisi',
                'is_active.required' => 'Status Kelurahan wajib diisi',
            ]
        );

        DB::beginTransaction();
        try {
            $kelurahan->update($request->all());
            DB::commit();
            return redirect()->route('kelurahan.index')->with('success', 'Kelurahan berhasil ditambahkan!!');
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
    public function destroy(Kelurahan $kelurahan)
    {
        $kelurahan->delete();
        return redirect()->route('kelurahan.index')->with('success', 'Kelurahan berhasil dihapus!!');
    }
}
