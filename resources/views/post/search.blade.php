@extends('layout.utils.modal.searchModal')

@section('form')
    <div class="row">
        <div class="form-group col-sm-12">
            <label class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" maxlength="45" placeholder="Nome"
                value="{{ $_GET['name'] ?? '' }}">
        </div>
        <div class="form-group col-sm-12">
            <label class="form-label">description</label>
            <textarea name="description" class="form-control" cols="30" rows="3">{{ $_GET['description'] ?? '' }}</textarea>
        </div>
        <div class="form-group col-sm-5">
            <label class="form-label">Ordene</label>
            <select class="form-control form-select" name="field">
                <option value="created_at"
                    {{ isset($_GET['field']) ? ($_GET['field'] === 'created_at' ? 'selected' : '') : '' }}>
                    Data de Criação
                </option>
                <option value="name" {{ isset($_GET['field']) ? ($_GET['field'] === 'name' ? 'selected' : '') : '' }}>
                    Nome
                </option>
                <option value="description" {{ isset($_GET['field']) ? ($_GET['field'] === 'description' ? 'selected' : '') : '' }}>
                    description
                </option>
            </select>
        </div>
        @include('layout.utils.form.orderSearch', ['list' => $posts])
    </div>
@stop
