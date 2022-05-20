@extends('layout.app')

@section('content_header')
    @include('utils.layout.contentHeader', [
        'title' => 'RH UEMA',
        'items' => [
            'Dashboard' => null,
        ],
    ])
@stop

@section('conteudo')
    <div class="row">
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
            <div class="card bg-indigo img-card box-indigo-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">{{ $users }}</h2>
                            <p class="text-white mb-0">Total de Usuários </p>
                        </div>
                        <div class="ms-auto"> <i class="fe fe-layers text-white fs-30 me-2 mt-2"></i> </div>
                    </div>
                    <div class="mt-3">
                        <a class="btn btn-sm btn-default" href="{{ route('setor.index') }}">
                            Ver Lista
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
            <div class="card bg-teal img-card box-teal-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">{{ $posts }}</h2>
                            <p class="text-white mb-0">Total de Posts </p>
                        </div>
                        <div class="ms-auto"> <i class="fe fe-briefcase text-white fs-30 me-2 mt-2"></i> </div>
                    </div>
                    <div class="mt-3">
                        <a class="btn btn-sm btn-default" href="{{ route('colaborador.index') }}">
                            Ver Lista
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-4">
            <div class="card bg-azure img-card box-azure-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">{{ $colaboradores }}</h2>
                            <p class="text-white mb-0">Total de Colaboradores </p>
                        </div>
                        <div class="ms-auto"> <i class="fe fe-users text-white fs-30 me-2 mt-2"></i> </div>
                    </div>
                    <div class="mt-3">
                        <a class="btn btn-sm btn-default" href="{{ route('colaborador.index') }}">
                            Ver Lista
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
