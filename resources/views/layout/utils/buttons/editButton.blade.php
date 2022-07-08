<a href="{{ route($route . '.edit', [$route => $model->id]) }}" class="btn btn-sm btn-warning" title="Editar">
    <i class="fe fe-edit-2"> </i>
    {{ $text ?? '' }}
</a>
