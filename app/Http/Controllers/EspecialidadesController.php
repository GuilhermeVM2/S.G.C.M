<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidades;
use Illuminate\Support\Facades\Auth;

class EspecialidadesController extends Controller
{
    public function create()
    {
        return view('especialidades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'descricao' => 'required|string',
        ]);

        // Atualizar o campo 'especialidade' do usuário logado
        $user = Auth::user();
        $user->especialidade = $request->input('nome');
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Especialidade cadastrada com sucesso!');
    }
}
