@extends('layout.app')

@section('content_header')
    @include('layout.utils.contentHeader', [
        'title' => 'Erro',
        'items' => [
            'Erro' => null,
        ],
    ])
@stop

@section('conteudo')
    <div class="container text-center">
        <h1 class="display-1 mb-2">
            Erro @yield('code')
        </h1>
        <h3 class="error-details">
            @yield('message')
        </h3>
        <div class="text-center">
            <a class="btn btn-primary mt-5 mb-5" href="{{ route('home') }}">
                <i class="fa fa-long-arrow-left me-2"></i>Voltar ao Início
            </a>
        </div>
    </div>
@stop
