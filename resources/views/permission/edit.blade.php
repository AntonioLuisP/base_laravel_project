@extends('layout.app')

@section('content_header')
    @include('layout.utils.contentHeader', [
        'title' => 'Editar Permissões do Usuário',
        'items' => [
            'Permissões' => route('permission.index'),
            'Editar Post' => null,
        ],
    ])
@stop

@section('conteudo')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Marque as permissões para este usuário
            </h3>
        </div>
        <div class="card-body row">
            <form action="" method="post">
                @method('PUT')
                @csrf
                <div class="form-group m-0">
                    <div class="form-label">Checkboxes</div>
                    <div class="custom-controls-stacked">
                        @if (count($permissions) > 0)
                            @foreach ($permissions as $permission)
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="example-checkbox1"
                                        value="{{ $permission->id }}"
                                        checked="{{ in_array($permission->name, $userPermissions) }}">
                                    <span class="custom-control-label">{{ $permission->name }}</span>
                                </label>
                                <input type="checkbox" class="form-control" value="{{ $permission->names }}">
                            @endforeach
                        @endif
                    </div>
                </div>
                @include('layout.utils.buttons.buttonSubmit')
            </form>
        </div>
    </div>
@stop
