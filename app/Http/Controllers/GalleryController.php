<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    public function index()
    {
        return view('admin.galeri', [
            "title" => "Galeri",
            "galleries" => Gallery::all(),
        ]);
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            foreach ($request->file("image") as $index => $image) {
                $file = $image;
                $fileName = "GALLERY_IMAGE_{$index}_" . date("Ymdhis") . "." . $file->extension();
                $file->move(public_path("uploads/gallery/"), $fileName);

                Gallery::create([
                    "name" => $fileName,
                ]);
            }
            DB::commit();
            return redirect()->back()->with("notification", [
                "icon" => "success",
                "title" => "Sukses",
                "text" => "Galeri Berhasil diunggah",
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with("notification", [
                "icon" => "error",
                "title" => "Gagal",
                "text" => $e->getMessage(),
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $gallery = Gallery::find($id);
            $fileName = $gallery->name;
            unlink(public_path("uploads/gallery/{$fileName}"));
            $gallery->delete();

            session()->flash("notification", [
                "icon" => "success",
                "title" => "Sukses",
                "text" => "Gambar Berhasil dihapus",
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
