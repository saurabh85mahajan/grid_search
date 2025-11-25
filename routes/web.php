<?php

use App\Livewire\CarInsurance;
use App\Livewire\DigitGridCarSearch;
use App\Livewire\IciciGridCarSearch;
use App\Livewire\IciciGridCvSearch;
use Illuminate\Support\Facades\Route;
use App\Livewire\PublicInsuranceSearch;
use App\Livewire\TwoWheelerInsurance;

Route::get('/', PublicInsuranceSearch::class);
Route::get('/employee/insurance-grid-search', PublicInsuranceSearch::class)
    ->defaults('userType', 'employee');

Route::get('/car', CarInsurance::class)->name('car-insurance');
Route::get('/car/icici', IciciGridCarSearch::class)->name('icici-grid-car');
Route::get('/car/digit', DigitGridCarSearch::class)->name('digit-grid-car');


Route::get('/cv/icici', IciciGridCvSearch::class)->name('icici-grid-car');
Route::get('/two-wheeler', TwoWheelerInsurance::class)->name('two-wheeler-insurance');