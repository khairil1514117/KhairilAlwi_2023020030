<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        // Upload Foto Profil Staff
                        FileUpload::make('photo_path')
                            ->label('Foto profil')
                            ->hiddenLabel()
                            ->avatar()
                            ->image()
                            ->alignCenter()
                            ->columnSpanFull()
                            ->disk('public')
                            ->directory('avatar')
                            ->imageEditor(),

                        TextInput::make('name')
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('email')
                            ->label('Alamat Email')
                            ->unique('users', 'email')
                            ->email()
                            ->required(),
                        TextInput::make('password')
                            ->label('Kata sandi')
                            ->password()
                            ->revealable()
                            ->required(),
                    ])

            ]);
    }
}
