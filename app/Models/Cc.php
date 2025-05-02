<?php

namespace App\Models;

use App\Traits\HasStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cc extends Model
{
    use HasStatus;
    //
    protected $table = 'ccs';
    protected $guarded = [];

    protected $casts = [
        'add_on_coverages' => 'array',
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function previousInsurer(): BelongsTo
    {
        return $this->belongsTo(InsuranceCompany::class, 'py_insurance_company_id');
    }

    public function insuranceCompany(): BelongsTo
    {
        return $this->belongsTo(InsuranceCompany::class);
    }

    public function fuelType(): BelongsTo
    {
        return $this->belongsTo(FuelType::class);
    }

    public function make(): BelongsTo
    {
        return $this->belongsTo(Make::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function ncb()
    {
        return $this->belongsTo(NCB::class);
    }

	public function salutation(): BelongsTo
    {
        return $this->belongsTo(Salutation::class);
    }
	
	public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
	
	public function businessLock(): BelongsTo
    {
        return $this->belongsTo(BusinessLock::class);
    }
	
	public function productCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }
	
	public function rto(): BelongsTo
    {
        return $this->belongsTo(Rto::class);
    }

    public function bank(): BelongsTo
    {
        return $this->belongsTo(Bank::class);
    }
	
}
