<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventResponse;
use App\Models\Schedule;
use App\Models\Scheme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventResponseController extends Controller
{
    public function create()
    {
        // $event = Event::where('url', $slug)->first();
        // if (!$event->is_active) {
        //     return redirect()->route("pendaftaran.close", $event->url);
        // }
        return view('user.pendaftaran.index', [
            "title" => "Pendaftaran",
            "schemes" => Scheme::all(),
            // "schedules" => Schedule::all(),
        ]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $file = $request->file("scan_ktp");
            $fileNameKTP = "KTP_IMAGE_" . date("Ymdhis") . "." . $file->extension();
            $file->move(public_path("uploads/ktp/"), $fileNameKTP);

            $file = $request->file("scan_ijazah");
            $fileNameIjazah = "IJAZAH_IMAGE_" . date("Ymdhis") . "." . $file->extension();
            $file->move(public_path("uploads/ijazah/"), $fileNameIjazah);

            if ($request->hasFile("surat_usulan_institusi")) {
                $file = $request->file("surat_usulan_institusi");
                $fileNameSuratUsulan = "SURAT_USULAN_IMAGE_" . date("Ymdhis") . "." . $file->extension();
                $file->move(public_path("uploads/surat_usulan/"), $fileNameSuratUsulan);
            } else {
                $fileNameSuratUsulan = null;
            }

            EventResponse::create([
                "scheme_id" => $request->scheme_id,
                "event_id" => $request->schedule_id,
                'name' => $request->name,
                'email' => $request->email,
                'nik' => $request->nik,
                'place_of_birth' => $request->place_of_birth,
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender,
                'address' => $request->address,
                'phone' => $request->phone,
                'pendidikan' => $request->pendidikan,
                'jurusan' => $request->jurusan,
                'skema' => $request->skema,
                'kepesertaan' => $request->kepesertaan,
                'instansi_pengusul' => $request->instansi_pengusul,
                'scan_ktp' => $fileNameKTP,
                'scan_ijazah' => $fileNameIjazah,
                'surat_usulan_institusi' => $fileNameSuratUsulan,
                'keanggotaan_iapa' => $request->keanggotaan_iapa,
                'no_anggota_iapa' => $request->no_anggota_iapa,
            ]);
            DB::commit();
            $event = Event::find($request->schedule_id);
            return redirect()->route("pendaftaran.done", $event->slug);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->with("notification", [
                "icon" => "error",
                "title" => "Gagal",
                "text" => $e->getMessage(),
            ]);
        }
    }

    public function show($id)
    {
        $participant = EventResponse::find($id);
        return response()->json([
            "html" => view("components.modal-detail-participant", [
                "participant" => $participant,
            ])->render()
        ]);
    }

    public function done($slug)
    {
        $event = Event::where('slug', $slug)->first();
        return view('user.pendaftaran.done', [
            "title" => "Berhasil Mendaftar",
            "event" => $event
        ]);
    }

    public function close($slug)
    {
        $event = Event::where('url', $slug)->first();
        return view('user.pendaftaran.close', [
            "title" => "Pendaftaran Ditutup",
            "event" => $event
        ]);
    }
}
