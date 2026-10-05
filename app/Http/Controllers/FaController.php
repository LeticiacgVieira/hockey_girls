<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaController extends Controller
{
   public function index()
   {
       return view('fa');
   }

   public function salvarCadastro(Request $request) {
    Fa::create([
        'nome' => $request->nome,
        'email' => $request->email,
    ]);

    return back()->with('sucesso', 'Cadastro realizado com sucesso!');
}
}
