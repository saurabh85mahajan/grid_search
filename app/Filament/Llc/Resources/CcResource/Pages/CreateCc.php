<?php

namespace App\Filament\Llc\Resources\CcResource\Pages;

use App\Filament\Llc\Resources\CcResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateCc extends CreateRecord
{
    protected static string $resource = CcResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction(),
        ];
    }

    protected function getCreateFormAction(): Action
    {
        return parent::getCreateFormAction()
            ->label('Save');
    }
}
