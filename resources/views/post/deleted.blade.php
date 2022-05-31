@extends('layout.app')

@section('content_header')
    @include('layout.utils.contentHeader', [
        'title' => 'Todos os Posts Apagados',
        'items' => [
            'Posts' => route('post.index'),
        ],
    ])
@stop

@section('conteudo')
    <div class="btn-list mb-1">
        @include('post.search', ['route' => route('post.deleted')])
    </div>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table border text-nowrap text-md-nowrap table-bordered table-hover mb-0">
                    <thead>
                        <th>Título:</th>
                        <th>Subtítulo:</th>
                        <th>Criador por:</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->subtitle }}</td>
                                <td>{{ $post->user->nickname }}</td>
                                <td style="width: 40px">
                                    @include('layout.utils.buttons.restoreButton', [
                                        'route' => 'post',
                                        'model' => $post,
                                    ])
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('layout.utils.pagination', ['items' => $posts, $links])
@stop
