@extends('layout.app')

@section('content_header')
    @include('utils.layout.contentHeader', [
        'title' => 'Criar Cargo',
        'items' => [
            'Cargos' => route('cargo.index'),
            'Criar Cargo' => null,
        ],
    ])
@stop

@section('conteudo')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('cargo.store') }}">
                @csrf
                @include('cargo.form')
            </form>
        </div>
    </div>
@stop
