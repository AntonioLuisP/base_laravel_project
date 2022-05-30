@extends('layout.app')

@section('content_header')
    @include('layout.utils.contentHeader', [
        'title' => 'Post',
        'items' => [
            'Posts' => route('user.index'),
            'Post' => null,
        ],
    ])
@stop

@section('conteudo')
    <div class="card border p-0 shadow-none">
        <div class="card-body">
            <div class="d-flex">
                <a href="{{ route('user.show', ['user' => $post->user]) }}" class="text-black">
                    <div class="media mt-0">
                        <div class="media-user me-2">
                            <i class="fe fe-user"></i>
                        </div>
                        <div class="media-body">
                            <h6 class="mb-0 mt-1">
                                {{ $post->user->nickname }}
                            </h6>
                            <small class="text-muted">{{ $post->createdAt() }}</small>
                        </div>
                    </div>
                </a>
                @canany(['update', 'delete'], $post)
                    <div class="ms-auto">
                        <div class="dropdown show">
                            <a class="new option-dots" href="JavaScript:void(0);" data-bs-toggle="dropdown">
                                <span class="">
                                    <i class="fe fe-more-vertical"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                @can('update', $post)
                                    <a class="dropdown-item" href="{{ route('post.edit', ['post' => $post->id]) }}">
                                        Editar
                                    </a>
                                @endcan
                                @can('delete', $post)
                                    <form action="{{ route('post.destroy', ['post' => $post->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item" type="submit"
                                            onclick="return confirm('Tem certeza que deseja deletar esse registro?'); return false;">
                                            Apagar
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </div>
                    </div>
                @endcanany
            </div>
            <div class="mt-1">
                <h3 class="fw-bold">
                    {{ $post->title }}
                </h3>
                <h5 class="fw-semibold text-muted">
                    {{ $post->subtitle }}
                </h5>
                <p class="mb-0">
                    {{ $post->text }}
                </p>
            </div>
            <div class="mt-2">
                <span class="tag">
                    {{ $post->theme->name }}
                </span>
            </div>
        </div>
    </div>
@stop
