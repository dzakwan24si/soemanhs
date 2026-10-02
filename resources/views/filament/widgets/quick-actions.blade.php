<x-filament-widgets::widget>
    <x-filament::section>
        <h2 class="text-lg font-bold mb-4">Aksi Cepat</h2>
        <div class="flex gap-4">
            <x-filament::button
                href="{{ \App\Filament\Resources\Posts\PostResource::getUrl('create') }}"
                tag="a"
                icon="heroicon-m-pencil-square"
            >
                Tulis Berita
            </x-filament::button>
            
            <x-filament::button
                href="{{ \App\Filament\Resources\Announcements\AnnouncementResource::getUrl('create') }}"
                tag="a"
                icon="heroicon-m-megaphone"
                color="info"
            >
                Tambah Pengumuman
            </x-filament::button>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
