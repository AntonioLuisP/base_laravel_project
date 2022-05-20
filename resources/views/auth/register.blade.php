@extends('layout.auth.base')


@section('form-auth')
    <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
        @csrf
        <span class="login100-form-title">Faça seu Cadastro</span>
        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                <i class="mdi mdi-account" aria-hidden="true"></i>
            </a>
            <input id="name" type="text"
                class="input100 border-start-0 ms-0 form-control @error('name') is-invalid @enderror" name="name"
                value="{{ old('name') }}" placeholder="Nome Completo" required autocomplete="name">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz"> <a
                href="javascript:void(0)" class="input-group-text bg-white text-muted"> <i class="zmdi zmdi-email"
                    aria-hidden="true"></i> </a>
            <input type="email" class="input100 border-start-0 ms-0 form-control @error('email') is-invalid @enderror"
                name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">

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
            <input type="password" class="input100 border-start-0 ms-0 form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="new-password" placeholder="Senha">

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
            <input type="password" class="input100 border-start-0 ms-0 form-control" name="password_confirmation" required
                autocomplete="new-password" placeholder="Confirme sua Senha">
        </div>
        <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn btn-primary">
                Registrar
            </button>
        </div>
        <div class="text-center pt-3">
            <p class="text-dark mb-0">Possui uma conta?<a href="{{ route('login') }}"
                    class="text-primary ms-1">Faça login</a></p>
        </div>
    </form>
@endsection
