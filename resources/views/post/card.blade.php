<div class="card">
    <div class="card-header pb-0 border-bottom-0">
        <h3 class="card-title text-muted">
            Cargo
        </h3>
        <div class="card-options">
            <span class="tag tag-outline-info tag-rounded">
                {{ $cargo->categoria }}
            </span>
        </div>
    </div>
    <div class="card-body pt-0">
        <div class="mt-2">
            <h3 class="fw-semibold">
                {{ $cargo->nomenclatura }}
            </h3>
        </div>
        <p><i class="mdi mdi-arrow-top-right me-2 text-primary"></i>{{ $cargo->nivel }}</p>
        <div class="mt-3">
            @include('utils.buttons.editButton', ['route' => 'cargo', 'model' => $cargo])
        </div>
    </div>
</div>
