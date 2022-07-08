@if ($errors->any())
    <div class="alert alert-warning" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">
            ×
        </button>
        <strong class="fw-bold">Erro ao salvar as Permissões</strong>
    </div>
@endif

<div class="card card-collapsed">
    <div class="card-header">
        <h3 class="card-title">
            Editar Permissões
        </h3>
        <div class="card-options">
            <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse">
                <i class="fe fe-chevron-up"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('user.permission.update', ['user' => $user->id]) }}" method="post">
            @method('PUT')
            @csrf
            <div class="form-group">
                <div class="custom-controls-stacked">
                    @foreach ($permissions as $permission)
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="permissions[]"
                                value="{{ $permission->id }}"
                                {{ $user->permissions->contains($permission) ? 'checked' : '' }}>
                            <span class="custom-control-label">{{ $permission->name }}</span>
                        </label>
                    @endforeach
                </div>
                {!! $errors->first('permissions', '<span style="color:red" class="help-block">:message</span>') !!}
            </div>
            <button class="btn btn-sm btn-primary" type="submit" title="Salvar">
                {{ $text ?? 'Salvar' }}
            </button>
        </form>
    </div>
</div>
