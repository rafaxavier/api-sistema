<?php

use App\Http\Controllers\SalonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/verified/{verified}', function ($parametro) {
    return view('verified', ['parametro' => $parametro]);
})->name('verified');

// http://localhost:8000/api/reset/password/92350d748568adccf64db3a3377069a74fc3226d1bf1764de8dea60106ae1461?email=rxn.90s@gmail.com
Route::get('/reset/password/{token}', function ($token, Request $request) {
    $email = $request->query('email');
    return view('reset-password', ['token' => $token, 'email'=>$email]);
})->name('reset-password');


Route::post('/register-salon', [SalonController::class, 'store'])
    ->middleware('guest')
    ->name('register-salon');

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

require __DIR__ . '/auth.php';
