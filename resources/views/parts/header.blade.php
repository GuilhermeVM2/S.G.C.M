@if (Auth::check())
    <div>
        <h3>Olá, {{ Auth::user()->name }}</h3>
        <h4>{{ Auth::user()->tipo_usuario }} {{ Auth::user()->especialidade }}</h4>
    </div>
    
    <form action="/logout" method="post">
        @csrf
        <button type="submit" class="btn btn-primary">Logout</button>
    </form>
    <br>

    @if (Auth::user()->isMedico())
        <div class="d-flex">
            <a href="/consultas" class="btn btn-secondary me-2">Dashboard Consultas - Médico</a>
            <a href="/dashboard" class="btn btn-secondary">Página Central</a>
        </div>
        <hr>
    @endif
@else
    <div >
        <h5>CABEÇALHO</h5>
        
        <ul>
            <li><a href="/login" class="btn btn-secondary me-2">Login</a></li>
            <br>
            <li><a href="/registro" class="btn btn-secondary me-2">Registro</a></li>
        </ul>
        <hr>
    </div>
@endif
