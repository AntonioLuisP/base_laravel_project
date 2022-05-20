@extends('layout.auth.base')

@section('form-auth')
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <span class="login100-form-title pb-5">Recrie sua senha!</span>
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                <i class="zmdi zmdi-email" aria-hidden="true"></i>
            </a>
            <input type="email" name="email" value="{{ $email ?? old('email') }}" placeholder="Email"
                class="input100 border-start-0 ms-0 form-control @error('email') is-invalid @enderror" required
                autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="wrap-input100 validate-input input-group" id="Password-toggle">
            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                <i class="zmdi zmdi-eye" aria-hidden="true"></i>
            </a>
            <input id="password" type="password"
                class="input100 border-start-0 ms-0 form-control @error('password') is-invalid @enderror" name="password"
                required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="wrap-input100 validate-input input-group" id="Password-toggle">
            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                <i class="zmdi zmdi-eye" aria-hidden="true"></i>
            </a>
            <div class="col-md-6">
                <input id="password-confirm" type="password" class="input100 border-start-0 ms-0 form-control"
                    name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn btn-primary">
                Salvar
            </button>
        </div>
    </form>
@endsection
