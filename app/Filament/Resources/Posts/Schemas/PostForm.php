<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Hidden;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Isi Berita')
                    ->description('Tuliskan judul dan isi berita utama.')
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul Berita')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, \Filament\Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                        TextInput::make('slug')
                            ->label('Slug URL')
                            ->helperText('Otomatis dibuat dari judul. Hanya ubah jika diperlukan untuk SEO.')
                            ->required()
                            ->unique(ignoreRecord: true),
                        RichEditor::make('content')
                            ->label('Konten Berita')
                            ->required()
                            ->columnSpanFull(),
                    ])->columns(2),

                Section::make('Gambar & Media')
                    ->description('Unggah gambar utama untuk berita ini.')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Gambar Utama')
                            ->image()
                            ->imageEditor()
                            ->directory('posts')
                            ->maxSize(4096)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->columnSpanFull(),
                    ]),

                Section::make('Penerbitan & Meta')
                    ->description('Atur kategori, status, dan jadwal tayang.')
                    ->schema([
                        Select::make('category_id')
                            ->label('Kategori')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload(),
                        Select::make('user_id')
                            ->label('Penulis')
                            ->relationship('user', 'name')
                            ->default(fn () => auth()->id())
                            ->required(),
                        Select::make('status')
                            ->label('Status')
                            ->helperText('Pilih Terbit jika berita sudah siap dibaca publik.')
                            ->options([
                                'draft' => 'Draft',
                                'published' => 'Terbit',
                            ])
                            ->required()
                            ->default('draft'),
                        DateTimePicker::make('published_at')
                            ->label('Jadwal Tayang')
                            ->helperText('Kosongkan jika ingin segera diterbitkan saat status Terbit.'),
                        Hidden::make('views')->default(0),
                    ])->columns(2),
            ]);
    }
}
