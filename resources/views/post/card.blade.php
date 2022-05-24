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
            <div class="ms-auto">
                <div class="dropdown show">
                    <a class="new option-dots" href="JavaScript:void(0);" data-bs-toggle="dropdown">
                        <span class="">
                            <i class="fe fe-more-vertical"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="{{ route('post.edit', ['post' => $post->id]) }}">
                            Editar
                        </a>
                        <a class="dropdown-item" href="javascript:void(0)">
                            Apagar
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('post.show', ['post' => $post]) }}" class="text-black">
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
        </a>
    </div>
    <div class="card-footer user-pro-2">
        <div class="media mt-0">
            <div class="media-header me-2">
                <div class="d-flex mt-1">
                    {{-- @if($reque) --}}
                    <a href="{{ route('post.show', ['post' => $post->id]) }}">Ver mais</a>
                </div>
            </div>
            <div class="ms-auto mb-0 mt-2">
                <span class="tag tag-rounded">
                    {{ $post->theme->name }}
                </span>
            </div>
        </div>
    </div>
</div>
