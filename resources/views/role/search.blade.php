@extends('layout.utils.modal.searchModal')

@section('form')
    <div class="row">
        <div class="form-group col-sm-12">
            <label class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" maxlength="45" placeholder="Nome"
                value="{{ $_GET['name'] ?? '' }}">
        </div>
    </div>
@stop
