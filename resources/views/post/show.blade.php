@extends('layout.app')

@section('content_header')
    @include('utils.layout.contentHeader', [
        'title' => 'Cargo',
        'items' => [
            'Cargos' => route('cargo.index'),
            'Cargo' => null,
        ],
    ])
@stop

@section('conteudo')
    <div class="row">
        <div class="col-sm-4">
            @include('cargo.card', ['cargo' => $cargo])
        </div>
        <div class="col-sm-8">
            @foreach ($cargo->colaboradores as $colaborador)
                @include('colaborador.card', ['colaborador' => $colaborador])
            @endforeach
        </div>
    </div>

@stop
