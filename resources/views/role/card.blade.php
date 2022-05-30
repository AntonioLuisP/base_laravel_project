<div class="card">
    <div class="card-header pb-0 border-bottom-0">
        <h3 class="card-title text-muted">
            Função
        </h3>
        @can('update', $role)
            <div class="card-options btn-group">
                @include('layout.utils.buttons.editButton', [
                    'route' => 'role',
                    'model' => $role,
                ])
                @include('layout.utils.buttons.deleteButton', [
                    'route' => 'role',
                    'model' => $role,
                ])
            </div>
        @endcan
    </div>
    <div class="card-body pt-0">
        <div class="mt-2">
            <h3 class="fw-semibold">
                {{ $role->name }}
            </h3>
        </div>
    </div>
</div>
