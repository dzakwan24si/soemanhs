<?php

namespace App\Filament\Resources\Achievements\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class AchievementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Prestasi')
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul Prestasi')
                            ->required(),
                        DatePicker::make('date')
                            ->label('Tanggal Prestasi')
                            ->required(),
                        TextInput::make('level')
                            ->label('Tingkat')
                            ->helperText('Contoh: Nasional, Provinsi, Kota')
                            ->required(),
                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->columnSpanFull(),
                    ])->columns(2),

                Section::make('Foto Prestasi')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Foto Dokumentasi')
                            ->image()
                            ->imageEditor()
                            ->directory('achievements')
                            ->maxSize(4096)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp']),
                    ]),
            ]);
    }
}
