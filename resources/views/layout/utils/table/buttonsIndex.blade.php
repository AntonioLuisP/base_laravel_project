<div class="btn-group">
    {{-- @if (!$model->trashed()) --}}
    <a href="{{ route($route . '.show', [$route => $model->id]) }}" class="btn btn-sm btn-primary-light">
        <i class="fe fe-search"></i>
    </a>
    {{-- <a href="{{ route($route . '.edit', [$route => $model->id]) }}" class="btn btn-sm btn-warning">
            Editar
        </a>
        <form action="{{ route($route . '.destroy', [$route => $model->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-sm btn-danger" value="Apagar"
                onclick="return confirm('Tem certeza que deseja deletar esse registro?'); return false;">
        </form> --}}
    {{-- @else
        <form action="{{ route($route . '.restore', [$route => $model->id]) }}" method="POST">
            @csrf
            <input type="submit" class="btn btn-sm btn-danger"
                onclick="return confirm('Tem certeza que deseja restaurar esse registro?'); return false;"
                value="Restaurar">
        </form>
    @endif --}}
</div>
