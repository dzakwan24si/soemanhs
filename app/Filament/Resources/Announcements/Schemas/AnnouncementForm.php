<?php

namespace App\Filament\Resources\Announcements\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Hidden;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class AnnouncementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Isi Pengumuman')
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul Pengumuman')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, \Filament\Schemas\Components\Utilities\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->unique(ignoreRecord: true),
                        Textarea::make('content')
                            ->label('Konten Pengumuman')
                            ->required()
                            ->columnSpanFull(),
                    ])->columns(2),

                Section::make('Lampiran & Status')
                    ->schema([
                        FileUpload::make('attachment')
                            ->label('Lampiran File (Opsional)')
                            ->directory('announcements')
                            ->maxSize(10240)
                            ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/zip']),
                        Toggle::make('is_active')
                            ->label('Aktif / Tampilkan')
                            ->default(true)
                            ->required(),
                        Hidden::make('user_id')
                            ->default(fn () => auth()->id()),
                    ])->columns(2),
            ]);
    }
}

