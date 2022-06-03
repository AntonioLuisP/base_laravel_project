<a href="{{ route($route . '.show', [$route => $model->id]) }}" class="btn btn-sm btn-secondary">
    <i class="fe fe-search"></i>
    {{ $text ?? '' }}
</a>
