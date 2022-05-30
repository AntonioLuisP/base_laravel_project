@extends('layout.app')

@section('content_header')
    @include('layout.utils.contentHeader', [
        'title' => 'Permissões',
        'items' => [
            'Permissões' => null,
        ],
    ])
@stop

@section('conteudo')
    <div class="btn-list mb-1">
        <a class="btn btn-sm btn-primary" href="{{ route('permission.create') }}">
            Adicionar
        </a>
        @include('permission.search', ['route' => route('permission.index')])
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
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->name }} </td>
                                <td style="width: 40px">
                                    <div class="btn-button">
                                        @include('layout.utils.buttons.editButton', [
                                            'route' => 'permission',
                                            'model' => $permission,
                                        ])
                                        @include('layout.utils.buttons.deleteButton', [
                                            'route' => 'permission',
                                            'model' => $permission,
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
    @include('layout.utils.pagination', ['items' => $permissions, $links])
@stop
