@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Especialidades</h1>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <a class="btn btn-success" href="{{ route('especialidades.create') }}">Cadastrar Nova Especialidade</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th width="280px">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($especialidades as $especialidade)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $especialidade->nome }}</td>
                <td>{{ $especialidade->descricao }}</td>
                <td>
                    <div class="d-flex">
                        <a class="btn btn-info btn-sm me-2" href="{{ route('especialidades.show', $especialidade->id) }}">Mostrar</a>
                        <a class="btn btn-primary btn-sm me-2" href="{{ route('especialidades.edit', $especialidade->id) }}">Editar</a>
                        <form action="{{ route('especialidades.destroy', $especialidade->id) }}" method="POST">
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
