@extends('layout.app')

@section('content_header')
    @include('layout.utils.contentHeader', [
        'title' => 'Criar Permissão',
        'items' => [
            'Permissões' => route('permission.index'),
            'Criar Permissão' => null,
        ],
    ])
@stop

@section('conteudo')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('permission.store') }}">
                @include('permission.form')
            </form>
        </div>
    </div>
@stop
