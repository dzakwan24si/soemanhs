<?php

namespace App\Filament\Resources\Staff\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class StaffForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Profil Staf')
                    ->description('Masukkan data diri staf atau guru.')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Lengkap')
                            ->required(),
                        TextInput::make('position')
                            ->label('Jabatan / Posisi')
                            ->required(),
                        TextInput::make('sort_order')
                            ->label('Urutan')
                            ->helperText('Angka urutan tampil. Makin kecil makin atas.')
                            ->numeric()
                            ->default(0),
                    ])->columns(2),
                
                Section::make('Foto Staf')
                    ->schema([
                        FileUpload::make('photo')
                            ->label('Foto Profil')
                            ->image()
                            ->imageEditor()
                            ->directory('staff')
                            ->maxSize(4096)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp']),
                    ]),
            ]);
    }
}
