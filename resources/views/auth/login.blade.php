@extends('layout.auth.base')

@section('form-auth')
    <form class="login100-form validate-form" action="{{ route('login') }}" method="post">
        @csrf
        <span class="login100-form-title pb-5">
            Faça Login
        </span>
        <div class="panel panel-primary">
            <div class="panel-body tabs-menu-body p-0 pt-5">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab5">
                        <div class="wrap-input100 validate-input input-group"
                            data-bs-validate="Valid email is required: ex@abc.xyz">
                            <a href="#" class="input-group-text bg-white text-muted">
                                <i class="zmdi zmdi-email text-muted" aria-hidden="true"></i>
                            </a>
                            <input class="input100 form-control" name="email" type="email" placeholder="Email">
                        </div>
                        <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                            <a href="#" class="input-group-text bg-white text-muted">
                                <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                            </a>
                            <input class="input100 form-control" name="password" type="password" placeholder="Senha">
                        </div>
                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn btn-primary" type="submit">Login</button>
                        </div>
                        <div class="text-end pt-4">
                            <p class="mb-0"><a href="{{ route('password.request')}}" class="text-primary ms-1">Esqueceu a
                                    senha?</a></p>
                        </div>
                        <div class="text-center pt-3">
                            <p class="text-dark mb-0">Não tem uma conta?<a href="{{ route('register') }}"
                                    class="text-primary ms-1">Cadastre-se aqui</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
