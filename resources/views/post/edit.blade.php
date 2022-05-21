@extends('layout.app')

@section('content_header')
    @include('utils.layout.contentHeader', [
        'title' => 'Editar Cargo',
        'items' => [
            'Cargo' => route('cargo.show', ['cargo' => $cargo->id]),
            'Editar Cargo' => null,
        ],
    ])
@stop

@section('conteudo')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('cargo.update', ['cargo' => $cargo->id]) }}">
                @csrf
                @method('PUT')
                @include('cargo.form')
            </form>
        </div>
    </div>
@stop
