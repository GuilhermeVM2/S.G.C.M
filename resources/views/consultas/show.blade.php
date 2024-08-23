@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes da Consulta</h1>

    <table class="table">
        <tr>
            <th>Data:</th>
            <td>{{ $consulta->data }}</td>
        </tr>
        <tr>
            <th>Hora:</th>
            <td>{{ $consulta->hora }}</td>
        </tr>
        <tr>
            <th>Status:</th>
            <td>{{ $consulta->status }}</td>
        </tr>
        <tr>
            <th>Especialidade:</th>
            <td>{{ $consulta->especialidade }}</td>
        </tr>
    </table>

    @if($consulta->status !== 'Agendado')
        <form action="{{ route('consultas.agendar', $consulta->id) }}" method="POST">
            @csrf
            <input type="hidden" name="status" value="Agendado">
            <button type="submit" class="btn btn-primary">Agendar</button>
        </form>
    @endif

    <a href="{{ route('usuarios.dashboard') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
