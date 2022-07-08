@extends('layout.app')

@section('content_header')
    @include('layout.utils.contentHeader', [
        'title' => 'Todas Operações dos Usuários',
        'items' => [
            'Sistema' => route('sistema.index'),
            'Audits' => null,
        ],
    ])
@stop

@section('conteudo')
    <div class="btn-list mb-1">
        @include('sistema.audit.search', ['route' => route('sistema.audit.index')])
    </div>
    @foreach ($audits as $audit)
        <div class="card">
            <div class="card-header pb-0 border-bottom-0">
                <h5 class="card-title text-muted">
                    Operação:
                </h5>
                <div class="card-options">
                    <strong class="text-black">
                        Audit ID: {{ $audit->id }}
                    </strong>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="row mt-2">
                    <div class="col-sm-4">
                        <h4 class="fw-bold">
                            {{ mb_strtoupper($audit->event) }}
                        </h4>
                        <p>
                            <span class="me-2 text-primary">Model:</span>
                            <strong>
                                {{ substr($audit->auditable_type, 11) }}
                            </strong>
                        </p>
                        <p>
                            <i class="fe fe-user me-2 text-primary"></i>
                            @if ($audit->user_id)
                                <a href="{{ route('user.show', ['user' => $audit->user_id]) }}">
                                    {{ $audit->username }}
                                </a>
                            @else
                                <span>
                                    Não foi realizado por um usuário
                                </span>
                            @endif
                        </p>
                        <p>
                            <i class="fe fe-monitor me-2 text-primary"></i>
                            {{ $audit->user_agent }}
                        </p>
                        <p>
                            <i class="fe fe-wifi me-2 text-primary"></i>
                            {{ $audit->ip_address }}
                        </p>
                        <p>
                            <i class="fe fe-calendar me-2 text-primary"></i>
                            {{ $audit->created_at }}
                        </p>
                    </div>
                    <div class="col-sm-8">
                        <h4 class="mb-4 fw-semibold">
                            Valores Antes da Operação
                        </h4>
                        @if (count($audit->old_values) > 0)
                            <div class="row">
                                @foreach ($audit->old_values as $key => $value)
                                    <div class="col-sm-3">
                                        <strong class="text-primary">{{ $key }}:</strong>
                                        {{ $value }}
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p>Esta model não possuia valores anteriores</p>
                        @endif
                        <h4 class="mb-4 mt-2 fw-semibold">
                            Valores Após a Operação
                        </h4>
                        @if (count($audit->new_values) > 0)
                            <div class="row">
                                @foreach ($audit->new_values as $key => $value)
                                    <div class="col-sm-3">
                                        <strong class="text-primary">{{ $key }}:</strong>
                                        {{ $value }}
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p>Esta model não possuia valores anteriores</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @include('layout.utils.pagination', ['items' => $audits, $links])
@stop
