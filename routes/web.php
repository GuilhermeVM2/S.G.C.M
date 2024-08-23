<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\EspecialidadesController;
use App\Http\Middleware\ConsultasMiddleware;

// Rota para exibir a homePage
Route::get('/', [HomeController::class,'index'])->name('home');

// Rota para exibir o formulário de registro
Route::get('/registro', [UserController::class,'showRegistroForm'])->name('usuarios.registro');

// Rota para processar o registro
Route::post('/registro', [UserController::class,'registro'])->name('usuarios.registro');

// Rota para exibir o formulário de login
Route::get('/login', [UserController::class,'showLoginForm'])->name('usuarios.login');

// Rota para processar o login
Route::post('/login', [UserController::class,'login'])->name('usuarios.login');

// Rota para página interna (Dashboard)
Route::get('/dashboard', [DashboardController::class,'index'])->middleware('auth')->name('dashboard');

// Rota para Logout
Route::post('/logout', [UserController::class,'logout'])->name('usuarios.logout');

// Rotas para Consultas
Route::resource('/consultas', ConsultasController::class)->middleware('auth');

// Rota para visualizar uma consulta específica
Route::get('/consultas/{consulta}', [ConsultasController::class,'show'])->middleware('auth')->name('consultas.show');

// Rota para reagendar uma consulta
Route::post('/consultas/reschedule/{consulta}', [ConsultasController::class,'reschedule'])->middleware('auth')->name('consultas.reschedule');

Route::post('/consultas/{consulta}/agendar', [ConsultasController::class, 'agendar'])->name('consultas.agendar');


// Rotas para Especialidades
Route::get('/especialidades/create', [EspecialidadesController::class, 'create'])->middleware('auth')->name('especialidades.create');
Route::post('/especialidades', [EspecialidadesController::class, 'store'])->middleware('auth')->name('especialidades.store');

