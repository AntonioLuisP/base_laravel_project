<div class="form-group">
    <label class="form-label">Título</label>
    <input type="text" class="form-control @if ($errors->has('title')) is-invalid @endif" placeholder="Título"
        value="{{ old('title') ? old('title') : $post->title ?? '' }}" aria-label="title" name="title" required>
    {!! $errors->first('title', '<span style="color:red" class="help-block">:message</span>') !!}
</div>
<div class="form-group">
    <label class="form-label">Subítulo</label>
    <input type="text" class="form-control @if ($errors->has('subtitle')) is-invalid @endif" placeholder="Subítulo"
        value="{{ old('subtitle') ? old('subtitle') : $post->subtitle ?? '' }}" aria-label="subtitle" name="subtitle"
        required>
    {!! $errors->first('subtitle', '<span style="color:red" class="help-block">:message</span>') !!}
</div>
<div class="form-group">
    <label class="form-label">Conteudo do Post</label>
    <textarea class="form-control @if ($errors->has('text')) is-invalid @endif" name="text"
        placeholder="Escreva aqui seus pensamentos"
        required>{{ old('subtitle') ? old('subtitle') : $post->text ?? '' }}</textarea>
    {!! $errors->first('text', '<span style="color:red" class="help-block">:message</span>') !!}
</div>

<input type="hidden" name="id_user" value="{{ auth::id() }}">
<input type="hidden" name="id_post_type" value="{{ auth::id() }}">
@include('layout.utils.buttons.buttonSubmit')
