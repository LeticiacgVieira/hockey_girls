<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JogoController;
use App\Http\Controllers\FaController;

// Rota para a página inicial (Home / Jogos)
Route::get('/', [JogoController::class, 'index'])->name('home');

// Rotas para a Central do Fã
Route::get('/central-do-fa', [FaController::class, 'index'])->name('fa');

// Rota para processar o formulário de cadastro da Central do Fã
Route::post('/central-do-fa/cadastro', [FaController::class, 'salvarCadastro'])->name('fa.cadastro');
