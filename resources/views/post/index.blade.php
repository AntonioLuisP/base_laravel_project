@extends('layout.app')

@section('content_header')
    @include('layout.utils.contentHeader', [
        'title' => 'Todos os Posts',
        'items' => [
            'Posts' => null,
        ],
    ])
@stop

@section('conteudo')
    <div class="btn-list mb-1">
        @include('post.search', ['route' => route('post.index')])
    </div>

    @foreach ($posts as $post)
        @include('post.card', $post)
    @endforeach

    @include('layout.utils.pagination', ['items' => $posts, $links])
@stop
