<div class="form-group">
    <label class="form-label">Nomeclatura</label>
    <input type="text" class="form-control @if ($errors->has('nomenclatura')) is-invalid @endif"
        placeholder="Nomenclatura"
        value="{{ old('nomenclatura') ? old('nomenclatura') : $cargo->nomenclatura ?? '' }}" aria-label="Nomenclatura"
        name="nomenclatura" required>
    {!! $errors->first('nomenclatura', '<span style="color:red" class="help-block">:message</span>') !!}
</div>
<div class="row">
    <div class="form-group col-sm-6">
        <label class="form-label">Nível</label>
        <select class="form-control form-select @if ($errors->has('nivel')) is-invalid @endif"
            aria-label="Escolaridade" name="nivel" required>
            @include('utils.form.optionValueOrOldSelected', [
                'name' => 'nivel',
                'values' => [
                    'Nível Fundamental' => 'Nível Fundamental',
                    'Nível Médio' => 'Nível Médio',
                    'Nível Superior' => 'Nível Superior',
                    'Pós Graduação' => 'Pós Graduação',
                ],
                'parameter' => $cargo->nivel ?? null,
            ])
        </select>
        {!! $errors->first('nivel', '<span style="color:red" class="help-block">:message</span>') !!}
    </div>
    <div class="form-group col-sm-6">
        <label class="form-label">Categoria</label>
        <select class="form-control form-select @if ($errors->has('categoria')) is-invalid @endif"
            aria-label="Categoria" name="categoria" required>
            @include('utils.form.optionValueOrOldSelected', [
                'name' => 'categoria',
                'values' => [
                    'Docente' => 'Docente',
                    'Técnico Administrativo' => 'Técnico Administrativo',
                ],
                'parameter' => $cargo->categoria ?? null,
            ])
        </select>
        {!! $errors->first('categoria', '<span style="color:red" class="help-block">:message</span>') !!}
    </div>
</div>
@include('utils.buttons.buttonSubmit')
