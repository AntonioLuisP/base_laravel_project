@extends('layout.app')

@section('content_header')
    @include('layout.utils.contentHeader', [
        'title' => 'Editar Permissão',
        'items' => [
            'Permissões' => route('permission.index'),
            'Editar Permissão' => null,
        ],
    ])
@stop

@section('conteudo')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('permission.update', ['permission' => $permission->id]) }}">
                @method('PUT')
                @include('permission.form')
            </form>
        </div>
    </div>
@stop
