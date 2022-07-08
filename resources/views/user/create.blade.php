@extends('layout.app')

@section('content_header')
    @include('layout.utils.contentHeader', [
        'title' => 'Cadastrar Usuário',
        'items' => [
            'Usuários' => route('user.index'),
            'Cadastrar Usuário' => null,
        ],
    ])
@stop

@section('conteudo')
    @if ($errors->any())
        <div class="alert alert-warning" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">
                ×
            </button>
            <p>Erro ao Cadastrar</p>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form method="POST" class="login100-form validate-form" action="{{ route('user.store') }}">
                @csrf
                <p>Itens com <b>*</b> são obrigatórios</p>
                <div class="form-group">
                    <label class="form-label">Nome *</label>
                    <div class="wrap-input100 validate-input input-group"
                        data-bs-validate="Valid email is required: ex@abc.xyz">
                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                            <i class="mdi mdi-account" aria-hidden="true"></i>
                        </a>
                        <input id="name" type="text"
                            class="input100 form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" placeholder="Nome Completo" required autocomplete="name">
                    </div>
                    {!! $errors->first('name', '<span style="color:red" class="help-block">:message</span>') !!}
                </div>
                <div class="form-group">
                    <label class="form-label">Apelido *</label>
                    <div class="wrap-input100 validate-input input-group"
                        data-bs-validate="Valid email is required: ex@abc.xyz">
                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                            <i class="mdi mdi-account" aria-hidden="true"></i>
                        </a>
                        <input id="nickname" type="text"
                            class="input100 form-control @error('nickname') is-invalid @enderror" name="nickname"
                            value="{{ old('nickname') }}" placeholder="Apelido" required autocomplete="nickname">
                    </div>
                    {!! $errors->first('nickname', '<span style="color:red" class="help-block">:message</span>') !!}
                </div>
                <div class="form-group">
                    <label class="form-label">Email *</label>
                    <div class="wrap-input100 validate-input input-group"
                        data-bs-validate="Valid email is required: ex@abc.xyz"> <a href="javascript:void(0)"
                            class="input-group-text bg-white text-muted"> <i class="zmdi zmdi-email" aria-hidden="true"></i>
                        </a>
                        <input type="email" class="input100 form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">
                    </div>
                    {!! $errors->first('email', '<span style="color:red" class="help-block">:message</span>') !!}
                </div>
                <div class="form-group">
                    <label class="form-label">Senha *</label>
                    <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                            <i class="zmdi zmdi-eye" aria-hidden="true"></i>
                        </a>
                        <input type="password" class="input100 form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password" placeholder="Senha">
                    </div>
                    {!! $errors->first('password', '<span style="color:red" class="help-block">:message</span>') !!}
                </div>
                <div class="form-group">
                    <label class="form-label">Digite sua senha novamente *</label>
                    <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                        <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                            <i class="zmdi zmdi-eye" aria-hidden="true"></i>
                        </a>
                        <input type="password" class="input100 border-start-0 ms-0 form-control"
                            name="password_confirmation" required autocomplete="new-password"
                            placeholder="Confirme sua Senha">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-md fw-semibold">
                    Registrar
                </button>
            </form>
        </div>
    </div>
@stop
