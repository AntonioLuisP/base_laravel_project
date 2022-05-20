<h1 class="page-title">{{ $title }}</h1>
<div>
    <ol class="breadcrumb justify-content-end">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
        @foreach ($items as $key => $value)
            <li class="breadcrumb-item @if ($loop->last) active @endif ">
                @if ($value)
                    <a href="{{ $value }}">
                        {{ $key }}
                    </a>
                @else
                    {{ $key }}
                @endif
            </li>
        @endforeach
    </ol>
</div>
