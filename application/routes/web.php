<?php

use App\Http\Controllers\Telegram\WebhookController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form', function () {
    return view('form');
});

Route::post('/send-message', [TelegramController::class, 'sendMessage'])->name('telegram.form-submit');


Route::prefix('telegram')
    ->name('telegram.')
    ->group(function () {
        Route::get('webhook', [WebhookController::class, 'set'])->name('webhook-set');
        Route::post('webhook', [WebhookController::class, 'handle'])->name('webhook-handle');
    });
