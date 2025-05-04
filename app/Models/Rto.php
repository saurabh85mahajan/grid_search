<?php

namespace App\Models;

use App\Traits\HasStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Rto extends Model
{
    //
    use HasStatus;
    protected $guarded = [];

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->name . ' - ' . $this->code,
        );
    }
}
