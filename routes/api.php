<?php
// Laravel Sanctum permite autenticar en APis usando tokens personales
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;

//Llama al método register del controlador RegisterController
Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);
//Ruta protegida por Sanctum para cerrar sesión
Route::middleware('auth:sanctum')->post('logout', [LoginController::class, 'logout']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user(); 
});

