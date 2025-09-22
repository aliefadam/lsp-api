<?php

namespace App\Http\Controllers;

use App\Models\SusunanPengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SusunanPengurusController extends Controller
{
    public function index()
    {
        return view("admin.susunan-pengurus", [
            "title" => "Susunan Pengurus",
            "susunan_pengurus" => SusunanPengurus::first(),
        ]);
    }

    public function update(Request $request)
    {
        try {
            DB::beginTransaction();
            DB::commit();
            $susunan_pengurus = SusunanPengurus::first();
            $updatedData = [
                "direktur" => json_encode([
                    "nama" => $request->nama_direktur,
                    "jabatan" => json_decode($susunan_pengurus->direktur)->jabatan,
                    "image" => json_decode($susunan_pengurus->direktur)->image,
                ]),
                "departemen_sertifikasi_manajer" => json_encode([
                    "nama" => $request->nama_departemen_sertifikasi_manajer,
                    "jabatan" => json_decode($susunan_pengurus->departemen_sertifikasi_manajer)->jabatan,
                    "image" => json_decode($susunan_pengurus->departemen_sertifikasi_manajer)->image,
                ]),
                "departemen_sertifikasi_anggota" => json_encode([
                    "nama" => $request->nama_departemen_sertifikasi_anggota,
                    "jabatan" => json_decode($susunan_pengurus->departemen_sertifikasi_anggota)->jabatan,
                    "image" => json_decode($susunan_pengurus->departemen_sertifikasi_anggota)->image,
                ]),
                "departemen_manajemen_mutu_manajer" => json_encode([
                    "nama" => $request->nama_departemen_manajemen_mutu_manajer,
                    "jabatan" => json_decode($susunan_pengurus->departemen_manajemen_mutu_manajer)->jabatan,
                    "image" => json_decode($susunan_pengurus->departemen_manajemen_mutu_manajer)->image,
                ]),
                "departemen_manajemen_mutu_anggota" => json_encode([
                    "nama" => $request->nama_departemen_manajemen_mutu_anggota,
                    "jabatan" => json_decode($susunan_pengurus->departemen_manajemen_mutu_anggota)->jabatan,
                    "image" => json_decode($susunan_pengurus->departemen_manajemen_mutu_anggota)->image,
                ]),
                "departemen_administrasi_manajer" => json_encode([
                    "nama" => $request->nama_departemen_administrasi_manajer,
                    "jabatan" => json_decode($susunan_pengurus->departemen_administrasi_manajer)->jabatan,
                    "image" => json_decode($susunan_pengurus->departemen_administrasi_manajer)->image,
                ]),
                "departemen_administrasi_anggota" => json_encode([
                    "nama" => $request->nama_departemen_administrasi_anggota,
                    "jabatan" => json_decode($susunan_pengurus->departemen_administrasi_anggota)->jabatan,
                    "image" => json_decode($susunan_pengurus->departemen_administrasi_anggota)->image,
                ]),
            ];

            if ($request->hasFile("foto_direktur")) {
                $file = $request->file("foto_direktur");
                $fileName = "PENGURUS_IMAGE_" . date("Ymdhis") . "." . $file->extension();
                $file->move(public_path("uploads/"), $fileName);
                $updatedData["direktur"] = json_encode([
                    "nama" => json_decode($susunan_pengurus->direktur)->nama,
                    "jabatan" => json_decode($susunan_pengurus->direktur)->jabatan,
                    "image" => $fileName,
                ]);
            }

            if ($request->hasFile("foto_departemen_sertifikasi_manajer")) {
                $file = $request->file("foto_departemen_sertifikasi_manajer");
                $fileName = "PENGURUS_IMAGE_" . date("Ymdhis") . "." . $file->extension();
                $file->move(public_path("uploads/"), $fileName);
                $updatedData["departemen_sertifikasi_manajer"] = json_encode([
                    "nama" => json_decode($susunan_pengurus->departemen_sertifikasi_manajer)->nama,
                    "jabatan" => json_decode($susunan_pengurus->departemen_sertifikasi_manajer)->jabatan,
                    "image" => $fileName,
                ]);
            }

            if ($request->hasFile("foto_departemen_sertifikasi_anggota")) {
                $file = $request->file("foto_departemen_sertifikasi_anggota");
                $fileName = "PENGURUS_IMAGE_" . date("Ymdhis") . "." . $file->extension();
                $file->move(public_path("uploads/"), $fileName);
                $updatedData["departemen_sertifikasi_anggota"] = json_encode([
                    "nama" => json_decode($susunan_pengurus->departemen_sertifikasi_anggota)->nama,
                    "jabatan" => json_decode($susunan_pengurus->departemen_sertifikasi_anggota)->jabatan,
                    "image" => $fileName,
                ]);
            }

            if ($request->hasFile("foto_departemen_manajemen_mutu_manajer")) {
                $file = $request->file("foto_departemen_manajemen_mutu_manajer");
                $fileName = "PENGURUS_IMAGE_" . date("Ymdhis") . "." . $file->extension();
                $file->move(public_path("uploads/"), $fileName);
                $updatedData["departemen_manajemen_mutu_manajer"] = json_encode([
                    "nama" => json_decode($susunan_pengurus->departemen_manajemen_mutu_manajer)->nama,
                    "jabatan" => json_decode($susunan_pengurus->departemen_manajemen_mutu_manajer)->jabatan,
                    "image" => $fileName,
                ]);
            }

            if ($request->hasFile("foto_departemen_manajemen_mutu_anggota")) {
                $file = $request->file("foto_departemen_manajemen_mutu_anggota");
                $fileName = "PENGURUS_IMAGE_" . date("Ymdhis") . "." . $file->extension();
                $file->move(public_path("uploads/"), $fileName);
                $updatedData["departemen_manajemen_mutu_anggota"] = json_encode([
                    "nama" => json_decode($susunan_pengurus->departemen_manajemen_mutu_anggota)->nama,
                    "jabatan" => json_decode($susunan_pengurus->departemen_manajemen_mutu_anggota)->jabatan,
                    "image" => $fileName,
                ]);
            }

            if ($request->hasFile("foto_departemen_administrasi_manajer")) {
                $file = $request->file("foto_departemen_administrasi_manajer");
                $fileName = "PENGURUS_IMAGE_" . date("Ymdhis") . "." . $file->extension();
                $file->move(public_path("uploads/"), $fileName);
                $updatedData["departemen_administrasi_manajer"] = json_encode([
                    "nama" => json_decode($susunan_pengurus->departemen_administrasi_manajer)->nama,
                    "jabatan" => json_decode($susunan_pengurus->departemen_administrasi_manajer)->jabatan,
                    "image" => $fileName,
                ]);
            }

            if ($request->hasFile("foto_departemen_administrasi_anggota")) {
                $file = $request->file("foto_departemen_administrasi_anggota");
                $fileName = "PENGURUS_IMAGE_" . date("Ymdhis") . "." . $file->extension();
                $file->move(public_path("uploads/"), $fileName);
                $updatedData["departemen_administrasi_anggota"] = json_encode([
                    "nama" => json_decode($susunan_pengurus->departemen_administrasi_anggota)->nama,
                    "jabatan" => json_decode($susunan_pengurus->departemen_administrasi_anggota)->jabatan,
                    "image" => $fileName,
                ]);
            }

            $susunan_pengurus->update($updatedData);
            return back()->with("notification", [
                "icon" => "success",
                "title" => "Berhasil",
                "text" => "Susunan Pengurus Disimpan",
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with("notification", [
                "icon" => "error",
                "title" => "Gagal",
                "text" => $e->getMessage(),
            ]);
        }
    }
}
