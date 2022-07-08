@extends('layout.app')

@section('content_header')
    @include('layout.utils.contentHeader', [
        'title' => 'Informações do Sistema',
        'items' => [
            'Sistema' => null,
        ],
    ])
@stop

@section('conteudo')
    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
            <a href="{{ route('user.index') }}">
                <div class="card bg-azure img-card box-azure-shadow">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white">
                                <h2 class="mb-0 number-font">Usuários</h2>
                            </div>
                            <div class="ms-auto"> <i class="fe fe-users text-white fs-30 me-2 mt-2"></i> </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
            <a href="{{ route('sistema.permission.index') }}">
                <div class="card bg-orange img-card box-orange-shadow">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white">
                                <h2 class="mb-0 number-font">Permissões</h2>
                            </div>
                            <div class="ms-auto"> <i class="fe fe-lock text-white fs-30 me-2 mt-2"></i> </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
            <a href="{{ route('sistema.audit.index') }}">
                <div class="card bg-cyan img-card box-cyan-shadow">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white">
                                <h2 class="mb-0 number-font">Auditoria</h2>
                            </div>
                            <div class="ms-auto"> <i class="fe fe-activity text-white fs-30 me-2 mt-2"></i> </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <h4 class="fw-bold">
        Administradores do sistema
    </h4>
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
@stop
