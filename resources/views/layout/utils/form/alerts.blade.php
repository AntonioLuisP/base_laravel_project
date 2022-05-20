@if ($errors->any())
    <div class="alert alert-warning" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">
            ×
        </button>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

@if (session('message'))
    <div class="alert alert-info" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">
            ×
        </button>
        {{ session('message') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">
            ×
        </button>
        {{ session('error') }}
    </div>
@endif

@if (session('info'))
    <div class="alert alert-warning" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">
            ×
        </button>
        {{ session('info') }}
    </div>
@endif
