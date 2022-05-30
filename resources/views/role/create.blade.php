@extends('layout.app')

@section('content_header')
    @include('layout.utils.contentHeader', [
        'title' => 'Criar Funções',
        'items' => [
            'Permissões' => route('role.index'),
            'Criar Funções' => null,
        ],
    ])
@stop

@section('conteudo')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('role.store') }}">
                @include('role.form')
            </form>
        </div>
    </div>
@stop
