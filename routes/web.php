<?php

use App\Http\Controllers\CsvUploadController;
use App\Http\Controllers\OrderController;
use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\Route;

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
})->name('home');

Route::resource('order', OrderController::class);

Route::get('/send', function () {
    SendEmailJob::dispatch();
    return redirect()->route('home');
})->name('send.mail');

Route::get('/csv-upload', [CsvUploadController::class, 'upload'])->name('csv.upload');
Route::post('/csv-upload', [CsvUploadController::class, 'store'])->name('csv.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
