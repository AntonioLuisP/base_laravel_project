@extends('layout.utils.form.modalForm', [
    'id' => 'search',
    'btn_icon' => '',
    'btn_class' => 'btn-sm btn-outline-default',
    'btn_name' => 'Filtrar',
    'modal_title' => 'Filtrar',
    'basic_method' => 'GET',
    'route' => $route,
])

@section('form')
    @yield('form')
@stop

@section('form-buttons')
    <a href="{{ $route }}" class="btn btn-default">Zerar Busca</a>
    @include('layout.utils.buttons.buttonSubmit', ['text' => 'Pesquisar'])
@stop
