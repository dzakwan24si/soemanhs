<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Filament\Pages\Page;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Actions\Action;
use Filament\Support\Exceptions\Halt;
use Filament\Notifications\Notification;

class SettingsPage extends Page implements HasForms
{
    use InteractsWithForms;

    protected string $view = 'filament.pages.settings-page';

    public static function getNavigationIcon(): string|\BackedEnum|null
    {
        return 'heroicon-o-cog-6-tooth';
    }

    public static function getNavigationGroup(): string|\UnitEnum|null
    {
        return 'Sistem';
    }

    public function getTitle(): string|\Illuminate\Contracts\Support\Htmlable
    {
        return 'Pengaturan Situs';
    }

    public static function getNavigationLabel(): string
    {
        return 'Pengaturan Situs';
    }

    public ?array $data = [];

    public static function canAccess(): bool
    {
        return auth()->user()?->role === 'admin';
    }

    public function mount(): void
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        $this->form->fill($settings);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('site_name')->label('Nama Situs')->required(),
                Textarea::make('site_description')->label('Deskripsi Situs'),
                TextInput::make('contact_email')->label('Email Kontak')->email(),
                TextInput::make('contact_phone')->label('Telepon Kontak'),
                Textarea::make('contact_address')->label('Alamat Kontak'),
                TextInput::make('social_facebook')->label('URL Facebook'),
                TextInput::make('social_instagram')->label('URL Instagram'),
                TextInput::make('social_youtube')->label('URL YouTube'),
                TextInput::make('hero_title')->label('Judul Hero'),
                Textarea::make('hero_subtitle')->label('Subjudul Hero'),
                TextInput::make('ppdb_status')->label('Status PPDB'),
                TextInput::make('ppdb_link')->label('Link PPDB'),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        try {
            $data = $this->form->getState();

            foreach ($data as $key => $value) {
                Setting::updateOrCreate(['key' => $key], ['value' => $value]);
            }
            
            Notification::make()
                ->success()
                ->title('Pengaturan berhasil disimpan')
                ->send();
        } catch (Halt $exception) {
            return;
        }
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Simpan Pengaturan')
                ->submit('save'),
        ];
    }
}
