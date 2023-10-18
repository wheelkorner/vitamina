@extends('adminlte::page')

@section('title', 'Cadastramento de Lojas')

@section('js')
    <script type="text/javascript" src="{{asset('js/utils.js')}}"></script>
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
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ Session::get('msgError') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Lojas</li>
            </ol>
        </div>
    </div>

@stop

@section('content')
    @include('lojas.partials.lista_lojas')
@stop