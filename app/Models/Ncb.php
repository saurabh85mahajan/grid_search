<?php

namespace App\Models;

use App\Traits\HasStatus;
use Illuminate\Database\Eloquent\Model;

class Ncb extends Model
{
    //
    use HasStatus;
    protected $guarded = [];
}
