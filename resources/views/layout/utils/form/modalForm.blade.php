@extends('layout.utils.layout.modal', [
    'id' => $id,
    'btn_icon' => $btn_icon,
    'btn_name' => $btn_name,
    'btn_class' => $btn_class,
    'modal_title' => $modal_title,
])

@section('modal-body-footer')
    <form method="{{ $basic_method }}" action="{{ $route }}">
        <div class="modal-body">
            @yield('form')
        </div>
        <div class="modal-footer">
            @yield('form-buttons')
        </div>
    </form>
@stop
