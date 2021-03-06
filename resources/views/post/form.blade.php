@csrf

<div class="form-group">
    <label class="form-label">Título</label>
    <input type="text" class="form-control @if ($errors->has('title')) is-invalid @endif" placeholder="Título"
        value="{{ old('title') ? old('title') : $post->title ?? '' }}" aria-label="title" name="title" required>
    {!! $errors->first('title', '<span style="color:red" class="help-block">:message</span>') !!}
</div>
<div class="row">
    <div class="form-group col-sm-10">
        <label class="form-label">Subítulo</label>
        <input type="text" class="form-control @if ($errors->has('subtitle')) is-invalid @endif"
            placeholder="Subítulo" value="{{ old('subtitle') ? old('subtitle') : $post->subtitle ?? '' }}"
            aria-label="subtitle" name="subtitle" required>
        {!! $errors->first('subtitle', '<span style="color:red" class="help-block">:message</span>') !!}
    </div>
    <div class="form-group col-sm-2">
        <label class="form-label">Tema</label>
        <select class="form-control form-select @if ($errors->has('id_post_theme')) id-invalid @endif"
            aria-label="Tema" name="id_post_theme" required>
            @if (count($themes) > 0)
                @foreach ($themes as $theme)
                    <option value="{{ $theme->id }}">{{ $theme->name }}</option>
                @endforeach
            @else
                <option disabled style="color: red">Nenhum dado encontrado. Cadastre antes</option>
            @endif
        </select>
        {!! $errors->first('id_post_theme', '<span style="color:red" class="help-block">:message</span>') !!}
    </div>
</div>
<div class="form-group">
    <label class="form-label">Conteudo do Post</label>
    <textarea class="form-control @if ($errors->has('text')) is-invalid @endif" name="text"
        placeholder="Escreva aqui seus pensamentos"
        required>{{ old('subtitle') ? old('subtitle') : $post->text ?? '' }}</textarea>
    {!! $errors->first('text', '<span style="color:red" class="help-block">:message</span>') !!}
</div>

@include('layout.utils.buttons.buttonSubmit')
