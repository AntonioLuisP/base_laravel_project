@extends('layout.app')

@section('content_header')
    @include('layout.utils.contentHeader', [
        'title' => 'Editar Tema',
        'items' => [
            'Temas de Posts' => route('post_theme.index'),
            'Editar Tema' => null,
        ],
    ])
@stop

@section('conteudo')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('post_theme.update', ['post_theme' => $post_theme->id]) }}">
                @method('PUT')
                @include('post_theme.form')
            </form>
        </div>
    </div>
@stop
