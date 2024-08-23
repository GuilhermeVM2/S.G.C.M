<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidades;
use App\Models\User;

class MedicoController extends Controller
{
    // Método para cadastrar a especialidade do médico
    public function cadastrarEspecialidade(Request $request)
    {
        $user = auth()->user();

        if ($user->is_medico) {
            $request->validate([
                'especialidade' => 'required|string|max:255',
            ]);

            Especialidades::create([
                'nome' => $request->input('especialidade'),
                'user_id' => $user->id,
            ]);

            return redirect()->back()->with('success', 'Especialidade cadastrada com sucesso.');
        }

        return redirect()->back()->with('error', 'Acesso negado. Apenas médicos podem cadastrar especialidades.');
    }

    public function gerenciarHoras()
    {
        // Lógica para o médico gerenciar suas horas
    }

    public function gerenciarConsultas()
    {
        // Lógica para o médico gerenciar suas consultas
    }
}
