<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Hidden;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Galeri')
                    ->description('Masukkan judul dan deskripsi album galeri.')
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul Galeri')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, \Filament\Schemas\Components\Utilities\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                        TextInput::make('slug')
                            ->label('Slug URL')
                            ->required()
                            ->unique(ignoreRecord: true),
                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->columnSpanFull(),
                        Hidden::make('user_id')
                            ->default(fn () => auth()->id()),
                    ])->columns(2),
                
                Section::make('Sampul Galeri')
                    ->schema([
                        FileUpload::make('cover_image')
                            ->label('Gambar Sampul')
                            ->image()
                            ->imageEditor()
                            ->directory('galleries')
                            ->maxSize(4096)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp']),
                    ]),

                Section::make('Foto Galeri')
                    ->description('Tambahkan banyak foto ke dalam galeri ini.')
                    ->schema([
                        FileUpload::make('uploaded_items')
                            ->label('Unggah Foto-foto (Bisa pilih banyak)')
                            ->multiple()
                            ->reorderable()
                            ->image()
                            ->imageEditor()
                            ->directory('gallery-items')
                            ->maxSize(4096)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->afterStateHydrated(function (FileUpload $component, $record) {
                                if ($record) {
                                    $component->state($record->items->pluck('image')->toArray());
                                }
                            })
                            ->dehydrated(false)
                            ->saveRelationshipsUsing(function ($record, $state) {
                                $newPaths = $state ?? [];
                                $existingPaths = $record->items()->pluck('image')->toArray();
                                
                                // Hapus yang sudah tidak ada
                                $record->items()->whereNotIn('image', $newPaths)->delete();
                                
                                // Tambahkan yang baru
                                foreach ($newPaths as $path) {
                                    if (!in_array($path, $existingPaths)) {
                                        $record->items()->create([
                                            'image' => $path,
                                        ]);
                                    }
                                }
                            }),
                    ]),
            ]);
    }
}

