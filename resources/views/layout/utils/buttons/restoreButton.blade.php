<button class="btn {{ isset($block) ? 'btn-block' : '' }} btn-sm btn-danger" type="submit" title="Restaurar"
    onclick=" return confirm('Tem certeza que deseja restaurar esse registro?') ? document.getElementById('formRestore{{ $model->id }}').submit() : false">
    {{ $text ?? 'Restaurar' }}
</button>

<form id="formRestore{{ $model->id }}" action="{{ route($route . '.restore', [$route => $model->id]) }}"
    method="POST">
    @csrf
</form>
