@extends('layouts.app')

@section('content')
    <h1>Dashboard de Consultas</h1>

    <form method="GET" action="{{ route('dashboard') }}">
        <input type="text" name="search" placeholder="Pesquisar consultas..." value="{{ request('search') }}">
        <button type="submit">Pesquisar</button>
    </form>

    <div class="row">
        @foreach ($consultas as $consulta)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Consulta: {{ $consulta->data }} às {{ $consulta->hora }}</h5>
                        <p class="card-text">Status: {{ $consulta->status }}</p>
                        <p class="card-text">Especialidade: {{ $consulta->especialidade }}</p> <!-- Adicionado -->
                        <a href="{{ route('consultas.show', $consulta->id) }}" class="btn btn-primary">Ver Detalhes</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
