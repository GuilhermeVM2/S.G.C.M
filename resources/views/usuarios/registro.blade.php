@extends('layouts.app')

@section('content')
    {{-- Formulário de Registro --}}
    <div class="container">
        <h1>Registrar-se</h1>
        <form method="POST" action="{{ route('usuarios.registro') }}">
            @csrf

            <div class="form-group">
                <label for="name" >Nome</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="INSIRA O NOME" value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="INSIRA O EMAIL" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="INSIRA A SENHA" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirme a Senha</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="CONFIRME A SENHA" required>
                @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Registrar-se</button>
        </form>
    </div>
@endsection
