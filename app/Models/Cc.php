<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cc extends Model
{
    //
    protected $table = 'ccs';
    protected $guarded = [];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function previousInsurer()
    {
        return $this->belongsTo(InsuranceCompany::class, 'py_insurance_company_id');
    }

    public function insuranceCompany()
    {
        return $this->belongsTo(InsuranceCompany::class);
    }

    public function fuelType()
    {
        return $this->belongsTo(FuelType::class);
    }

    public function make()
    {
        return $this->belongsTo(Make::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function ncb()
    {
        return $this->belongsTo(NCB::class);
    }

    // Add scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
	
	public function salutation()
    {
        return $this->belongsTo(Salutation::class);
    }
	
	public function region()
    {
        return $this->belongsTo(Region::class);
    }
	
	public function businessLock()
    {
        return $this->belongsTo(BusinessLock::class);
    }
	
	public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }
	
	public function rto()
    {
        return $this->belongsTo(Rto::class);
    }
	
}
