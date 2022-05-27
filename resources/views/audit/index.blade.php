@extends('layout.app')

@section('content_header')
    @include('layout.utils.contentHeader', [
        'title' => 'Todas Operações dos Usuários',
        'items' => [
            'Audits' => null,
        ],
    ])
@stop

@section('conteudo')
    <div class="btn-list mb-1">
        @include('audit.search', ['route' => route('audit.index')])
    </div>
    @foreach ($audits as $audit)
        @include('audit.card', $audit)
    @endforeach
    @include('layout.utils.pagination', ['items' => $audits, $links])
@stop
