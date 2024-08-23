@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Editar Consulta</h1>

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

        <form action="{{ route('consultas.update', $consulta->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="data">Data:</label>
                <input type="date" name="data" class="form-control" value="{{ $consulta->data }}">
            </div>

            <div class="form-group">
                <label for="hora">Hora:</label>
                <input type="time" name="hora" class="form-control" value="{{ $consulta->hora }}">
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" name="status" class="form-control" value="{{ $consulta->status }}">
            </div>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
@endsection
