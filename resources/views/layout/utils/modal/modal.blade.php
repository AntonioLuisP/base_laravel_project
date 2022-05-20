<button class="btn {{ $btn_class }}" data-bs-toggle="modal" data-bs-target="#{{ $id }}">
    <i class="{{ $btn_icon }}"></i>
    {{ $btn_name ?? 'Modal' }}
</button>

<div class="modal fade" id="{{ $id }}" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $modal_title }}</h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            @yield('modal-body-footer')
        </div>
    </div>
</div>
