<?php

use App\Http\Controllers\SalonController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';


Route::get('/', function () {
    $routes = collect(Route::getRoutes())->map(function ($route) {
        return [
            'method' => implode('|', $route->methods()),
            'uri' => $route->uri(),
            'name' => $route->getName(),
            'action' => $route->getActionName(),
        ];
    });

    return response()->json(['Api'=>'v.1','Rotas'=>$routes]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'user' => UserController::class,
    'salon' => SalonController::class,
]);

Route::post('/register-salon', [SalonController::class, 'store'])
    ->middleware('guest')
    ->name('register-salon');
