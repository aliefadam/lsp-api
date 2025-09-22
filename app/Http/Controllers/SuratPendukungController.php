<?php

namespace App\Http\Controllers;

use App\Mail\SendSertifikat;
use App\Models\EventResponse;
use App\Models\SuratPendukung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SuratPendukungController extends Controller
{
    public function show($event_id, $response_id)
    {
        $surat_pendukung = SuratPendukung::where([
            ["event_id", "=", $event_id],
            ["event_response_id", "=", $response_id],
        ])->first();

        if ($surat_pendukung) {
            $fileName = $surat_pendukung->filename;
        } else {
            $fileName = null;
        }

        return response()->json([
            "html" => view('components.modal-detail-surat-pendukung', [
                "surat_pendukung" => $fileName,
                "event_id" => $event_id,
                "response_id" => $response_id,
            ])->render(),
        ]);
    }

    public function store(Request $request, $event_id, $response_id)
    {
        try {
            $participant = EventResponse::find($response_id);

            $file = $request->file("sertifikat");
            $fileName = "E_Sertifikat_{$participant->name}_" . date("Ymdhis") . "." . $file->extension();
            $file->move(public_path("uploads/e-sertifikat"), $fileName);

            $filePath = public_path("uploads/e-sertifikat/{$fileName}");
            Mail::to($participant->email)->send(new SendSertifikat($filePath, $fileName));

            return back()->with("notification", [
                "icon" => "success",
                "title" => "Berhasil",
                "text" => "E-Sertifikat Berhasil Dikirim Ke Email Peserta"
            ]);
        } catch (\Exception $e) {
            return back()->with("notification", [
                "icon" => "error",
                "title" => "Gagal",
                "text" => $e->getMessage(),
            ]);
        }
    }
}
