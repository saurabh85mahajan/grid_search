<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Http\Controllers\ImpersonateController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/protected-file/{path}', function ($path) {
    // Only allow authenticated users
    if (!Auth::check()) {
        abort(403);
    }
    
    // Clean the path to prevent directory traversal
    $path = str_replace('..', '', $path);
    
    // Check if file exists
    if (!Storage::disk('protected')->exists($path)) {
        abort(404);
    }
    
    // Return the file
    return response()->file(storage_path('app/protected/' . $path));
})->where('path', '.*')->middleware('auth');

Route::middleware(['web'])->group(function () {
    Route::get('/remote-aidesk/account-manager/impersonate/{user}', [ImpersonateController::class, 'start'])->name('impersonate.start');
    Route::get('/remote-aidesk/account-manager/impersonate/leave', [ImpersonateController::class, 'stop'])->name('impersonate.stop');
});