@extends('layout.app')

@section('content_header')
    @include('layout.utils.contentHeader', [
        'title' => 'RH UEMA',
        'items' => [
            'Dashboard' => null,
        ],
    ])
@stop

@section('conteudo')
@auth
Bem vindo {{ auth::user()->nickname }}!

@else
Faça login para postar uma noticia
@endauth

@stop
