@extends('layout.app')

@section('content_header')
    @include('layout.utils.contentHeader', [
        'title' => 'Permissão e seus Usuários',
        'items' => [
            'Sistema' => route('sistema.index'),
            'Permissões' => route('sistema.permission.index'),
            'Permissão' => null,
        ],
    ])
@stop

@section('conteudo')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header pb-0 border-bottom-0">
                    <h3 class="card-title text-muted">
                        Permissão
                    </h3>
                </div>
                <div class="card-body pt-0">
                    <div class="mt-2">
                        <h3 class="fw-bold">
                            {{ $permission->name }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table border text-nowrap text-md-nowrap table-bordered table-hover mb-0">
                            <thead>
                                <th>Nome:</th>
                                <th>Email:</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }} </td>
                                        <td>{{ $user->email }} </td>
                                        <td style="width: 40px">
                                            @include('layout.utils.buttons.showButton', [
                                                'route' => 'user',
                                                'model' => $user,
                                            ])
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
