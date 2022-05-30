@extends('layout.app')

@section('content_header')
    @include('layout.utils.contentHeader', [
        'title' => 'Funções',
        'items' => [
            'Funções' => null,
        ],
    ])
@stop

@section('conteudo')
    <div class="btn-list mb-1">
        <a class="btn btn-sm btn-primary" href="{{ route('role.create') }}">
            Adicionar
        </a>
        @include('role.search', ['route' => route('role.index')])
    </div>
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table border text-nowrap text-md-nowrap table-bordered table-hover mb-0">
                    <thead>
                        <th>Nome: </th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->name }} </td>
                                <td style="width: 40px">
                                    <div class="btn-button">
                                        @include('layout.utils.buttons.editButton', [
                                            'route' => 'role',
                                            'model' => $role,
                                        ])
                                        @include('layout.utils.buttons.deleteButton', [
                                            'route' => 'role',
                                            'model' => $role,
                                        ])
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('layout.utils.pagination', ['items' => $roles, $links])
@stop
