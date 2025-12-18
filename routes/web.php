<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;

Route::get('/', function () {
    return redirect('/form');
});

Route::get('/form', [FormController::class, 'index']);
Route::post('/form-submit', [FormController::class, 'store'])->name('form.store');
