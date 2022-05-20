@extends('layout.auth.base')

@section('form-auth')
    <form method="POST" action="{{ route('password.confirm') }}" class="login100-form validate-form">
        @csrf
        <span class="login100-form-title pb-5">Confirme sua senha para continuar</span>
        <div class="wrap-input100 validate-input input-group" id="Password-toggle">
            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                <i class="zmdi zmdi-eye" aria-hidden="true"></i>
            </a>
            <input type="password" class="input100 border-start-0 ms-0 form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn btn-primary">
                Confirmar
            </button>
        </div>
        <div class="text-center pt-3">
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Esqueceu sua Senha?
                </a>
            @endif
        </div>
    </form>
@endsection
