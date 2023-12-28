<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ShelfController;
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

Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {

    // Perfil
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Clientes
        Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
        Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
        Route::post('/customer/create', [CustomerController::class, 'store'])->name('customer.store');
        Route::get('/customer/view/{id}', [CustomerController::class, 'show'])->name('customer.view');
        Route::get('/customer/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
        Route::post('/customer/edit/{id}', [CustomerController::class, 'update'])->name('customer.update');
        Route::delete('/customer/delete/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
    
    // Estanterias
        Route::get('/shelf', [ShelfController::class, 'index'])->name('shelf.index');
        Route::get('/shelf/create', [ShelfController::class, 'create'])->name('shelf.create');
        Route::post('/shelf/create', [ShelfController::class, 'store'])->name('shelf.store');
        Route::get('/shelf/view/{id}', [ShelfController::class, 'show'])->name('shelf.view');
        Route::get('/shelf/edit/{id}', [ShelfController::class, 'edit'])->name('shelf.edit');
        Route::post('/shelf/edit/{id}', [ShelfController::class, 'update'])->name('shelf.update');
        Route::delete('/shelf/delete/{id}', [ShelfController::class, 'destroy'])->name('shelf.destroy');

    // Libros
        Route::get('/book', [BookController::class, 'index'])->name('book.index');
        Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
        Route::post('/book/create', [BookController::class, 'store'])->name('book.store');
        Route::get('/book/view/{id}', [BookController::class, 'show'])->name('book.view');
        Route::get('/book/edit/{id}', [BookController::class, 'edit'])->name('book.edit');
        Route::post('/book/edit/{id}', [BookController::class, 'update'])->name('book.update');
        Route::delete('/book/delete/{id}', [BookController::class, 'destroy'])->name('book.destroy');
});

require __DIR__.'/auth.php';
