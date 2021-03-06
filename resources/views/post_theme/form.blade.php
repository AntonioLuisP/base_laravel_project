@csrf

<div class="form-group">
    <label class="form-label">Nome</label>
    <input type="text" class="form-control @if ($errors->has('name')) is-invalid @endif" placeholder="Título"
        value="{{ old('name') ? old('name') : $post_theme->name ?? '' }}" aria-label="name" name="name" required>
    {!! $errors->first('name', '<span style="color:red" class="help-block">:message</span>') !!}
</div>

@include('layout.utils.buttons.buttonSubmit')
