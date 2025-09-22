<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('admin.schedule.index', [
            "title" => "Jadwal",
            "schedules" => Schedule::all(),
        ]);
    }

    public function show($scheme_id)
    {
        $schedules = Schedule::where('scheme_id', $scheme_id)->get();
        return response()->json([
            "html" => view('components.options-schedule', [
                "schedules" => $schedules
            ])->render(),
        ]);
    }
}
