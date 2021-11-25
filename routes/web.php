<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [TicketController::class, 'create'])->name('home');
Route::get('/list', [TicketController::class, 'index'])->name('list');
Route::get('list/{id}', [TicketController::class, 'show'])->where(['id' => '[0-9]+'])->name('show');