@extends('layout.app')

@section('content_header')
    @include('layout.utils.contentHeader', [
        'title' => 'Todos Usuários Apagados',
        'items' => [
            'Temas' => route('user.index'),
        ],
    ])
@stop

@section('conteudo')
    <div class="btn-list mb-1">
        @include('user.search', ['route' => route('user.deleted')])
    </div>

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
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td style="width: 40px">
                                    @include('layout.utils.buttons.restoreButton', [
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

    @include('layout.utils.pagination', ['items' => $users, $links])
@stop
