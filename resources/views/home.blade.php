@extends('layout.app')

@section('content_header')
    @include('layout.utils.contentHeader', [
        'no_content' => true
    ])
@stop

@section('conteudo')
    @auth
        <strong>
            Bem vindo {{ auth::user()->nickname }}!
        </strong>
    @else
        <strong>
            Faça login para postar uma noticia
        </strong>
    @endauth

    @foreach ($posts as $post)
        @include('post.card', $post)
    @endforeach

@stop
