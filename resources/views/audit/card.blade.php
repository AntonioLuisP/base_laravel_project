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
            <div class="col-sm-7">
                <div class="">
                    <h4 class="fw-bold">
                        {{ mb_strtoupper($audit->event) }}
                    </h4>
                </div>
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
            <div class="col-sm-5">
                <h4 class="mb-4 fw-semibold">
                    Valores Antes da Operação
                </h4>
                <div class="row mt-2">
                    @if (count($audit->old_values) > 0)
                        @foreach ($audit->old_values as $key => $value)
                            <p>
                                <strong class="me-2 text-primary">{{ $key }}:</strong>
                                {{ $value }}
                            </p>
                        @endforeach
                    @else
                        <p>Esta model não possuia valores anteriores</p>
                    @endif
                </div>
                <h4 class="mb-4 fw-semibold">
                    Valores Após a Operação
                </h4>
                @if (count($audit->new_values) > 0)
                    @foreach ($audit->new_values as $key => $value)
                        <p>
                            <strong class="me-2 text-primary">{{ $key }}:</strong>
                            {{ $value }}
                        </p>
                    @endforeach
                @else
                    <p>Esta model não possuia valores anteriores</p>
                @endif
            </div>
        </div>
    </div>
</div>
{{--  --}}
