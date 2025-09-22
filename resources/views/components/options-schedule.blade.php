@if ($schedules->count() == 0)
    <option value="">Belum ada jadwal untuk saat ini</option>
@else
    <option value="">-- Pilih --</option>
    @foreach ($schedules as $schedule)
        @if ($schedule->event->is_active == 1)
            <option value="{{ $schedule->event->id }}">
                {{ $schedule->event->name }} (Tanggal {{ $schedule->event->date }})
                •
                {{ $schedule->event->place }}
            </option>
        @endif
    @endforeach
@endif
