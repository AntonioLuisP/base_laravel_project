@extends('layout.app')

@section('content_header')
    @include('layout.utils.contentHeader', [
        'title' => 'Permissão',
        'items' => [
            'Permissões' => route('permission.index'),
            'Permissão' => null,
        ],
    ])
@stop

@section('conteudo')
    <div class="row">
        <div class="col-md-3">
            @include('permission.card', ['permission' => $permission])
        </div>
        <div class="col-md-9">
            <h4 class="fw-bold">
                Usuários com esta permissão
            </h4>
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table border text-nowrap text-md-nowrap table-bordered table-hover mb-0">
                            <thead>
                                <th>Nome:</th>
                                <th>Email:</th>
                                <th style="width: 40px">Super Administrador</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }} </td>
                                        <td>{{ $user->email }} </td>
                                        <td style="width: 40px">{{ $user->isSuperAdmin() }} </td>
                                        <td style="width: 40px">
                                            @hasrole('Super Admin')
                                                <a href="{{ route('permission.user.edit', ['user' => $user->id]) }}"
                                                    class="btn btn-sm btn-warning">
                                                    <i class="fe fe-edit-2"> </i>
                                                </a>
                                            @endhasrole
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
