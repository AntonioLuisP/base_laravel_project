<div class="card">
    <div class="card-header">
        <h4 class="card-title">Editar Senha</h4>
    </div>
    <form action="{{ route('user.password.update', ['user' => $user->id]) }}" method="post">
        @method('PUT')
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-12 @if ($errors->has('senha_atual')) has-error @endif">
                    <Label class="form-label">Senha atual</Label>
                    <input type="password" name="senha_atual" class="form-control">
                    {!! $errors->first('senha_atual', '<span style="color:red" class="help-block">:message</span>') !!}
                </div>
                <div class="form-group col-md-12 @if ($errors->has('password')) has-error @endif">
                    <Label class="form-label">Nova senha</Label>
                    <input type="password" name="password" class="form-control">
                    {!! $errors->first('password', '<span style="color:red" class="help-block">:message</span>') !!}
                </div>
                <div class="form-group col-md-12 @if ($errors->has('password_confirmation')) has-error @endif">
                    <Label class="form-label">Repetir senha</Label>
                    <input type="password" name="password_confirmation" class="form-control">
                    {!! $errors->first('password_confirmation', '<span style="color:red" class="help-block">:message</span>') !!}
                </div>
            </div>
            @include('layout.utils.buttons.buttonSubmit')
        </div>
    </form>
</div>
