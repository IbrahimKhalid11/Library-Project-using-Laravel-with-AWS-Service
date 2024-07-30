<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

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



Route::get("/categories",[CategoryController::class, "all"]);
Route::get("/categories/show/{id}",[CategoryController::class, "show"]);

// insert 2 rout(get-post)
// form
Route::get("/categories/create",[CategoryController::class, "create"]);
Route::post("/categories",[CategoryController::class, "store"]);







// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/Welcome/{x?}/{y?}',function ($x,$y){
//     $fullname="$x $y";
//     return view('all')->with("Fullname",$fullname);
// });


// Route::get("HiController/{x?}/{y?}",[TestController::class,"all"]);