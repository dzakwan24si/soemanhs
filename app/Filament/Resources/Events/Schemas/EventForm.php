<?php

namespace App\Filament\Resources\Events\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class EventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Agenda')
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul Agenda')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, \Filament\Schemas\Components\Utilities\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->unique(ignoreRecord: true),
                        Textarea::make('description')
                            ->label('Deskripsi Agenda')
                            ->required()
                            ->columnSpanFull(),
                    ])->columns(2),

                Section::make('Waktu & Tempat')
                    ->schema([
                        DateTimePicker::make('start_date')
                            ->label('Waktu Mulai')
                            ->required(),
                        DateTimePicker::make('end_date')
                            ->label('Waktu Selesai')
                            ->required(),
                        TextInput::make('location')
                            ->label('Lokasi')
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }
}

