<?php

namespace App\Http\Controllers;

use App\Models\Scheme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SchemeController extends Controller
{
    public function index()
    {
        return view('admin.scheme.index', [
            "title" => "Skema",
            "schemes" => Scheme::all(),
        ]);
    }

    public function create()
    {
        return view('admin.scheme.create', [
            "title" => "Tambah Skema",
            "schemes" => Scheme::all(),
        ]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $file = $request->file("doc");
            $fileName = "SCHEME_DOC_" . date("Ymdhis") . "." . $file->extension();
            $file->move(public_path("uploads/schemes/"), $fileName);

            Scheme::create([
                "name" => $request->name,
                "slug" => Str::slug($request->name),
                "desc" => $request->desc,
                "price" => $request->price,
                "doc" => $fileName,
            ]);
            DB::commit();
            return redirect()->route("admin.scheme.index")->with("notification", [
                "icon" => "success",
                "title" => "Berhasil",
                "text" => "Skema berhasil ditambah"
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

    public function edit($id)
    {
        return view('admin.scheme.edit', [
            "title" => "Edit Skema",
            "scheme" => Scheme::find($id),
        ]);
    }

    public function update($id, Request $request)
    {
        DB::beginTransaction();
        try {
            $updatedData = [
                "name" => $request->name,
                "slug" => Str::slug($request->name),
                "desc" => $request->desc,
                "price" => $request->price,
            ];

            if ($request->hasFile("doc")) {
                $file = $request->file("doc");
                $fileName = "SCHEME_DOC_" . date("Ymdhis") . "." . $file->extension();
                $file->move(public_path("uploads/schemes/"), $fileName);
                $updatedData["doc"] = $fileName;
            }

            $scheme = Scheme::find($id);
            $scheme->update($updatedData);

            DB::commit();
            return redirect()->route("admin.scheme.index")->with("notification", [
                "icon" => "success",
                "title" => "Berhasil",
                "text" => "Skema berhasil diubah"
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

    public function destroy($id)
    {
        try {
            $scheme = Scheme::find($id);
            $scheme->delete();

            session()->flash("notification", [
                "icon" => "success",
                "title" => "Sukses",
                "text" => "Skema Berhasil dihapus",
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
