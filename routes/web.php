<?php

use App\Http\Controllers\ProjectController;
use App\Http\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum','verified'])->group(function () {
    Route::get('dashboard', Dashboard::class)->name('dashboard');
});

Route::prefix('api')
    ->middleware([
        'auth:sanctum',
        'verified',
    ])
    ->group(function () {
        Route::controller(ProjectController::class)->group(function (){
  
        });
    }
);

