<a href="{{ route($route . '.show', [$route => $model->id]) }}" class="btn btn-sm btn-secondary" title="Ver">
    <i class="fe fe-search"></i>
    {{ $text ?? '' }}
</a>
