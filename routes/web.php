<?php

use App\Http\Controllers\AsesorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventResponseController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\ProfilPerusahaanController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SchemeController;
use App\Http\Controllers\SosmedController;
use App\Http\Controllers\SuratPendukungController;
use App\Http\Controllers\SusunanPengurusController;
use App\Http\Controllers\TUKController;
use App\Http\Controllers\VisiMisiController;
use App\Models\Contact;
use Illuminate\Support\Facades\Route;

Route::get("/", [PageController::class, "index"])->name("home");
Route::get("/informasi", [PageController::class, "informasi"])->name("informasi");

Route::prefix("/sertifikasi")->group(function () {
    Route::get("/", [PageController::class, "sertifikasi"])->name("sertifikasi");
    Route::get("/{slug}", [PageController::class, "sertifikasi_detail"])->name("sertifikasi.detail");
    Route::get("/{slug}/done", [EventResponseController::class, "done"])->name("pendaftaran.done");

    Route::get("/upload-surat-pendukung/{url}", [PageController::class, "upload_surat_pendukung"])->name("pendaftaran.upload");
    Route::post("/upload-surat-pendukung/{url}/cek-nik", [PageController::class, "upload_surat_pendukung_cek_nik"])->name("pendaftaran.upload.cek-nik");
    Route::get("/upload-surat-pendukung/{event_id}/{nik}/create", [PageController::class, "upload_surat_pendukung_create"])->name("pendaftaran.upload.create");
    Route::post("/upload-surat-pendukung/store", [PageController::class, "upload_surat_pendukung_store"])->name("pendaftaran.upload.store");
    Route::get("/upload-surat-pendukung/{url}/done", [PageController::class, "upload_surat_pendukung_done"])->name("pendaftaran.upload.done");
});

Route::prefix("jadwal")->group(function () {
    Route::get("/", [PageController::class, "jadwal"])->name("jadwal");
    Route::get("/{id}", [PageController::class, "jadwal_detail"])->name("jadwal.show");
});

Route::prefix("galeri")->group(function () {
    Route::get("/", [PageController::class, "galeri"])->name("galeri");
    Route::get("/{id}", [PageController::class, "galeri_detail"])->name("galeri.show");
});

Route::prefix("berita")->group(function () {
    Route::get("/", [PageController::class, "berita"])->name("berita");
    Route::get("/{slug}", [PageController::class, "berita_detail"])->name("berita.detail");
});

Route::prefix("pendaftaran")->group(function () {
    Route::get("/", [EventResponseController::class, "create"])->name("pendaftaran.create");
    Route::post("/", [EventResponseController::class, "store"])->name("pendaftaran.store");
    Route::get("/{slug}/done", [EventResponseController::class, "done"])->name("pendaftaran.done");
    Route::get("/upload-surat-pendukung/{slug}", [EventResponseController::class, "upload_surat"])->name("pendaftaran.upload");
    Route::get("/show-participant/{id}", [EventResponseController::class, "show"])->name("pendaftaran.show");

    // Potensi Hapus Route
    Route::get("/{slug}/close", [EventResponseController::class, "close"])->name("pendaftaran.close");
});

Route::prefix("schedule")->group(function () {
    Route::get("/show/{scheme_id}", [ScheduleController::class, "show"])->name("schedule.show");
});

Route::middleware("guest")->group(function () {
    Route::prefix("login")->group(function () {
        Route::get("/", [AuthController::class, "login"])->name("login");
        Route::post("/", [AuthController::class, "login_post"])->name("login.post");
    });
});

Route::middleware("auth")->group(function () {
    Route::prefix("admin")->group(function () {
        // Route::get("/dashboard", [PageController::class, "admin_dashboard"])->name("admin.dashboard");

        Route::get("/", [PageController::class, "direct_admin"]);

        Route::prefix("profil-perusahaan")->group(function () {
            Route::get("/", [ProfilPerusahaanController::class, "index"])->name("admin.profil-perusahaan.index");
            Route::put("/", [ProfilPerusahaanController::class, "update"])->name("admin.profil-perusahaan.update");
        });

        Route::prefix("sosmed")->group(function () {
            Route::get("/", [SosmedController::class, "index"])->name("admin.sosmed.index");
            Route::put("/", [SosmedController::class, "update"])->name("admin.sosmed.update");
        });

        Route::prefix("contact")->group(function () {
            Route::get("/", [ContactController::class, "index"])->name("admin.contact.index");
            Route::put("/", [ContactController::class, "update"])->name("admin.contact.update");
        });

        Route::prefix("susunan-pengurus")->group(function () {
            Route::get("/", [SusunanPengurusController::class, "index"])->name("admin.susunan-pengurus.index");
            Route::put("/", [SusunanPengurusController::class, "update"])->name("admin.susunan-pengurus.update");
        });

        Route::prefix("visi-misi")->group(function () {
            Route::get("/", [VisiMisiController::class, "index"])->name("admin.visi-misi.index");
            Route::put("/", [VisiMisiController::class, "update"])->name("admin.visi-misi.update");
        });

        Route::prefix("scheme")->group(function () {
            Route::get("/", [SchemeController::class, "index"])->name("admin.scheme.index");
            Route::get("/create", [SchemeController::class, "create"])->name("admin.scheme.create");
            Route::post("/store", [SchemeController::class, "store"])->name("admin.scheme.store");
            Route::get("/edit/{id}", [SchemeController::class, "edit"])->name("admin.scheme.edit");
            Route::put("/update/{id}", [SchemeController::class, "update"])->name("admin.scheme.update");
            Route::delete("/destroy/{id}", [SchemeController::class, "destroy"])->name("admin.scheme.destroy");
        });

        Route::prefix("schedule")->group(function () {
            Route::get("/", [ScheduleController::class, "index"])->name("admin.schedule.index");
            Route::get("/create", [ScheduleController::class, "create"])->name("admin.schedule.create");
            Route::post("/store", [ScheduleController::class, "store"])->name("admin.schedule.store");
            Route::get("/edit/{id}", [ScheduleController::class, "edit"])->name("admin.schedule.edit");
            Route::put("/update/{id}", [ScheduleController::class, "update"])->name("admin.schedule.update");
            Route::delete("/destroy/{id}", [ScheduleController::class, "destroy"])->name("admin.schedule.destroy");
        });

        Route::prefix("event")->group(function () {
            Route::get("/", [EventController::class, "index"])->name("admin.event.index");
            Route::get("/create", [EventController::class, "create"])->name("admin.event.create");
            Route::post("/store", [EventController::class, "store"])->name("admin.event.store");
            Route::get("/show/{id}", [EventController::class, "show"])->name("admin.event.show");
            Route::get("/edit/{id}", [EventController::class, "edit"])->name("admin.event.edit");
            Route::get("/edit-status/{id}", [EventController::class, "edit_status"])->name("admin.event.edit-status");
            Route::put("/update/{id}", [EventController::class, "update"])->name("admin.event.update");
            Route::delete("/destroy/{id}", [EventController::class, "destroy"])->name("admin.event.destroy");
            Route::post("/send-notification", [EventController::class, "send_notification"])->name("admin.event.send-notification");
        });

        Route::prefix("surat-pendukung")->group(function () {
            Route::get("/{event_id}/{response_id}", [SuratPendukungController::class, "show"])->name("admin.surat-pendukung.show");
            Route::post("/{event_id}/{response_id}", [SuratPendukungController::class, "store"])->name("admin.surat-pendukung.store");
        });

        Route::prefix("tuk")->group(function () {
            Route::get("/", [TUKController::class, "index"])->name("admin.tuk.index");
            Route::get("/create", [TUKController::class, "create"])->name("admin.tuk.create");
            Route::post("/store", [TUKController::class, "store"])->name("admin.tuk.store");
            Route::get("/edit/{id}", [TUKController::class, "edit"])->name("admin.tuk.edit");
            Route::put("/update/{id}", [TUKController::class, "update"])->name("admin.tuk.update");
            Route::delete("/destroy/{id}", [TUKController::class, "destroy"])->name("admin.tuk.destroy");
        });

        Route::prefix("asesor")->group(function () {
            Route::get("/", [AsesorController::class, "index"])->name("admin.asesor.index");
            Route::get("/create", [AsesorController::class, "create"])->name("admin.asesor.create");
            Route::post("/store", [AsesorController::class, "store"])->name("admin.asesor.store");
            Route::get("/show/{id}", [AsesorController::class, "show"])->name("admin.asesor.show");
            Route::get("/edit/{id}", [AsesorController::class, "edit"])->name("admin.asesor.edit");
            Route::put("/update/{id}", [AsesorController::class, "update"])->name("admin.asesor.update");
            Route::delete("/destroy/{id}", [AsesorController::class, "destroy"])->name("admin.asesor.destroy");
        });

        Route::prefix("galeri")->group(function () {
            Route::get("/", [GalleryController::class, "index"])->name("admin.galeri.index");
            Route::post("/", [GalleryController::class, "store"])->name("admin.galeri.store");
            Route::delete("/{id}", [GalleryController::class, "destroy"])->name("admin.galeri.destroy");
        });

        Route::prefix("berita")->group(function () {
            Route::get("/", [BeritaController::class, "index"])->name("admin.berita.index");
            Route::get("/create", [BeritaController::class, "create"])->name("admin.berita.create");
            Route::post("/store", [BeritaController::class, "store"])->name("admin.berita.store");
            Route::get("/edit/{id}", [BeritaController::class, "edit"])->name("admin.berita.edit");
            Route::put("/update/{id}", [BeritaController::class, "update"])->name("admin.berita.update");
            Route::delete("/destroy/{id}", [BeritaController::class, "destroy"])->name("admin.berita.destroy");
        });

        Route::prefix("scheme")->group(function () {
            Route::delete("/destroy/{id}", [SchemeController::class, "destroy"])->name("admin.scheme.destroy");
        });

        Route::prefix("change-password")->group(function () {
            Route::get("/", [AuthController::class, "change_password"])->name("admin.change-password");
            Route::put("/", [AuthController::class, "change_password_post"])->name("admin.change-password.post");
        });
    });

    Route::get("/logout", [AuthController::class, "logout"])->name("logout");
});


Route::get("/tes", function () {
    return view('mail.send-notification', [
        "judul" => "Pemberitahuan Jadwal Uji Kompetensi",
        "pesan" => "Uji Kompetensi dilakukan pada tanggal 1 Agustus 2023",
    ]);
});
