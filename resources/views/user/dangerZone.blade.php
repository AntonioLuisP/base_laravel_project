@canany(['update', 'delete'], $user)
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Zona de Perigo
            </h3>
        </div>
        <div class="card-body">
            @can('update', $user)
                <a href="{{ route('user.edit', ['user' => $user->id]) }}" class="btn btn-block btn-warning fw-bold">
                    <i class="fa fa-pencil"> </i>
                    EDITAR
                </a>
            @endcan
            @can('delete', $user)
                <button class="btn btn-block btn-danger mt-2 fw-bold" type="submit"
                    onclick=" return confirm('Tem certeza que deseja deletar esse registro?') ? document.getElementById('formDelete{{ $user->id }}').submit() : false">
                    <i class="fa fa-trash"> </i>
                    EXCLUIR ESTE USUÁRIO
                </button>
                <form id="formDelete{{ $user->id }}" action="{{ route('user.destroy', ['user' => $user->id]) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')
                </form>
            @endcan
        </div>
    </div>
@endcanany
