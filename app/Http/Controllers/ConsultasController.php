<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;
use Illuminate\Support\Facades\Auth;

class ConsultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultas = Consulta::all();
        return view('consultas.index', compact('consultas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('consultas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'data' => 'required|date',
            'hora' => ['required', 'regex:/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/'], // Validação de hora no formato HH:MM
            'status' => 'required|string',
        ]);

        // Obter a especialidade do médico logado
        $especialidade = Auth::user()->especialidade;

        // Verificar se a especialidade está definida
        if (!$especialidade) {
            return redirect()->back()->withErrors(['especialidade' => 'A especialidade do médico não está registrada.']);
        }

        // Criar a consulta com a especialidade do médico logado
        Consulta::create([
            'data' => $request->input('data'),
            'hora' => $request->input('hora'),
            'status' => $request->input('status'),
            'especialidade' => $especialidade, // Preenche o campo 'especialidade'
        ]);

        return redirect()->route('consultas.index')
            ->with('success', 'Consulta criada com sucesso');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consulta $consulta)
    {
        return view('consultas.edit', compact('consulta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Consulta $consulta)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        // Atualiza o status da consulta e registra o nome do usuário logado
        $consulta->status = $request->input('status');
        if ($consulta->status === 'Agendado') {
            $consulta->especialista = Auth::user()->name; // Assume que o nome do usuário está no campo 'name'
        }
        $consulta->save();

        return redirect()->route('consultas.index')
            ->with('success', 'Consulta atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consulta $consulta)
    {
        $consulta->delete();

        return redirect()->route('consultas.index')
            ->with('success', 'Consulta deletada com sucesso');
    }

    /**
     * Show the specified resource.
     */
    public function show(Consulta $consulta)
    {
        return view('consultas.show', compact('consulta'));
    }

    /**
     * Reschedule a consulta.
     */
    public function reschedule(Request $request, Consulta $consulta)
    {
        $request->validate([
            'data' => 'required|date',
            'hora' => ['required', 'regex:/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/'], // Validação de hora no formato HH:MM
        ]);

        $consulta->data = $request->input('data');
        $consulta->hora = $request->input('hora');
        $consulta->save();

        return redirect()->route('consultas.show', $consulta->id)
            ->with('success', 'Consulta reagendada com sucesso');
    }

    public function agendar(Request $request, Consulta $consulta)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        if ($request->input('status') === 'Agendado') {
            // Atualiza o status da consulta com o nome do usuário logado
            $consulta->status = 'Agendado com ' . Auth::user()->name;
            $consulta->save();
        }

        return redirect()->route('consultas.index')
            ->with('success', 'Consulta agendada com sucesso');
    }

}
