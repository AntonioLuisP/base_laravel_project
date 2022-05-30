@extends('layout.app')

@section('content_header')
    @include('layout.utils.contentHeader', [
        'title' => 'Editar Post',
        'items' => [
            'Post' => route('post.show', ['post' => $post->id]),
            'Editar Post' => null,
        ],
    ])
@stop

@section('conteudo')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('post.update', ['post' => $post->id]) }}">
                @method('PUT')
                @include('post.form')
            </form>
        </div>
    </div>
@stop
