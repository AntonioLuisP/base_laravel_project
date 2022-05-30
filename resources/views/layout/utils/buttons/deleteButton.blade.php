<button class="btn {{ isset($block) ? 'btn-block' : '' }} btn-sm btn-danger" type="submit"
    onclick=" return confirm('Tem certeza que deseja deletar esse registro?') ? document.getElementById('formDelete{{ $model->id }}').submit() : false">
    <i class="fa fa-trash"> </i>
    {{ $text ?? '' }}
</button>

<form id="formDelete{{ $model->id }}" action="{{ route($route . '.destroy', [$route => $model->id]) }}"
    method="POST">
    @csrf
    @method('DELETE')
</form>
