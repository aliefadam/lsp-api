<div class="p-4 md:p-5 space-y-3 scrollbar bg-white rounded-md overflow-y-auto h-[500px]">
    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">Nama Acara</span>
        <span class="lg:text-sm text-xs text-gray-600 text-right">
            {{ $event->name }}
        </span>
    </div>
    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">Tanggal</span>
        <span class="lg:text-sm text-xs text-gray-600 text-right">
            {{ \Carbon\Carbon::parse($event->date)->translatedFormat('l, d F Y') }}
        </span>
    </div>
    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">Jam</span>
        <span class="lg:text-sm text-xs text-gray-600 text-right">
            {{ $event->start_time }} - {{ $event->end_time }} WIB
        </span>
    </div>
    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">Lokasi</span>
        <span class="lg:text-sm text-xs text-gray-600 text-right">
            {{ $event->place }}
        </span>
    </div>
    <div class="grid grid-cols-2 border-b border-dashed pb-3">
        <span class="lg:text-sm text-xs">Deskripsi</span>
        <span class="lg:text-sm text-xs text-gray-600 text-right">
            {{ $event->desc ?? '-' }}
        </span>
    </div>
</div>
