<?php

use App\Livewire\IciciGridCarSearch;
use Illuminate\Support\Facades\Route;
use App\Livewire\PublicInsuranceSearch;

Route::get('/', PublicInsuranceSearch::class);
Route::get('/employee/insurance-grid-search', PublicInsuranceSearch::class)
    ->defaults('userType', 'employee');


Route::get('/icici', IciciGridCarSearch::class);    