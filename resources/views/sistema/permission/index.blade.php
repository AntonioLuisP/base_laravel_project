@extends('layout.app')

@section('content_header')
    @include('layout.utils.contentHeader', [
        'title' => 'Permissões',
        'items' => [
            'Sistema' => route('sistema.index'),
            'Permissões' => null,
        ],
    ])
@stop

@section('conteudo')
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
                                        <a href="{{ route('sistema.permission.show', ['permission' => $permission->id]) }}"
                                            class="btn btn-sm btn-secondary" title="Ver">
                                            <i class="fe fe-search"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
