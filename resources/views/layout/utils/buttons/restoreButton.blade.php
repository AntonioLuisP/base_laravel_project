<form action="{{ route($route . '.destroy', [$route => $model->id]) }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-sm btn-block btn-danger"
        onclick="return confirm('Tem certeza que deseja restaurar esse registro?'); return false;">
        Restaurar
    </button>
</form>
