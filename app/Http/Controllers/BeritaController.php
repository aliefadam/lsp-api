<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        return view('admin.berita.index', [
            "title" => "Berita",
            "data_berita" => Berita::all(),
        ]);
    }

    public function create()
    {
        return view('admin.berita.create', [
            "title" => "Tambah Berita",
        ]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            if ($request->hasFile("flyer")) {
                $file = $request->file("flyer");
                $fileName = "FLYER_IMAGE_" . date("Ymdhis") . "." . $file->extension();
                $file->move(public_path("uploads/flyer/"), $fileName);
            } else {
                $fileName = null;
            }

            $file = $request->file("thumbnail");
            $fileNameThumbnail = "thumbnail_IMAGE_" . date("Ymdhis") . "." . $file->extension();
            $file->move(public_path("uploads/thumbnail/"), $fileNameThumbnail);

            Berita::create([
                "title" => $request->title,
                "slug" => Str::slug($request->title),
                "body" => $request->body,
                "flyer" => $fileName,
                "thumbnail" => $fileNameThumbnail,
            ]);
            DB::commit();

            return redirect()->route("admin.berita.index")->with("notification", [
                "icon" => "success",
                "title" => "Berhasil",
                "text" => "Berita berhasil ditambah"
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

    public function edit($id)
    {
        return view('admin.berita.edit', [
            "title" => "Ubah Berita",
            "berita" => Berita::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $berita = Berita::find($id);
            $updatedData = [
                "title" => $request->title,
                "slug" => Str::slug($request->title),
                "body" => $request->body,
            ];

            if ($request->hasFile("flyer")) {
                $file = $request->file("flyer");
                $fileName = "FLYER_IMAGE_" . date("Ymdhis") . "." . $file->extension();
                $file->move(public_path("uploads/flyer/"), $fileName);
                $updatedData["flyer"] = $fileName;
            }

            if ($request->hasFile("thumbnail")) {
                $file = $request->file("thumbnail");
                $fileNameThumbnail = "THUMBNAIL_IMAGE_" . date("Ymdhis") . "." . $file->extension();
                $file->move(public_path("uploads/thumbnail/"), $fileNameThumbnail);
                $updatedData["thumbnail"] = $fileNameThumbnail;
            }

            $berita->update($updatedData);
            DB::commit();
            return redirect()->route("admin.berita.index")->with("notification", [
                "icon" => "success",
                "title" => "Berhasil",
                "text" => "Berita berhasil disimpan"
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

    public function destroy($id)
    {
        try {
            $berita = Berita::find($id);
            $berita->delete();

            session()->flash("notification", [
                "icon" => "success",
                "title" => "Sukses",
                "text" => "Berita Berhasil dihapus",
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
