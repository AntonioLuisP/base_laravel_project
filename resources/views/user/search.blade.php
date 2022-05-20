@extends('layout.utils.modal.searchModal')

@section('form')
    <div class="row">
        <div class="form-group col-sm-12">
            <label class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" maxlength="45" placeholder="Nome"
                value="{{ $_GET['name'] ?? '' }}">
        </div>
        <div class="form-group col-sm-12">
            <label class="form-label">Email</label>
            <input type="text" name="email" class="form-control" maxlength="45" placeholder="email"
                value="{{ $_GET['email'] ?? '' }}">
        </div>
        <div class="form-group col-sm-5">
            <label class="form-label">Ordene</label>
            <select class="form-control form-select" name="field">
                <option value="created_at"
                    {{ isset($_GET['field']) ? ($_GET['field'] === 'created_at' ? 'selected' : '') : '' }}>
                    Data de Criação
                </option>
                <option value="nome" {{ isset($_GET['field']) ? ($_GET['field'] === 'nome' ? 'selected' : '') : '' }}>
                    Nome
                </option>
                <option value="email" {{ isset($_GET['field']) ? ($_GET['field'] === 'email' ? 'selected' : '') : '' }}>
                    Email
                </option>
            </select>
        </div>
        @include('layout.utils.form.orderSearch', ['list' => $users])
    </div>
@stop
