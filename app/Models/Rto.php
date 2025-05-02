<?php

namespace App\Models;

use App\Traits\HasStatus;
use Illuminate\Database\Eloquent\Model;

class Rto extends Model
{
    //
    use HasStatus;
    protected $guarded = [];
}
