@extends('layout.app')

@section('content_header')
    @include('utils.layout.contentHeader', [
        'title' => 'Cargos',
        'items' => [
            'Cargos' => null,
        ],
    ])
@stop

@section('conteudo')
    <div class="btn-list mb-1">
        <a class="btn btn-sm btn-primary" href="{{ route('cargo.create') }}">
            Adicionar
        </a>
        @include('cargo.search', ['route' => route('cargo.index')])
    </div>
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table border text-nowrap text-md-nowrap table-bordered table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Nível</th>
                            <th>Categoria</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!is_null($cargos))
                            @foreach ($cargos as $cargo)
                                <tr>
                                    <td>{{ $cargo->nomenclatura }}</td>
                                    <td>{{ $cargo->nivel }}</td>
                                    <td>{{ $cargo->categoria }}</td>
                                    <td style="width: 4px">
                                        @include('utils.table.buttonsIndex', [
                                            'route' => 'cargo',
                                            'model' => $cargo,
                                        ])
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('utils.layout.pagination', ['items' => $cargos, $links])
@stop
