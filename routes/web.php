<?php

use App\Mail\BlogPosted;
use PhpParser\Node\Expr\PostInc;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthenticateController;

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

Route::get('login', [AuthenticateController::class, 'index']);
Route::post('login', [AuthenticateController::class, 'login']);
Route::get('register', [AuthenticateController::class, 'register']);
Route::post('register', [AuthenticateController::class, 'registration']);
Route::get('logout', [AuthenticateController::class, 'logout']);

Route::resource('blog', BlogController::class);

Route::get('/test-email', function () {
    try {
        Mail::to('admin@gmail.com')->send(new \App\Mail\BlogPosted());
        return 'Email berhasil dikirim!';
    } catch (\Exception $e) {
        Log::error('Gagal mengirim email', ['error' => $e]);
        return 'Gagal mengirim email: ' . $e->getMessage();
    }
});
