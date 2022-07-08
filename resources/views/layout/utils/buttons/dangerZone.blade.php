@canany(['update', 'delete'], $model)
    <div class="card card-collapsed">
        <div class="card-header">
            <h3 class="card-title">
                Zona de Perigo
            </h3>
            <div class="card-options">
                <a href="javascript:void(0)" class="card-options-collapse" data-bs-toggle="card-collapse">
                    <i class="fe fe-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="card-body">
            @can('update', $model)
                <a href="{{ route($route . '.edit', [$route => $model->id]) }}" class="btn btn-block btn-warning fw-bold"
                    title="Editar">
                    <i class="fa fa-pencil"> </i>
                    Editar {{ $text ?? '' }}
                </a>
            @endcan
            @can('delete', $model)
                <button class="btn btn-block btn-danger mt-2 fw-bold" type="submit" title="Excluir"
                    onclick=" return confirm('Tem certeza que deseja deletar esse registro?') ? document.getElementById('formDelete{{ $model->id }}').submit() : false">
                    <i class="fa fa-trash"> </i>
                    Excluir {{ $text ?? '' }}
                </button>
                <form id="formDelete{{ $model->id }}" action="{{ route($route . '.destroy', [$route => $model->id]) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                </form>
            @endcan
        </div>
    </div>
@endcanany
