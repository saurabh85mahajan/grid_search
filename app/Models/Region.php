<?php

namespace App\Models;

use App\Traits\HasStatus;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    //
    use HasStatus;
    protected $guarded = [];
}
