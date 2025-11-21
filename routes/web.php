<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DisciplinaController;

Route::get('/', function () {
    return redirect('/home');
});


Route::get('/principal', [MainController::class, 'index']);
Route::get('/home', function () { return view('home'); }) -> name('home');

Route::resource('/aluno', AlunoController::class);
Route::resource('/curso', CursoController::class);
Route::resource('/disciplina', DisciplinaController::class);

Route::get('/report/aluno', [AlunoController::class, 'report']) -> name('report.aluno');
Route::get('/report/curso', [CursoController::class, 'report']) -> name('report.curso');
Route::get('/report/disciplina', [DisciplinaController::class, 'report'])->name('report.disciplina');