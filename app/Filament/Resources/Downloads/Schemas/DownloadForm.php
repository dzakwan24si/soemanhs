<?php

namespace App\Filament\Resources\Downloads\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DownloadForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('file_path')
                    ->required(),
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
