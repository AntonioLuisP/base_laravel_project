<form action="{{ route('user.update', ['user' => $user->id]) }}" method="post">
    @method('PUT')
    @csrf
    <div class="card card-outline card-teal">
        <div class="card-header">
            <h4 class="card-title">Editar Conta</h4>
        </div>
        <div class="card-body row">
            <div class="form-group col-md-12 @if ($errors->has('name')) has-error @endif">
                <Label class="form-label">Nome</Label>
                <input type="text" name="name" class="form-control" id="" value="{{ $user->name }}" maxlength="35"
                    required>
                {!! $errors->first('name', '<span style="color:red" class="help-block">:message</span>') !!}
            </div>
            <div class="form-group col-md-12 @if ($errors->has('nickname')) has-error @endif">
                <Label class="form-label">Apelido</Label>
                <input type="text" name="nickname" class="form-control" id="" value="{{ old('nickname') }}"
                    maxlength="35">
                {!! $errors->first('nickname', '<span style="color:red" class="help-block">:message</span>') !!}
            </div>
        </div>
        <div class="card-footer">
            <input class="btn btn-primary" type="submit" value="Salvar">
        </div>
    </div>
</form>
