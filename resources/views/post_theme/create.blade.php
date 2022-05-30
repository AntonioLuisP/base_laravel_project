@extends('layout.app')

@section('content_header')
    @include('layout.utils.contentHeader', [
        'title' => 'Criar Tema',
        'items' => [
            'Temas de Posts' => route('post_theme.index'),
            'Criar Tema' => null,
        ],
    ])
@stop

@section('conteudo')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('post_theme.store') }}">
                @include('post_theme.form')
            </form>
        </div>
    </div>
@stop
