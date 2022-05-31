@extends('layout.app')

@section('content_header')
    @include('layout.utils.contentHeader', [
        'title' => 'Todos os Temas Apagados',
        'items' => [
            'Temas' => route('post_theme.index'),
        ],
    ])
@stop

@section('conteudo')
    <div class="btn-list mb-1">
        @include('post_theme.search', ['route' => route('post_theme.deleted')])
    </div>
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table border text-nowrap text-md-nowrap table-bordered table-hover mb-0">
                    <thead>
                        <th>Título:</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($post_themes as $post_theme)
                            <tr>
                                <td>{{ $post_theme->name }}</td>
                                <td style="width: 40px">
                                    @include('layout.utils.buttons.restoreButton', [
                                        'route' => 'post_theme',
                                        'model' => $post_theme,
                                    ])
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
