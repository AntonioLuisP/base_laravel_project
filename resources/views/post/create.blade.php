@extends('layout.app')

@section('content_header')
    @include('layout.utils.contentHeader', [
        'title' => 'Criar Post',
        'items' => [
            'Posts' => route('post.index'),
            'Criar Post' => null,
        ],
    ])
@stop

@section('conteudo')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('post.store') }}">
                @include('post.form')
            </form>
        </div>
    </div>
@stop
