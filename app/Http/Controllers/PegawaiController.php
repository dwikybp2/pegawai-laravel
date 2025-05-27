<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Pegawai;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Pegawai::with(['kelurahan', 'kecamatan', 'provinsi'])
            ->orderBy('nama')->get();

        return view('pegawai.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parKecamatan = Kecamatan::orderBy('kode')->get();
        $parKelurahan = Kelurahan::orderBy('kode')->get();
        $parProvinsi  = Provinsi::orderBy('kode')->get();

        return view('pegawai.create', compact('parKecamatan', 'parKelurahan', 'parProvinsi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required|string',
                'tempat_lahir' => 'required|string',
                'tanggal_lahir' => 'required|string',
                'agama' => 'nullable|string',
                'alamat' => 'nullable|string',
                'jenis_kelamin' => 'required|integer|between:1,2',
                'kelurahan_id' => 'required',
                'kecamatan_id' => 'required',
                'provinsi_id' => 'required',
            ],
            [
                'tempat_lahir.required' => 'Tempat Lahit wajib diisi',
                'nama.required' => 'Nama Pegawai wajib diisi',
                'is_active.required' => 'Status Pegawai wajib diisi',
                'kelurahan_id.required' => 'Kelurahan wajib diisi',
                'kecamatan_id.required' => 'Kecamatan wajib diisi',
                'provinsi_id.required' => 'Provinsi wajib diisi',
            ]
        );

        DB::beginTransaction();
        try {
            Pegawai::create($request->all());
            DB::commit();
            return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil ditambahkan!!');
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
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        $parKecamatan = Kecamatan::orderBy('kode')->get();
        $parKelurahan = Kelurahan::orderBy('kode')->get();
        $parProvinsi  = Provinsi::orderBy('kode')->get();

        return view('pegawai.edit', compact('parKecamatan', 'parKelurahan', 'parProvinsi', 'pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate(
            [
                'nama' => 'required|string',
                'tempat_lahir' => 'required|string',
                'tanggal_lahir' => 'required|string',
                'agama' => 'nullable|string',
                'alamat' => 'nullable|string',
                'jenis_kelamin' => 'required|integer|between:1,2',
                'kelurahan_id' => 'required',
                'kecamatan_id' => 'required',
                'provinsi_id' => 'required',
            ],
            [
                'tempat_lahir.required' => 'Tempat Lahit wajib diisi',
                'nama.required' => 'Nama Pegawai wajib diisi',
                'is_active.required' => 'Status Pegawai wajib diisi',
                'kelurahan_id.required' => 'Kelurahan wajib diisi',
                'kecamatan_id.required' => 'Kecamatan wajib diisi',
                'provinsi_id.required' => 'Provinsi wajib diisi',
            ]
        );

        DB::beginTransaction();
        try {
            $pegawai->update($request->all());
            DB::commit();
            return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil diubah!!');
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
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus!!');
    }
}
