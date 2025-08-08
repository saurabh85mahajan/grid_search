<?php

namespace App\Filament\Llc\Resources;

use App\Filament\Llc\Resources\UserResource\Pages;
use App\Filament\Resources\Base\BaseUserResource;

class UserResource extends BaseUserResource
{
    public const ORGANISATION_ID = 1;
	
	protected static function getListUserClass(): string
    {
        return Pages\ListUsers::class;
    }

    protected static function getCreateUserClass(): string
    {
        return Pages\CreateUser::class;
    }

    protected static function getEditUserClass(): string
    {
        return Pages\EditUser::class;
    }
}

