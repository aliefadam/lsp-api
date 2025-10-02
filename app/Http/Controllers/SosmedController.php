<?php

namespace App\Http\Controllers;

use App\Models\Sosmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SosmedController extends Controller
{
    public function index()
    {
        return view('admin.sosmed', [
            "title" => "Sosial Media",
            "sosmed" => Sosmed::first(),
        ]);
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $sosmed = Sosmed::first();
            if (!$sosmed) {
                Sosmed::create([
                    "facebook" => $request->facebook,
                    "twitter" => $request->twitter,
                    "instagram" => $request->instagram,
                    "linkedin" => $request->linkedin,
                ]);
            } else {
                $sosmed->update([
                    "facebook" => $request->facebook,
                    "twitter" => $request->twitter,
                    "instagram" => $request->instagram,
                    "linkedin" => $request->linkedin,
                ]);
            }
            DB::commit();
            return back()->with("notification", [
                "icon" => "success",
                "title" => "Berhasil",
                "text" => "Sosial Media Disimpan",
            ]);
        } catch (\Exception $e) {
            DB::commit();
            return back()->with("notification", [
                "icon" => "error",
                "title" => "Gagal",
                "text" => $e->getMessage(),
            ]);
        }
    }
}
