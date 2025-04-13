<?php

use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource(name: 'user', controller: UserController::class)
->only('store');

Route::apiResource(name: 'login', controller: LoginController::class)
->only('store');

Route::apiResource(name: 'pacientes', controller: PacientesController::class)
->only('store')
->middleware('auth:sanctum');

Route::apiResource(name: 'pacientes/{paciente}/consultas', controller: ConsultasController::class)
->only('store', 'destroy')
->middleware('auth:sanctum');


