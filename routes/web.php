<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AlunoController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/principal', [MainController::class, 'index']);
Route::resource('/alunos', AlunoController::class);
Route::get('/home', function () { return view('home'); }) -> name('home');
Route::get('/report/aluno', [AlunoController::class, 'report']) -> name('report.aluno');