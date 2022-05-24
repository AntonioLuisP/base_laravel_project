@extends('layout.app')

@section('content_header')
    @include('layout.utils.contentHeader', [
        'title' => 'Todos os Temas',
        'items' => [
            'Temas de Posts' => null,
        ],
    ])
@stop

@section('conteudo')
    <div class="btn-list mb-1">
        <a class="btn btn-sm btn-primary" href="{{ route('post_theme.create') }}">
            Adicionar
        </a>
        @include('post_theme.search', ['route' => route('post_theme.index')])
    </div>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table border text-nowrap text-md-nowrap table-bordered table-hover mb-0">
                    <thead>
                        <th>Nome:</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($post_themes as $post_theme)
                            <tr>
                                <td>
                                    @include('post_theme.card', $post_theme)
                                </td>
                                <td style="width: 40px">
                                    <div class="btn-group">
                                        <a href="{{ route('post_theme.edit', ['post_theme' => $post_theme->id]) }}" class="btn btn-sm btn-warning">
                                            <i class="fe fe-edit"></i>
                                        </a>
                                        <form action="{{ route('post_theme.destroy', ['post_theme' => $post_theme->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-block btn-danger" type="submit"
                                                onclick="return confirm('Tem certeza que deseja deletar esse registro?'); return false;">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    @include('layout.utils.pagination', ['items' => $post_themes, $links])
@stop
