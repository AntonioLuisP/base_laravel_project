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
        </div>
    </div>
@stop
