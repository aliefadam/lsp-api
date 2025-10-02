<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
        return view("admin.contact", [
            "title" => "Kontak",
            "contact" => Contact::first(),
        ]);
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $contact = Contact::first();
            $contact->update([
                "address" => $request->address,
                "phone" => $request->phone,
                "email" => $request->email,
            ]);
            DB::commit();
            return back()->with("notification", [
                "icon" => "success",
                "title" => "Berhasil",
                "text" => "Kontak Disimpan",
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
