<?php

use Illuminate\Http\Request;
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

// Route::get('/', function () {
//     return ['Laravel' => app()->version()];
// });

// require __DIR__.'/auth.php';

// Route::middleware(['web'])->group(function () {
//     // http://localhost:8000/api/reset/password/92350d748568adccf64db3a3377069a74fc3226d1bf1764de8dea60106ae1461?email=rxn.90s@gmail.com
//     Route::get('/reset/password/{token}', function ($token, Request $request) {
//         $email = $request->query('email');
//         return view('reset-password', ['token' => $token, 'email'=>$email]);
//     })->name('reset-password');
// });
// Route::middleware(['web'])->group(function () {
//     Route::get('/reset/password/{token}', function ($token, Request $request) {
//         $email = $request->query('email');
//         return view('reset-password', ['token' => $token, 'email' => $email]);
//     })->name('reset-password');
// });
