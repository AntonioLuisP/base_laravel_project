<form action="{{ route($route . '.destroy', [$route => $model->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="btn btn-sm btn-block btn-danger" type="submit"
        onclick="return confirm('Tem certeza que deseja deletar esse registro?'); return false;">
        <i class="fa fa-trash"> </i> Apagar
    </button>
</form>
