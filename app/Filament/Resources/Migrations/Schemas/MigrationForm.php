<?php

namespace App\Filament\Resources\Migrations\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class MigrationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextInput::make('migration')
                            ->label('Nama migration')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->columnSpanFull()
                            ->helperText('Contoh: 2026_01_10_000000_create_users_table'),
                        TextInput::make('batch')
                            ->label('Batch')
                            ->required()
                            ->numeric()
                            ->minValue(1),
                    ]),
            ]);
    }
}
