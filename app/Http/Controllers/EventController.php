<?php

namespace App\Http\Controllers;

use App\Mail\SendNotification;
use App\Models\Event;
use App\Models\EventResponse;
use App\Models\Schedule;
use App\Models\Scheme;
use App\Models\SuratPendukung;
use App\Models\TUK;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index()
    {
        return view('admin.event.index', [
            "title" => "Acara",
            "events" => Event::all(),
        ]);
    }

    public function create()
    {
        return view('admin.event.create', [
            "title" => "Tambah Acara",
            "tuks" => TUK::all(),
            "schemes" => Scheme::all(),
        ]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $newEvent = Event::create([
                "name" => $request->name,
                "slug" => Str::slug($request->name),
                "place" => $request->place,
                "date" => $request->date,
                "start_time" => $request->start_time,
                // "end_time" => $request->end_time,
                "desc" => $request->desc,
                "is_active" => true,
            ]);
            foreach ($request->schemes as $scheme) {
                Schedule::create([
                    "event_id" => $newEvent->id,
                    "scheme_id" => $scheme,
                ]);
            }
            DB::commit();
            return redirect()->route("admin.event.index")->with("notification", [
                "icon" => "success",
                "title" => "Berhasil",
                "text" => "Acara berhasil ditambahkan"
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with("notification", [
                "icon" => "error",
                "title" => "Gagal",
                "text" => $e->getMessage(),
            ]);
        }
    }

    public function show($id)
    {
        $event = Event::find($id);

        return view('admin.event.show', [
            "title" => $event->name,
            "event" => $event,
            "schedules" => Schedule::where('event_id', $event->id)->get()
        ]);
    }

    public function edit($id)
    {
        $event = Event::find($id);

        return view('admin.event.edit', [
            "title" => "Ubah Acara",
            "event" => $event,
            "tuks" => TUK::all(),
            "schemes" => Scheme::all(),
            "schedules" => Schedule::where('event_id', $event->id)->get()
        ]);
    }

    public function update($id, Request $request)
    {
        DB::beginTransaction();
        $event = Event::find($id);
        try {
            $event->update([
                "name" => $request->name,
                "slug" => Str::slug($request->name),
                "place" => $request->place,
                "date" => $request->date,
                "start_time" => $request->start_time,
                // "end_time" => $request->end_time,
                "desc" => $request->desc,
                "is_active" => true,
            ]);
            $event->schedules()->delete();
            foreach ($request->schemes as $scheme) {
                Schedule::create([
                    "event_id" => $event->id,
                    "scheme_id" => $scheme,
                ]);
            }
            DB::commit();
            return redirect()->route("admin.event.index")->with("notification", [
                "icon" => "success",
                "title" => "Berhasil",
                "text" => "Acara berhasil diubah"
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with("notification", [
                "icon" => "error",
                "title" => "Gagal",
                "text" => $e->getMessage(),
            ]);
        }
    }

    public function edit_status($id)
    {
        $event = Event::find($id);
        if ($event->is_active == true) {
            $event->update([
                "is_active" => false,
                $text = "Acara Ditutup"
            ]);
        } else {
            $event->update([
                "is_active" => true,
                $text = "Acara Dibuka"
            ]);
        }
        return redirect()->route("admin.event.index")->with("notification", [
            "icon" => "success",
            "title" => "Berhasil",
            "text" => $text,
        ]);
    }

    public function destroy($id)
    {
        try {
            $event = Event::find($id);
            $event->schedules()->delete();
            $event->delete();

            session()->flash("notification", [
                "icon" => "success",
                "title" => "Sukses",
                "text" => "Acara Berhasil dihapus",
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

    public function send_notification(Request $request)
    {
        $participants = EventResponse::where("event_id", $request->event_id)->get();
        foreach ($participants as $participant) {
            Mail::to($participant->email)->queue(new SendNotification($request->message, $request->title));
        }
        return back()->with("notification", [
            "icon" => "success",
            "title" => "Berhasil",
            "text" => "Pengumuman berhasil dikirim",
        ]);
    }
}
