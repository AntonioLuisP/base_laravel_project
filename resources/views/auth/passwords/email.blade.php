@extends('layout.auth.base')

@section('form-auth')
    <form action="{{ route('password.email') }}" method="POST" class="login100-form validate-form">
        @csrf
        <span class="login100-form-title pb-5">Esqueceu sua Senha?</span>
        <p class="text-muted">Digite o Email cadastrado em sua conta!</p>
        <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
            <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                <i class="zmdi zmdi-email" aria-hidden="true"></i>
            </a>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email"
                class="input100 border-start-0 ms-0 form-control @error('email') is-invalid @enderror">

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="submit">
            <button class="login100-form-btn btn-primary" type="submit">
                Enviar
            </button>
        </div>
        <div class="text-center pt-3">
            <p class="text-dark mb-0">Lembrou-se?<a href="{{ route('login') }}" class="text-primary ms-1">Faça login</a>
            </p>
        </div>
    </form>
@endsection
