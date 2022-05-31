<div class="card">
    <div class="card-header pb-0 border-bottom-0">
        <h3 class="card-title text-muted">
            Usuário
        </h3>
        @can('update', $user)
            <div class="card-options">
                @include('layout.utils.buttons.editButton', [
                    'route' => 'user',
                    'model' => $user,
                ])
                @include('layout.utils.buttons.deleteButton', [
                    'route' => 'user',
                    'model' => $user,
                ])
            </div>
        @endcan
    </div>
    <div class="card-body pt-0">
        <div class="mt-2">
            <h3 class="fw-semibold">
                {{ $user->nickname }}
            </h3>
        </div>
        <p><i class="fe fe-user me-2 text-primary"></i>{{ $user->name }}</p>
        <p><i class="fe fe-mail me-2 text-primary"></i>{{ $user->email }}</p>
    </div>
</div>
