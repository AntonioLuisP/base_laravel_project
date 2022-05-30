@extends('layout.app')

@section('content_header')
    @include('layout.utils.contentHeader', [
        'title' => 'Função',
        'items' => [
            'Funções' => route('role.index'),
            'Função' => null,
        ],
    ])
@stop

@section('conteudo')
    <div class="row">
        <div class="col-md-3">
            @include('role.card', ['role' => $role])
        </div>
        <div class="col-md-9">
            Permissões aqui
        </div>
    </div>
@stop
