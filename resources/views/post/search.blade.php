@extends('utils.modal.searchModal')

@section('form')
    <div class="row">
        <div class="form-group col-sm-12">
            <label class="form-label">Nomeclatura</label>
            <input type="text" name="nomenclatura" class="form-control" maxlength="45" placeholder="Nomenclatura"
                value="{{ $_GET['nomenclatura'] ?? '' }}">
        </div>
        <div class="form-group col-sm-6">
            <label class="form-label">Nível</label>
            <select class="form-control form-select" aria-label="Escolaridade" name="nivel">
                <option value=""></option>
                <option value="Nível Fundamental"
                    {{ isset($_GET['nivel']) ? ($_GET['nivel'] === 'Nível Fundamental' ? 'selected' : '') : '' }}>
                    Nível Fundamental
                </option>
                <option value="Nível Médio"
                    {{ isset($_GET['nivel']) ? ($_GET['nivel'] === 'Nível Médio' ? 'selected' : '') : '' }}>
                    Nível Médio
                </option>
                <option value="Nível Superior"
                    {{ isset($_GET['nivel']) ? ($_GET['nivel'] === 'Nível Superior' ? 'selected' : '') : '' }}>
                    Nível Superior
                </option>
                <option value="Pós Graduação"
                    {{ isset($_GET['nivel']) ? ($_GET['nivel'] === 'Pós Graduação' ? 'selected' : '') : '' }}>
                    Pós Graduação
                </option>
            </select>
        </div>
        <div class="form-group col-sm-6">
            <label class="form-label">Categoria</label>
            <select class="form-control form-select" aria-label="Escolaridade" name="categoria">
                <option value=""></option>
                <option value="Docente"
                    {{ isset($_GET['categoria']) ? ($_GET['categoria'] === 'Docente' ? 'selected' : '') : '' }}>
                    Docente
                </option>
                <option value="Técnico Administrativo"
                    {{ isset($_GET['categoria']) ? ($_GET['categoria'] === 'Técnico Administrativo' ? 'selected' : '') : '' }}>
                    Técnico Administrativo
                </option>
            </select>
        </div>
        <div class="form-group col-sm-5">
            <label class="form-label">Ordene</label>
            <select class="form-control form-select" name="field">
                <option value="created_at"
                    {{ isset($_GET['field']) ? ($_GET['field'] === 'created_at' ? 'selected' : '') : '' }}>
                    Data de Criação
                </option>
                <option value="nomenclatura"
                    {{ isset($_GET['field']) ? ($_GET['field'] === 'nomenclatura' ? 'selected' : '') : '' }}>
                    Nomenclatura
                </option>
            </select>
        </div>
        @include('utils.form.formOrder', ['list' => $cargos])
    </div>
@stop
