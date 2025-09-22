<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use App\Models\Berita;
use App\Models\Event;
use App\Models\EventResponse;
use App\Models\Gallery;
use App\Models\ProfilPerusahaan;
use App\Models\Scheme;
use App\Models\SuratPendukung;
use App\Models\SusunanPengurus;
use App\Models\TUK;
use App\Models\VisiMisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index()
    {
        return view("user.index", [
            "title" => "Beranda",
            "profil_perusahaan" => ProfilPerusahaan::first(),
            "susunan_pengurus" => SusunanPengurus::first(),
            "visi_misi" => VisiMisi::first(),
        ]);
    }

    public function informasi()
    {
        return view("user.informasi", [
            "title" => "Informasi",
            "tuks" => TUK::all(),
            "asesors" => Asesor::all(),
        ]);
    }

    public function sertifikasi()
    {
        return view("user.sertifikasi", [
            "title" => "Sertifikasi",
            "schemes" => Scheme::all(),
        ]);
    }

    public function sertifikasi_detail($slug)
    {
        $scheme = Scheme::where("slug", $slug)->first();

        return view("user.sertifikasi-detail", [
            "title" => "Detail Skema",
            "scheme" => $scheme
        ]);
    }

    public function upload_surat_pendukung($slug)
    {
        $event = Event::firstWhere("slug", $slug);
        // $event = Event::firstWhere("url", $url);
        return view("user.upload-surat-pendukung", [
            "title" => "Upload Surat Pendukung",
            "event" => $event,
        ]);
    }

    public function upload_surat_pendukung_cek_nik(Request $request)
    {
        $nik = $request->nik;
        $event_id = $request->event_id;
        $participant = EventResponse::where([
            ["nik", "=", $nik],
            ["event_id", "=", $event_id],
        ])->first();

        if ($participant) {
            return redirect()->route("pendaftaran.upload.create", [
                "event_id" => $event_id,
                "nik" => $nik,
            ]);
        } else {
            return back()->with("notification", [
                "icon" => "error",
                "title" => "Tidak Ditemukan",
                "text" => "NIK yang anda masukkan tidak terdaftar pada program ini",
            ])->withInput();
        }
    }

    public function upload_surat_pendukung_create($event_id, $nik)
    {
        return view('user.upload-surat-pendukung-create', [
            "title" => "Upload Surat Pendukung",
            "event_id" => $event_id,
            "participant" => EventResponse::firstWhere("nik", $nik),
        ]);
    }

    public function upload_surat_pendukung_store(Request $request)
    {
        $event_id = $request->event_id;
        $nik = $request->nik;
        $event_response_id = EventResponse::where([
            ["nik", "=", $nik],
            ["event_id", "=", $event_id],
        ])->first()->id;

        DB::beginTransaction();
        try {
            $file = $request->file("surat_pendukung");
            $fileName = "SURAT_PENDUKUNG_" . date("Ymdhis") . "." . $file->extension();
            $file->move(public_path("uploads/surat-pendukung/"), $fileName);

            SuratPendukung::create([
                "event_id" => $request->event_id,
                "event_response_id" => $event_response_id,
                "filename" => $fileName,
            ]);
            DB::commit();
            return redirect()->route("pendaftaran.upload.done", Event::find($event_id)->slug);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with("notification", [
                "icon" => "error",
                "title" => "Gagal",
                "text" => $e->getMessage(),
            ]);
        }
    }

    public function upload_surat_pendukung_done($slug)
    {
        $event = Event::firstWhere("slug", $slug);
        // $event = Event::firstWhere("url", $url);
        return view('user.upload-surat-pendukung-done', [
            "title" => "Berhasil Upload Surat Pendukung",
            "event" => $event,
        ]);
    }

    public function asesor()
    {
        return view("user.asesor", [
            "title" => "Asesor",
        ]);
    }

    public function galeri()
    {
        return view("user.galeri", [
            "title" => "Galeri",
            "galleries" => Gallery::latest()->get(),
        ]);
    }

    public function galeri_detail($id)
    {
        $galerry = Gallery::find($id);
        return response()->json([
            "image" => $galerry->name,
        ]);
    }

    public function berita()
    {
        return view("user.berita", [
            "title" => "Berita",
            "data_berita" => Berita::latest()->get(),
        ]);
    }

    public function berita_detail($slug)
    {
        $berita = Berita::where("slug", $slug)->first();
        $berita->update([
            "views" => $berita->views + 1,
        ]);
        return view("user.berita-detail", [
            "title" => "Detail Berita",
            "berita" => Berita::where("slug", $slug)->first(),
            "data_berita" => Berita::where("slug", "!=", $slug)->limit(3)->latest()->get(),
        ]);
    }

    public function jadwal()
    {
        return view("user.jadwal", [
            "title" => "Jadwal",
            "events" => Event::where("is_active", 1)->latest()->get(),
        ]);
    }

    public function jadwal_detail($id)
    {
        return response()->json([
            "html" => view('components.modal-detail-jadwal', [
                "event" => Event::find($id),
            ])->render(),
        ]);
    }

    public function admin_dashboard()
    {
        return view("admin.dashboard", [
            "title" => "Dashboard",
        ]);
    }

    public function direct_admin()
    {
        return redirect()->route("admin.profil-perusahaan.index");
    }
}
