<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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
// Route::get('/', [MainController::class, 'index'])->name('main');
Route::get('/invoice', [MainController::class, 'invoice'])->name('invoice');
Route::post('/invoice/display', [MainController::class, 'displayInvoice'])->name('displayInvoice');
Route::get('/invoice/history', [MainController::class, 'invoiceHistory'])->name('invoice.history');

Route::get('/categories/subjects', [MainController::class, 'getSubjects']);
Route::get('/categories/years', [MainController::class, 'getYears']);
Route::get('/categories/price', [MainController::class, 'getPrice']);
// Authentication Routes

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');


// Route::get('/', function () {
//     return view('welcome');
// });
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// Route::middleware(['guest'])->group(function () {
//     Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
//     Route::post('login', [AuthenticatedSessionController::class, 'store']);

//     Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
//     Route::post('register', [RegisteredUserController::class, 'store']);
// });

// Route::middleware(['auth'])->group(function () {
//     Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
// });
