<?php

namespace App\Http\Controllers;

use App\Models\ProfilPerusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfilPerusahaanController extends Controller
{
    public function index()
    {
        return view("admin.profil-perusahaan", [
            "title" => "Profil Perusahaan",
            "profil_perusahaan" => ProfilPerusahaan::first(),
        ]);
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $profil_perusahaan = ProfilPerusahaan::first();
            $dataUpdate = [
                "desc" => $request->desc,
            ];

            if ($request->hasFile("image")) {
                $file = $request->file("image");
                $fileName = "IMAGE_" . date("Ymdhis") . "." . $file->extension();
                $file->move(public_path("uploads"), $fileName);
                $dataUpdate["image"] = $fileName;
            }

            $profil_perusahaan->update($dataUpdate);

            DB::commit();
            return back()->with("notification", [
                "icon" => "success",
                "title" => "Berhasil",
                "text" => "Profil Perusahaan Disimpan",
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with("notification", [
                "icon" => "error",
                "title" => "Gagal",
                "text" => $e->getMessage(),
            ]);
        }
    }
}
