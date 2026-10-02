<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use App\Models\ContactMessage;
use App\Models\Event;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 2;

    protected function getStats(): array
    {
        return [
            Stat::make('Berita Terbit', Post::where('status', 'published')->count())
                ->description('Total berita dipublikasikan')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),
            Stat::make('Berita Draft', Post::where('status', 'draft')->count())
                ->description('Total berita belum dipublikasikan')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('warning'),
            Stat::make('Pesan Belum Dibaca', ContactMessage::where('is_read', false)->count())
                ->description('Pesan baru dari pengunjung')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('danger'),
            Stat::make('Agenda Mendatang', Event::where('start_date', '>=', now())->count())
                ->description('Agenda sekolah yang akan datang')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('primary'),
        ];
    }
}
