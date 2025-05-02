<?php

namespace App\Models;

use App\Traits\HasStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    //
    use HasStatus;
    protected $guarded = [];

    public function productCategories(): HasMany
    {
        return $this->hasMany(ProductCategory::class);
    }

    public function makes(): HasMany
    {
        return $this->hasMany(Make::class);
    }
}
