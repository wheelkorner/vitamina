@extends('adminlte::page')

@section('title', 'Cadastro de Loja')

@section('js')
<script type="text/javascript" src="{{asset('js/utils.js')}}"></script>

<script>

document.addEventListener('DOMContentLoaded', function () {
    const tipoSelect = document.getElementById('tipo');
    const parceiroNomeInput = document.getElementById('parceiro_nome_input');
    const parceiroSelect = document.getElementById('parceiro_input');

    tipoSelect.addEventListener('change', function () {
        if (tipoSelect.value === 'matriz') {
            parceiroNomeInput.style.display = 'block';
            parceiroSelect.style.display = 'none';
        } else {
            parceiroNomeInput.style.display = 'none';
            parceiroSelect.style.display = 'block';
        }
    });
});


</script>
@stop

@section('content_header')

    @if(Session::has('msgSuccess'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ Session::get('msgSuccess') }}
        </div>
    @elseif(Session::has('msgError'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ Session::get('msgError') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Cadastro de Lojas</li>
            </ol>
        </div>
    </div>


@stop

@section('content')

<div class="row">
    <div class="col-12 col-sm-6">
        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-body">
                <form role="form" action="{{ route('lojas.store') }}" method="post">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="tipo">Tipo:</label>
                            <select class="form-control" name="tipo" id="tipo">
                                <option value="filial">Filial</option>
                                <option value="matriz">Matriz</option>
                            </select>
                        </div>


                        <!-- Campo de entrada para o nome do Parceiro (Matriz) -->
                        <div class="form-group" id="parceiro_nome_input" style="display: none;">
                            <label for="parceiro_nome">Nome do Parceiro (Matriz)</label>
                            <input type="text" class="form-control" name="parceiro_nome" placeholder="Nome do Parceiro">
                        </div>

                        <div class="form-group" id="parceiro_input">
                            <label for="parceiro_id">Parceiro</label>
                            <select class="form-control select select2" name="parceiro_id">
                                @foreach($parceiros as $parceiro)
                                    <option value="{{ $parceiro->id }}">{{ $parceiro->nome .' - '. $parceiro->cd_parceiro }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="cnpj">CNPJ</label>
                            <input type="text" class="form-control" name="cnpj" placeholder="CNPJ">
                        </div>

                        <div class="form-group">
                            <label for="razao_social">Razão Social</label>
                            <input type="text" class="form-control" name="razao_social" placeholder="Razão Social">
                        </div>

                        <div class="form-group">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control" name="cidade" placeholder="Cidade">
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-outline-secondary btn-flat">Cadastrar Loja</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@stop
