<button class="btn {{ isset($block) ? 'btn-block' : '' }} btn-sm btn-danger" type="submit"
    onclick=" return confirm('Tem certeza que deseja restaurar esse registro?') ? document.getElementById('formRestore{{ $model->id }}').submit() : false">
    {{ $text ?? '' }}
</button>

<form id="formRestore{{ $model->id }}" action="{{ route($route . '.destroy', [$route => $model->id]) }}"
    method="POST">
    @csrf
    @method('DELETE')
</form>
