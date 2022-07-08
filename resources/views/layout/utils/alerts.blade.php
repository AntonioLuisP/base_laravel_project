@if ($errors->any())
    <div class="alert alert-warning" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">
            ×
        </button>
        @foreach ($errors->all() as $error)
            <strong class="fw-bold">{{ $error }}</strong>
        @endforeach
    </div>
@endif

@if (session('message'))
    <div class="alert alert-info" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">
            ×
        </button>
        <strong>{{ session('message') }}</strong>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">
            ×
        </button>
        <strong>{{ session('error') }}</strong>
    </div>
@endif

@if (session('info'))
    <div class="alert alert-warning" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">
            ×
        </button>
        <strong>{{ session('info') }}</strong>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">
            ×
        </button>
        <strong>{{ session('success') }}</strong>
    </div>
@endif
