<?php

use App\Livewire\CarInsurance;
use App\Livewire\CvInsurance;
use App\Livewire\DigitGridCarSearch;
use App\Livewire\HdfcGridCarSearch;
use App\Livewire\IciciGridCarSearch;
use App\Livewire\IciciGridCvSearch;
use Illuminate\Support\Facades\Route;
use App\Livewire\PublicInsuranceSearch;
use App\Livewire\SriramGridCarSearch;
use App\Livewire\TataGridCarSearch;
use App\Livewire\TwoWheelerInsurance;

Route::get('/', PublicInsuranceSearch::class);
Route::get('/employee/insurance-grid-search', PublicInsuranceSearch::class)
    ->defaults('userType', 'employee');

Route::get('/car', CarInsurance::class)->name('car-insurance');
Route::get('/car/icici', IciciGridCarSearch::class)->name('icici-grid-car');
Route::get('/car/digit', DigitGridCarSearch::class)->name('digit-grid-car');
Route::get('/car/hdfc', HdfcGridCarSearch::class)->name('hdfc-grid-car');
Route::get('/car/tata', TataGridCarSearch::class)->name('tata-grid-car');
Route::get('/car/sriram', SriramGridCarSearch::class)->name('sriram-grid-car');

Route::get('/cv', CvInsurance::class)->name('cv-insurance');
Route::get('/cv/icici', IciciGridCvSearch::class)->name('icici-grid-cv');

Route::get('/two-wheeler', TwoWheelerInsurance::class)->name('two-wheeler-insurance');