@extends('layout.app')

@section('content_header')
    @include('layout.utils.contentHeader', [
        'title' => 'Editar Usuário',
        'items' => [
            'Usuário' => route('user.show', ['user' => $user->id]),
            'Editar Usuário' => null,
        ],
    ])
@stop

@section('conteudo')

    @include('layout.utils.alerts')

    <div class="row">
        <div class="col-sm-8">
            @include('user.userEdit')
        </div>
        <div class="col-sm-4">
            @include('user.passwordEdit')
        </div>
    </div>
@stop
