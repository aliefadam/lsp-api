<?php

namespace App\Http\Controllers;

use App\Models\TUK;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TUKController extends Controller
{
    public function index()
    {
        return view('admin.tuk.index', [
            "title" => "Tempat Uji Kompetensi",
            "tuks" => TUK::all(),
        ]);
    }

    public function create()
    {
        return view("admin.tuk.create", [
            "title" => "Tambah Tempat Uji Kompetensi",
        ]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $file = $request->file("image");
            $fileName = "TUK_IMAGE_" . date("Ymdhis") . "." . $file->extension();
            $file->move(public_path("uploads/"), $fileName);

            TUK::create([
                "name" => $request->name,
                "address" => $request->address,
                "image" => $fileName,
            ]);

            DB::commit();
            return redirect()->route("admin.tuk.index")->with("notification", [
                "icon" => "success",
                "title" => "Berhasil",
                "text" => "TUK berhasil ditambah"
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route("admin.tuk.index")->with("notification", [
                "icon" => "error",
                "title" => "Gagal",
                "text" => $e->getMessage(),
            ]);
        }
    }

    public function edit($id)
    {
        return view("admin.tuk.edit", [
            "title" => "Edit Tempat Uji Kompetensi",
            "tuk" => TUK::find($id),
        ]);
    }

    public function update($id, Request $request)
    {
        $tuk = TUK::find($id);
        DB::beginTransaction();
        try {
            $updatedData = [
                "name" => $request->name,
                "address" => $request->address,
            ];

            if ($request->hasFile("image")) {
                $file = $request->file("image");
                $fileName = "TUK_IMAGE_" . date("Ymdhis") . "." . $file->extension();
                $file->move(public_path("uploads/"), $fileName);
                $updatedData["image"] = $fileName;
            }

            $tuk->update($updatedData);

            DB::commit();
            return redirect()->route("admin.tuk.index")->with("notification", [
                "icon" => "success",
                "title" => "Berhasil",
                "text" => "TUK berhasil diubah"
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route("admin.tuk.index")->with("notification", [
                "icon" => "error",
                "title" => "Gagal",
                "text" => $e->getMessage(),
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $tuk = TUK::find($id);
            $tuk->delete();

            session()->flash("notification", [
                "icon" => "success",
                "title" => "Sukses",
                "text" => "TUK Berhasil dihapus",
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
