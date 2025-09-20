<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\AuditController;

Auth::routes();

Route::redirect('/', '/home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/inventories', [InventoryController::class, 'index'])->name('inventories.index');
Route::get('/inventories/create', [InventoryController::class, 'create'])->name('inventories.create');
Route::post('/inventories/create', [InventoryController::class, 'store'])->name('inventories.store');
Route::get('/inventories/{inventory}', [InventoryController::class, 'show'])->name('inventories.show');
Route::get('/inventories/{inventory}/edit', [InventoryController::class, 'edit'])->name('inventories.edit');
Route::post('/inventories/{inventory}/edit', [InventoryController::class, 'update'])->name('inventories.update');
Route::get('/inventories/{inventory}/delete', [InventoryController::class, 'destroy'])->name('inventories.destroy');
Route::post('/inventories/{inventory}/restore', [InventoryController::class, 'restore'])->name('inventories.restore');
Route::delete('/inventories/{inventory}/force-delete', [InventoryController::class, 'forceDelete'])->name('inventories.forceDelete');


Route::get('/audits', [AuditController::class, 'index'])->name('audits.index');