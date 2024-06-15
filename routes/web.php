<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LanguageController;

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

// Rotte per la pagina di benvenuto e la visualizzazione dei piatti di una categoria
Route::get('/', function () {
    $categories = \App\Models\Category::all();
    return view('welcome', compact('categories'));
});




Route::middleware(['auth'])->group(function () {
    Route::match(['get', 'post'], '/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('dishes', DishController::class);
    Route::resource('categories', CategoryController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::post('/language-switch', [LanguageController::class, 'switch'])->name('language.switch');
