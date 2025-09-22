<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsesorController extends Controller
{
    public function index()
    {
        return view("admin.asesor.index", [
            "title" => "Asesor",
            "asesors" => Asesor::all(),
        ]);
    }

    public function create()
    {
        return view("admin.asesor.create", [
            "title" => "Tambah Asesor",
        ]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            Asesor::create([
                "nama" => $request->nama,
                "tempat_lahir" => $request->tempat_lahir,
                "tanggal_lahir" => $request->tanggal_lahir,
                "nik" => $request->nik,
                "domisili" => $request->domisili,
                "universitas" => $request->universitas,
                "no_sertifikat" => $request->no_sertifikat,
                "no_registrasi" => $request->no_registrasi,
                "tanggal_sertifikat_asesor" => $request->tanggal_sertifikat_asesor,
                "nama_sertifikat_kompetensi_teknis" => $request->nama_sertifikat_kompetensi_teknis,
                "tanggal_sertifikat_kompetensi_teknis" => $request->tanggal_sertifikat_kompetensi_teknis,
                "kualifikasi" => $request->kualifikasi,
                "jumlah_uji" => $request->jumlah_uji,
                "nama_bank" => $request->nama_bank,
                "no_rekening" => $request->no_rekening,
            ]);

            DB::commit();
            return redirect()->route("admin.asesor.index")->with("notification", [
                "icon" => "success",
                "title" => "Berhasil",
                "text" => "Asesor berhasil ditambah"
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route("admin.asesor.index")->with("notification", [
                "icon" => "error",
                "title" => "Gagal",
                "text" => $e->getMessage(),
            ]);
        }
    }

    public function edit($id)
    {
        return view("admin.asesor.edit", [
            "title" => "Edit Asesor",
            "asesor" => Asesor::find($id),
        ]);
    }

    public function update($id, Request $request)
    {
        $asesor = Asesor::find($id);
        DB::beginTransaction();
        try {
            $asesor->update([
                "nama" => $request->nama,
                "tempat_lahir" => $request->tempat_lahir,
                "tanggal_lahir" => $request->tanggal_lahir,
                "nik" => $request->nik,
                "domisili" => $request->domisili,
                "universitas" => $request->universitas,
                "no_sertifikat" => $request->no_sertifikat,
                "no_registrasi" => $request->no_registrasi,
                "tanggal_sertifikat_asesor" => $request->tanggal_sertifikat_asesor,
                "nama_sertifikat_kompetensi_teknis" => $request->nama_sertifikat_kompetensi_teknis,
                "tanggal_sertifikat_kompetensi_teknis" => $request->tanggal_sertifikat_kompetensi_teknis,
                "kualifikasi" => $request->kualifikasi,
                "jumlah_uji" => $request->jumlah_uji,
                "nama_bank" => $request->nama_bank,
                "no_rekening" => $request->no_rekening,
            ]);

            DB::commit();
            return redirect()->route("admin.asesor.index")->with("notification", [
                "icon" => "success",
                "title" => "Berhasil",
                "text" => "Asesor berhasil diubah"
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route("admin.asesor.index")->with("notification", [
                "icon" => "error",
                "title" => "Gagal",
                "text" => $e->getMessage(),
            ]);
        }
    }

    public function show($id)
    {
        $asesor = Asesor::find($id);
        return response()->json([
            "html" => view("components.modal-detail-asesor", [
                "asesor" => $asesor,
            ])->render()
        ]);
    }

    public function destroy($id)
    {
        try {
            $asesor = Asesor::find($id);
            $asesor->delete();

            session()->flash("notification", [
                "icon" => "success",
                "title" => "Sukses",
                "text" => "Asesor Berhasil dihapus",
            ]);
            return response()->json([
                "success" => true,
            ]);
        } catch (\Exception $e) {
            session()->flash("notification", [
                "icon" => "error",
                "title" => "Gagal",
                "text" => $e->getMessage(),
            ]);
            return response()->json([
                "success" => false,
            ]);
        }
    }
}
