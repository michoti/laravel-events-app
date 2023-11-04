<?php

use App\Http\Controllers\EventsController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MpesaSTKPUSHController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[IndexController::class, 'showIndexPage']);
Route::get('/events', [EventsController::class, 'index'])->name('events');
Route::get('/events/{id}', [EventsController::class,'show'])->name('events.show');
//search event route
Route::get('search/events', SearchController::class)->name('search.events');

Route::post('/makepayment', [PaymentController::class,'redirectToProvider']);

Route::post('/v1/mpesatest/stk/push', [MpesaSTKPUSHController::class, 'STKPush']);
Route::post('v1/confirm', [MpesaSTKPUSHController::class, 'STKConfirm'])->name('mpesa.confirm');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::fallback(fn() => Inertia::render('PageNotFound'));

require __DIR__.'/auth.php';
