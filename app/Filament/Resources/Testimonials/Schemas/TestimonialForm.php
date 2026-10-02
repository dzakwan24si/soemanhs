<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Testimoni')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama')
                            ->required(),
                        TextInput::make('role')
                            ->label('Peran / Jabatan')
                            ->helperText('Contoh: Alumni, Orang Tua Siswa'),
                        Textarea::make('content')
                            ->label('Isi Testimoni')
                            ->required()
                            ->columnSpanFull(),
                    ])->columns(2),

                Section::make('Foto Profil')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Foto')
                            ->image()
                            ->imageEditor()
                            ->directory('testimonials')
                            ->maxSize(4096)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp']),
                    ]),
            ]);
    }
}
