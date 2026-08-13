<?php

namespace App\Filament\Resources\Migrations\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class MigrationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([
                        TextEntry::make('id')
                            ->label('ID'),
                        TextEntry::make('batch')
                            ->label('Batch'),
                        TextEntry::make('migration')
                            ->label('Nama migration')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
