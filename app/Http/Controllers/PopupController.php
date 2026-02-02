<?php

namespace App\Http\Controllers;

use App\Models\Popup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PopupController extends Controller
{
    public function index()
    {
        return view('admin.popup', [
            "title" => "Pop-up Brosur",
            "popup" => Popup::first(),
        ]);
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $popup = Popup::first();

            $file = $request->file("image");
            $fileName = "BROSUR_IMAGE" . date("Ymdhis") . "." . $file->extension();
            $file->move(public_path("uploads/"), $fileName);

            if ($popup) {
                $popup->update([
                    "image" => $fileName,
                ]);
            } else {
                Popup::create([
                    "image" => $fileName,
                ]);
            }
            DB::commit();
            return back()->with("notification", [
                "icon" => "success",
                "title" => "Berhasil",
                "text" => "Brosur Disimpan",
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

    public function destroy()
    {
        DB::beginTransaction();
        try {
            $popup = Popup::first();

            if ($popup) {
                $popup->delete();
            } else {
                throw new \Exception("Tidak ada brosur untuk dihapus");
            }
            DB::commit();
            return back()->with("notification", [
                "icon" => "success",
                "title" => "Berhasil",
                "text" => "Brosur Dihapus",
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
