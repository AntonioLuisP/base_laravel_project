<div class="form-group">
    <label class="form-label">Título</label>
    <input type="text" class="form-control @if ($errors->has('title')) is-invalid @endif" placeholder="Título"
        value="{{ old('title') ? old('title') : $cargo->title ?? '' }}" aria-label="title" name="title" required>
    {!! $errors->first('title', '<span style="color:red" class="help-block">:message</span>') !!}
</div>
<div class="form-group">
    <label class="form-label">Subítulo</label>
    <input type="text" class="form-control @if ($errors->has('subtitle')) is-invalid @endif" placeholder="Subítulo"
        value="{{ old('subtitle') ? old('subtitle') : $cargo->subtitle ?? '' }}" aria-label="subtitle" name="subtitle"
        required>
    {!! $errors->first('subtitle', '<span style="color:red" class="help-block">:message</span>') !!}
</div>
<div class="form-group">
    <label class="form-label">Conteudo do Post</label>
    <textarea class="form-control @if ($errors->has('text')) is-invalid @endif"
        placeholder="Escreva aqui seus pensamentos"
        required>{{ old('text') ? old('text') : $cargo->text ?? '' }}</textarea>
    {!! $errors->first('text', '<span style="color:red" class="help-block">:message</span>') !!}
</div>

<input type="hidden" name="id_user" value="{{ auth::id() }}">
<input type="hidden" name="id_user" value="{{ auth::id() }}">
@include('layout.utils.buttons.buttonSubmit')
