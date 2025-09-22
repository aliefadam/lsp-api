<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisiMisiController extends Controller
{
    public function index()
    {
        return view("admin.visi-misi", [
            "title" => "Visi Misi",
            "visi_misi" => VisiMisi::first(),
        ]);
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $visi_misi = VisiMisi::first();
            $visi_misi->update([
                "visi" => $request->visi,
                "misi" => $request->misi,
                "target" => $request->target,
            ]);
            DB::commit();
            return back()->with("notification", [
                "icon" => "success",
                "title" => "Berhasil",
                "text" => "Visi Misi Disimpan",
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
