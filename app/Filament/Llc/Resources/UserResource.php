<?php

namespace App\Filament\Llc\Resources;

use App\Filament\Llc\Resources\UserResource\Pages;
use App\Filament\Resources\Base\BaseUserResource;

class UserResource extends BaseUserResource
{
    public const ORGANISATION_ID = 1;
	
	protected static function getListPageClass(): string
    {
        return Pages\ListUsers::class;
    }

    protected static function getCreatePageClass(): string
    {
        return Pages\CreateUser::class;
    }

    protected static function getEditPageClass(): string
    {
        return Pages\EditUser::class;
    }
}

