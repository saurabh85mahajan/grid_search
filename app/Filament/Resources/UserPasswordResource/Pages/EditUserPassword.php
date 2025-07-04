<?php

namespace App\Filament\Resources\UserPasswordResource\Pages;

use App\Filament\Resources\UserPasswordResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditUserPassword extends EditRecord
{
    protected static string $resource = UserPasswordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('back')
                ->label('Back to List')
                ->icon('heroicon-m-arrow-left')
                ->url($this->getResource()::getUrl('index')),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Password Updated')
            ->body('The user password has been successfully updated.');
    }
}
