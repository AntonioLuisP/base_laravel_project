@extends('layout.app')

@section('content_header')
    @include('layout.utils.contentHeader', [
        'title' => 'Editar Usuário',
        'items' => [
            'Usuário' => route('user.show', ['user' => $user->id]),
            'Editar Usuário' => null,
        ],
    ])
@stop

@section('conteudo')
    @if (session()->get('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
            <strong>{{ session('success') }}</strong>
        </div>
    @endif


    @if (session()->get('error'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
            <strong>{{ session('error') }}</strong>
        </div>
    @endif
    {{-- @if ($errors->has('senha'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Erros</h4>
            @foreach ($errors->get('senha') as $error)
                {{ $error }}<br>
            @endforeach
        </div>
    @endif --}}
    <div class="row">
        <div class="col-sm-8">
            @include('user.userEdit')
        </div>
        <div class="col-sm-4">
            @include('user.passwordEdit')
        </div>
    </div>
@stop
