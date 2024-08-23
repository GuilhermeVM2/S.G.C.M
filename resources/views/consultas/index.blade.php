@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Consultas</h1>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <a class="btn btn-success" href="{{ route('consultas.create') }}">Criar Nova Consulta</a>
        <a class="btn btn-info" href="{{ route('especialidades.create') }}">Cadastrar Especialidade</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Status</th>
                <th>Especialidade</th> <!-- Coluna para exibir a especialidade -->
                <th width="280px">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($consultas as $consulta)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $consulta->data }}</td>
                <td>{{ $consulta->hora }}</td>
                <td>{{ $consulta->status }}</td>
                <td>{{ $consulta->especialidade }}</td> <!-- Exibe a especialidade -->
                <td>
                    <div class="d-flex">
                        <a class="btn btn-info btn-sm me-2" href="{{ route('consultas.show', $consulta->id) }}">Mostrar</a>
                        <a class="btn btn-primary btn-sm me-2" href="{{ route('consultas.edit', $consulta->id) }}">Editar</a>
                        <form action="{{ route('consultas.destroy', $consulta->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
