<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get("/categories", [CategoryController::class, "all"])->name("all");
Route::get("/categories/show/{id}", [CategoryController::class, "show"]);

// insert 2 routes (get-post)
Route::get('/categories/create', [CategoryController::class, 'create'])->name('add');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

Route::get('/categories/{id}/price', [CategoryController::class, 'getCategoryPrice']);

Route::get('/categories/editList', [CategoryController::class, 'editList'])->name('categories.editList');

// Add routes for editing and updating categories
Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

// main
Route::get('/', [MainController::class, 'index'])->name('main');
Route::get('/invoice', [MainController::class, 'invoice'])->name('invoice');
Route::post('/invoice/display', [MainController::class, 'displayInvoice'])->name('displayInvoice');
Route::get('/invoice/history', [MainController::class, 'invoiceHistory'])->name('invoice.history');

Route::get('/categories/subjects', [MainController::class, 'getSubjects']);
Route::get('/categories/years', [MainController::class, 'getYears']);
Route::get('/categories/price', [MainController::class, 'getPrice']);
