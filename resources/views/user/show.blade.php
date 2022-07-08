@extends('layout.app')

@section('content_header')
    @include('layout.utils.contentHeader', [
        'title' => 'Usuário',
        'items' => [
            'Usuários' => route('user.index'),
            'Usuário' => null,
        ],
    ])
@stop

@section('conteudo')
    <div class="row">
        <div class="col-md-3">
            @include('user.card', ['user' => $user])
            @include('user.permissions')
            @include('layout.utils.buttons.dangerZone', [
                'route' => 'user',
                'model' => $user,
                'text' => 'usuário',
            ])
        </div>
        <div class="col-md-9">
            @foreach ($posts as $post)
                @include('post.card', ['post' => $post])
            @endforeach
        </div>
    </div>
@stop
