<?php

namespace App\Filament\Admin\Resources\Users\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columnSpanFull()
                    ->columns(2)
                    ->schema([

                        ImageEntry::make('user_avatar')
                            ->state(fn($record) => $record->getFilamentAvatarUrl())
                            ->hiddenLabel()
                            ->alignCenter()
                            ->columnSpanFull()
                            ->circular(),

                        TextEntry::make('name'),

                        TextEntry::make('email')
                            ->label('Email address'),

                        TextEntry::make('email_verified_at')
                            ->dateTime()
                            ->placeholder('-'),

                        TextEntry::make('created_at')
                            ->dateTime()
                            ->placeholder('-'),

                        TextEntry::make('updated_at')
                            ->dateTime()
                            ->placeholder('-'),
                    ])
            ]);
    }
}
