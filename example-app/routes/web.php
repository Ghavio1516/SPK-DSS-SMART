<?php

use App\Http\Controllers\EntryController;
use App\Http\Controllers\AlternativeController;

Route::get('/', [EntryController::class, 'index'])->name('home');
Route::post('/submit', [EntryController::class, 'store'])->name('submit');
Route::get('/calculate/{id}', [EntryController::class, 'calculate'])->name('calculate');
Route::get('/history', [EntryController::class, 'history'])->name('history');
Route::delete('/history/{id}', [EntryController::class, 'destroy'])->name('history.delete');

Route::get('/alternatives', [AlternativeController::class, 'index'])->name('alternatives.index');
Route::post('/alternatives', [AlternativeController::class, 'store'])->name('alternatives.store');

