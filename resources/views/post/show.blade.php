@extends('layout.app')

@section('content_header')
    @include('layout.utils.contentHeader', [
        'title' => 'Post',
        'items' => [
            'Posts' => route('user.index'),
            'Post' => null,
        ],
    ])
@stop

@section('conteudo')

@include('post.card', $post)

@stop
