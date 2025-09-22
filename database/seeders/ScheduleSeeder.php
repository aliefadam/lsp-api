<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schedule::create([
            'id' => 1,
            'event_id' => 1,
            'scheme_id' => 1,
        ]);
        Schedule::create([
            'id' => 2,
            'event_id' => 1,
            'scheme_id' => 2,
        ]);
        Schedule::create([
            'id' => 3,
            'event_id' => 1,
            'scheme_id' => 3,
        ]);
    }
}
