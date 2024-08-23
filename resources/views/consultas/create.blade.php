@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Criar Consulta</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Houve alguns problemas com sua entrada.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('consultas.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="data">Data:</label>
            <input type="date" name="data" class="form-control" placeholder="Data da Consulta" required>
        </div>

        <div class="form-group">
            <label for="hora">Hora:</label>
            <input type="time" name="hora" class="form-control" placeholder="Hora da Consulta" step="3600" required>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" class="form-control" required>
                <option value="Disponível">Disponível</option>
                <option value="Não disponível">Não disponível</option>
            </select>
        </div>

        <div class="form-group">
            <label for="especialista">Especialidade do Médico:</label>
            <input type="text" name="especialista" class="form-control" value="{{ Auth::user()->especialidade }}" readonly>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
@endsection
