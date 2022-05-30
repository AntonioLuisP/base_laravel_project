@extends('layout.app')

@section('content_header')
    @include('layout.utils.contentHeader', [
        'title' => 'Editar Função',
        'items' => [
            'Funções' => route('role.index'),
            'Editar Função' => null,
        ],
    ])
@stop

@section('conteudo')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('role.update', ['role' => $role->id]) }}">
                @method('PUT')
                @include('role.form')
            </form>
        </div>
    </div>
@stop
