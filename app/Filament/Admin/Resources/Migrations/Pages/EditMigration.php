<?php

namespace App\Filament\Admin\Resources\Migrations\Pages;

use App\Filament\Admin\Resources\Migrations\MigrationResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMigration extends EditRecord
{
    protected static string $resource = MigrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
