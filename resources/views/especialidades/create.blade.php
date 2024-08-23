@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Cadastrar Especialidade</h1>

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

    <form action="{{ route('especialidades.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="especialidade">Especialidade:</label>
            <select id="especialidade" name="nome" class="form-control" onchange="atualizarDescricao()">
                <option value="">Selecione uma Especialidade</option>
                <option value="Cardiologia">Cardiologia</option>
                <option value="Dermatologia">Dermatologia</option>
                <option value="Endocrinologia">Endocrinologia</option>
                <option value="Gastroenterologia">Gastroenterologia</option>
                <option value="Geriatria">Geriatria</option>
                <option value="Ginecologia">Ginecologia</option>
                <option value="Hematologia">Hematologia</option>
                <option value="Infectologia">Infectologia</option>
                <option value="Nefrologia">Nefrologia</option>
                <option value="Neurologia">Neurologia</option>
                <option value="Obstetrícia">Obstetrícia</option>
                <option value="Oftalmologia">Oftalmologia</option>
                <option value="Ortopedia">Ortopedia</option>
                <option value="Otorrinolaringologia">Otorrinolaringologia</option>
                <option value="Pediatria">Pediatria</option>
                <option value="Psiquiatria">Psiquiatria</option>
                <option value="Pneumologia">Pneumologia</option>
                <option value="Radiologia">Radiologia</option>
                <option value="Reumatologia">Reumatologia</option>
                <option value="Urologia">Urologia</option>
            </select>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input type="text" id="descricao" name="descricao" class="form-control" placeholder="Descrição da Especialidade" readonly>
        </div>

        <div class="form-group">
            <label for="crm">CRM:</label>
            <input type="text" name="crm" class="form-control" placeholder="Informe seu CRM">
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>

<script>
    function atualizarDescricao() {
        const especialidades = {
            'Cardiologia': 'Estudo e tratamento das doenças do coração e do sistema circulatório.',
            'Dermatologia': 'Diagnóstico e tratamento de doenças da pele, cabelo e unhas.',
            'Endocrinologia': 'Tratamento de distúrbios hormonais e doenças das glândulas endócrinas.',
            'Gastroenterologia': 'Tratamento de doenças do sistema digestivo.',
            'Geriatria': 'Tratamento e cuidados de saúde para idosos.',
            'Ginecologia': 'Saúde do sistema reprodutor feminino.',
            'Hematologia': 'Diagnóstico e tratamento de doenças do sangue e dos órgãos hematopoiéticos.',
            'Infectologia': 'Estudo e tratamento de doenças infecciosas.',
            'Nefrologia': 'Tratamento de doenças dos rins.',
            'Neurologia': 'Tratamento de distúrbios do sistema nervoso.',
            'Obstetrícia': 'Cuidado pré-natal, parto e pós-parto.',
            'Oftalmologia': 'Diagnóstico e tratamento de doenças dos olhos.',
            'Ortopedia': 'Tratamento de lesões e doenças do sistema músculo-esquelético.',
            'Otorrinolaringologia': 'Tratamento de doenças do ouvido, nariz e garganta.',
            'Pediatria': 'Cuidados de saúde para crianças e adolescentes.',
            'Psiquiatria': 'Diagnóstico e tratamento de doenças mentais e emocionais.',
            'Pneumologia': 'Tratamento de doenças do sistema respiratório.',
            'Radiologia': 'Diagnóstico e tratamento de doenças usando técnicas de imagem, como raios-X e ressonância magnética.',
            'Reumatologia': 'Tratamento de doenças das articulações e tecidos conectivos.',
            'Urologia': 'Tratamento de doenças do trato urinário e do sistema reprodutor masculino.'
        };

        const especialidadeSelecionada = document.getElementById('especialidade').value;
        const descricao = especialidades[especialidadeSelecionada] || '';
        document.getElementById('descricao').value = descricao;
    }
</script>
@endsection
